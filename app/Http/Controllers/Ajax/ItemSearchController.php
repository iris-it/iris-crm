<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Product;
use App\Service;
use Illuminate\Http\Request;

class ItemSearchController extends Controller
{


    /**
     * Search input for ajax requests
     * @param Request $request
     * @param $type
     * @param $query
     * @return array
     */

    public function search(Request $request, $type)
    {

        $query = $request->get('query');

        switch ($type) {
            case 'products': {
                return Product::SearchByKeyword($query)
                    ->where('organization_id', $this->organization->id)
                    ->get(['id', 'product_name', 'ht_price', 'category', 'description', 'type']);
            }
            case 'services': {
                return Service::select('id', 'service_name', 'ht_price', 'category', 'description', 'type')
                    ->SearchByKeyword($query)
                    ->where('organization_id', $this->organization->id)
                    ->get();
            }
            default : {
                return [];
            }
        }
    }

    public function get(Request $request, $type, $id)
    {

        if (!$request->user()) {
            return ['no - auth'];
        }

        switch ($type) {
            case 'products': {
                return Product::findOrFail($id);
            }
            case 'services': {
                return Service::findOrFail($id);
            }
            default : {
                return [];
            }
        }
    }

}
