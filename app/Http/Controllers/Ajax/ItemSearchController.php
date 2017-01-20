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
                    ->with('taxes')
                    ->get();
            }
            case 'services': {
                return Service::SearchByKeyword($query)
                    ->where('organization_id', $this->organization->id)
                    ->with('taxes')
                    ->get();
            }
            default : {
                return [];
            }
        }
    }

}
