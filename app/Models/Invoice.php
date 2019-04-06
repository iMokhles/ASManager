<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Invoice extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'invoices';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = [
        'note',
        'model_id',
        'model_type',
        'status'
    ];
//     protected $hidden = [];
    protected $dates = ['created_at', 'updated_at'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function getInvoiceStatus() {

        return trans('web_dashboard.'.$this->status);
    }

    public function getRequests() {
        $id = $this->id;
        $invoices = Invoice::whereId($id)->whereModelType(Request::class)->get();
        $requestsSerials = [];
        foreach ($invoices as $invoice) {
            $requestModel = Request::whereId($invoice->model_id)->first();
            array_push($requestsSerials, $requestModel->serial_number);
        }
        return implode(", ",$requestsSerials);
    }

    public function getOffers() {
        $id = $this->id;
        $invoices = Invoice::whereId($id)->whereModelType(Offer::class)->get();
        $offersSerials = [];
        foreach ($invoices as $invoice) {
            $offerModel = Offer::whereId($invoice->model_id)->first();
            array_push($offersSerials, $offerModel->serial_number);
        }
        return implode(", ",$offersSerials);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    /**
     * Return invoice's requests
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function requests(): MorphToMany
    {
        return $this->morphedByMany(
            Request::class,
            'model',
            'invoice_has_model',
            'invoice_id',
            'model_id'
        );
    }

    /**
     * Return invoice's offers
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function offers(): MorphToMany
    {
        return $this->morphedByMany(
            Offer::class,
            'model',
            'invoice_has_model',
            'invoice_id',
            'model_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
