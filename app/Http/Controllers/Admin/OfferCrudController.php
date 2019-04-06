<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OfferStatus;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OfferRequest as StoreRequest;
use App\Http\Requests\OfferRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class OfferCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OfferCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Offer');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/offers');
        $this->crud->setEntityNameStrings('offer', 'offers');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->allowAccess(['show']);
        // TODO: remove setFromDb() and manually define Fields and Columns
//        $this->crud->setFromDb();

        $this->crud->addColumns([
            [
                'name' => 'customer_name',
                'label' => trans('web_dashboard.customer_name'),
                'type' => 'text',
            ],
            [
                'name' => 'customer_phone',
                'label' => trans('web_dashboard.customer_phone'),
                'type' => 'text',
            ],
            [
                'name' => 'customer_email',
                'label' => trans('web_dashboard.customer_email'),
                'type' => 'text',
            ],
            [
                'name' => 'device',
                'label' => trans('web_dashboard.device'),
                'type' => 'text',
            ],
            [
                'name' => 'serial_number',
                'label' => trans('web_dashboard.serial_number'),
                'type' => 'text',
            ],
            [
                'name' => 'status',
                'label' => trans('web_dashboard.status'),
                'type' => 'model_function',
                'function_name' => 'getOfferStatus',
            ],
            [
                'name' => 'cost',
                'label' => trans('web_dashboard.cost'),
                'type' => 'text',
            ],
            [
                'name' => 'percentage',
                'label' => trans('web_dashboard.percentage'),
                'type' => 'text',
            ],
            [
                'name' => 'details',
                'label' => trans('web_dashboard.details'),
                'type' => 'textarea',
            ],
            [   // DateTime
                'name' => 'deadline',
                'label' => trans('web_dashboard.dead_line'),
                'type' => 'datetime_picker',
                // optional:
                'datetime_picker_options' => [
                    'format' => 'DD/MM/YYYY HH:mm',
                    'language' => 'en'
                ],
                'allows_null' => true,
            ],
        ]);
        $this->crud->addFields([
            [ 
                'name' => 'customer_name',
                'label' => trans('web_dashboard.customer_name'),
                'type' => 'text',
            ],
            [ 
                'name' => 'customer_phone',
                'label' => trans('web_dashboard.customer_phone'),
                'type' => 'text',
            ],
            [ 
                'name' => 'customer_email',
                'label' => trans('web_dashboard.customer_email'),
                'type' => 'text',
            ],
            [ 
                'name' => 'device',
                'label' => trans('web_dashboard.device'),
                'type' => 'text',
            ],
            [ 
                'name' => 'serial_number',
                'label' => trans('web_dashboard.serial_number'),
                'type' => 'text',
            ],
            [ 
                'name' => 'status',
                'label' => trans('web_dashboard.status'),
                'type' => 'select2_from_array',
                'options' => OfferStatus::toSelectArray(),
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
            ],
            [ 
                'name' => 'cost',
                'label' => trans('web_dashboard.cost'),
                'type' => 'text',
            ],
            [ 
                'name' => 'percentage',
                'label' => trans('web_dashboard.percentage'),
                'type' => 'text',
            ],
            [ 
                'name' => 'details',
                'label' => trans('web_dashboard.details'),
                'type' => 'textarea',
            ],
            [   // DateTime
                'name' => 'deadline',
                'label' => trans('web_dashboard.dead_line'),
                'type' => 'datetime_picker',
                // optional:
                'datetime_picker_options' => [
                    'format' => 'DD/MM/YYYY HH:mm',
                    'language' => 'en'
                ],
                'allows_null' => true,
            ],
        ]);

        $this->crud->orderBy("id", "desc");

        // add asterisk for fields that are required in OfferRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
