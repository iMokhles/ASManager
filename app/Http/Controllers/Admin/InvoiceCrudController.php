<?php

namespace App\Http\Controllers\Admin;

use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\Models\Offer;
use App\Models\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\InvoiceRequest as StoreRequest;
use App\Http\Requests\InvoiceRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class InvoiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class InvoiceCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Invoice');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/invoices');
        $this->crud->setEntityNameStrings('invoice', 'invoices');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        $this->crud->allowAccess('show');
        $this->crud->setShowView('web.invoice');

        $this->crud->removeFields(['model_type', 'model_id'], 'create');
        $this->crud->removeFields(['model_type', 'model_id'], 'update');

        $this->crud->setColumns([

            [ // n-n relationship (with pivot table)
                'label'     => trans('web_dashboard.requests'), // Table column heading
                'type'      => 'select_multiple',
                'name'      => 'requests', // the method that defines the relationship in your Model
                'entity'    => 'requests', // the method that defines the relationship in your Model
                'attribute' => 'serial_number', // foreign key attribute that is shown to user
                'model'     => Request::class, // foreign key model
            ],
            [ // n-n relationship (with pivot table)
                'label'     => trans('web_dashboard.offers'), // Table column heading
                'type'      => 'select_multiple',
                'name'      => 'offers', // the method that defines the relationship in your Model
                'entity'    => 'offers', // the method that defines the relationship in your Model
                'attribute' => 'serial_number', // foreign key attribute that is shown to user
                'model'     => Offer::class, // foreign key model
            ],
            [
                'name' => 'status',
                'label' => trans('web_dashboard.status'),
                'type' => 'model_function',
                'function_name' => 'getInvoiceStatus',
            ]
        ]);
        $this->crud->addFields([
            [       // Select2Multiple = n-n relationship (with pivot table)
                'label' => trans('web_dashboard.requests'),
                'type' => 'select2_multiple',
                'name' => 'requests', // the method that defines the relationship in your Model
                'entity' => 'requests', // the method that defines the relationship in your Model
                'attribute' => 'serial_number', // foreign key attribute that is shown to user
                'model' => "App\Models\Request", // foreign key model
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
                // 'select_all' => true, // show Select All and Clear buttons?

//                // optional
//                'options'   => (function ($query) {
//                    return $query->orderBy('name', 'ASC')->where('depth', 1)->get();
//                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
            ],
            [       // Select2Multiple = n-n relationship (with pivot table)
                'label' => trans('web_dashboard.offers'),
                'type' => 'select2_multiple',
                'name' => 'offers', // the method that defines the relationship in your Model
                'entity' => 'offers', // the method that defines the relationship in your Model
                'attribute' => 'serial_number', // foreign key attribute that is shown to user
                'model' => "App\Models\Offer", // foreign key model
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
                // 'select_all' => true, // show Select All and Clear buttons?

//                // optional
//                'options'   => (function ($query) {
//                    return $query->orderBy('name', 'ASC')->where('depth', 1)->get();
//                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
            ],
            [ // select_from_array
                'name' => 'status',
                'label' => trans('web_dashboard.status'),
                'type' => 'select2_from_array',
                'options' => InvoiceStatus::toSelectArray(),
            ]
        ]);

        $this->crud->orderBy("id", "desc");

        // add asterisk for fields that are required in InvoiceRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    /**
     * @param UpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
//        dd($this->crud->entry);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    /**
     * @param UpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
//        dd($this->crud->entry);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
