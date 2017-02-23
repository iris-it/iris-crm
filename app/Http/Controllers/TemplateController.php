<?php

namespace App\Http\Controllers;


use App\Http\Requests\TemplateRequest;
use App\Invoice;
use App\Quote;
use App\Services\TemplateParserService;
use App\Template;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class TemplateController extends Controller
{


    /**
     * Display a listing of the Template.
     */

    public function index()
    {

        $templates = $this->organization->templates;
        return view('pages.templates.index')->with('templates', $templates);

    }

    /**
     * Show the form for creating a new Template.
     */

    public function create()
    {
        return view('pages.templates.create');
    }

    /**
     * Store a newly created Template in storage.
     *
     */

    public function store(TemplateRequest $request)
    {
        $input = $request->all();

        if ($template = Template::create($input)) {

            $template->organization()->associate($this->organization);
            $template->save();

            Flash::success(Lang::get('app.general:create-success'));
            return redirect(action('TemplateController@index'));

        }

        Flash::error(Lang::get('app.general:create-failed'));
        return redirect(action('TemplateController@create'));

    }

    /**
     * Display the specified Template.
     */

    public function show()
    {
    }

    /**
     * Show the form for editing the specified Template.
     */

    public function edit($id)
    {
        $template = Template::findOrFail($id);

        return view('pages.templates.edit')->with('template', $template);
    }

    /**
     * Update the specified Template in storage.
     * @param $id
     * @param TemplateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update($id, TemplateRequest $request)
    {
        $template = Template::findOrFail($id);
        $input = $request->all();

        if ($template->update($input)) {
            Flash::success(Lang::get('app.general:update-success'));
            return redirect(action('TemplateController@index'));
        }

        Flash::error(Lang::get('app.general:create-failed'));
        return redirect(action('TemplateController@edit', $id));

    }


    /**
     * Remove the specified Template from storage.
     *
     * @param  int $id
     *
     * @return Response
     */

    public function destroy($id)
    {
        $tax = Template::findOrFail($id);

        if (empty($tax)) {
            Flash::error(Lang::get('app.general:missing-model'));
            return redirect(action('TemplateController@index'));
        }

        $tax->delete();

        Flash::success(Lang::get('app.general:delete-success'));

        return redirect(action('TemplateController@index'));
    }


    /**
     * Generate a quote of invoice from template
     *
     * @param $type
     * @param $id_entity
     * @param $id_template
     */
    public function generateTemplate($type, $id_entity, $id_template)
    {
        if (!in_array($type, ['invoice', 'quote'])) {
            abort(404);
        }

        $templateGenerator = New TemplateParserService($type, $id_entity, $id_template);

        return $templateGenerator->toImage();

    }

    /**
     * Generate a quote of invoice from template
     *
     * @param $type
     * @param $id_entity
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function generateTable($type, $id_entity)
    {
        if (!in_array($type, ['invoice', 'quote'])) {
            abort(404);
        }

        $entity = null;

        if ($type === "quote") {
            $entity = Quote::findOrFail($id_entity);
        }

        if ($type === "invoice") {
            $entity = Invoice::findOrFail($id_entity);
        }

        $content = json_decode($entity->content);
        $content_calc = json_decode($entity->content);

        $taxes = [];

        $totals = [
            'subtotal' => 0,
            'taxes' => 0,
            'vat' => 0,
            'total' => 0,
        ];

        foreach ($content as $key => $row) {
            // Sale Unit
            $content[$key]->sale_unit = ($row->sale_unit) ? $row->sale_unit : 'Unités';
            // Taxes
            $content[$key]->taxes = collect($row->taxes)->map(function ($tax) {
                return $tax->value . '%';
            })->implode(' - ');
            // Tva
            $content[$key]->vat = ($row->vat->value) ? $row->vat->value . '%' : '';
            // HT Price
            $content[$key]->ht_price = number_format($row->ht_price, 2, ',', ' ') . '€';
            // HT Price
            $content[$key]->total_ht_price = number_format(($row->ht_price * $row->quantity), 2, ',', ' ') . '€';
            // TTC Price
            $content[$key]->total_ttc_price = number_format(($row->ttc_price * $row->quantity), 2, ',', ' ') . '€';
        }

        foreach ($content_calc as $row) {

            $totals['subtotal'] += ($row->ht_price * $row->quantity);

            $totals['total'] += ($row->ttc_price * $row->quantity);

            $totals['vat'] += ($row->vat->value) ? (($row->ht_price * $row->quantity) * ($row->vat->value / 100)) : 0;

            foreach ($row->taxes as $tax) {

                if (!isset($taxes[$tax->value])) {
                    $taxes[$tax->value] = 0;
                }

                $value = (($row->ht_price * $row->quantity) * ($tax->value / 100));

                $taxes[$tax->value] += $value;

                $totals['taxes'] += $value;

            }

        }

        return view('shared.quote-invoice-product-static-table')->with(compact('content', 'taxes', 'totals'));

    }
}
