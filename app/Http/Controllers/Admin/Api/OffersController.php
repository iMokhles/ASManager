<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 2019-02-08
 * Time: 13:37
 */

namespace App\Http\Controllers\Admin\Api;


use Illuminate\Http\Request;

class OffersController
{

    public function index(Request $request)
    {
        $search_term = $request->input('q');
        $page = $request->input('page');

        if ($search_term)
        {
            $results = \App\Models\Offer::where('serial_number', 'LIKE', '%'.$search_term.'%')
                ->orWhere('device', 'LIKE', '%'.$search_term.'%')
                ->orWhere('customer_name', 'LIKE', '%'.$search_term.'%')
                ->orWhere('customer_phone', 'LIKE', '%'.$search_term.'%')
                ->orWhere('details', 'LIKE', '%'.$search_term.'%')
                ->paginate(10);
        }
        else
        {
            $results = \App\Models\Offer::paginate(10);
        }

        return $results;
    }

    public function show($id)
    {
        return \App\Models\Offer::find($id);
    }
}