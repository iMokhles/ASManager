<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Request extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'requests';
    protected $primaryKey = 'id';
    public $timestamps = true;
//    protected $guarded = ['id'];
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'device',
        'serial_number',
        'type',
        'status',
        'cost',
        'details',
        'deadline'
    ];
//    protected $hidden = [];
    protected $dates = ['created_at', 'updated_at'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getRequestStatus() {

        return trans('web_dashboard.'.$this->status);
    }
    public function getRequestType() {

        return trans('web_dashboard.'.$this->type);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    /**
     * Return request invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */

    public function invoices(): MorphToMany
    {
        return $this->morphToMany(
            Invoice::class,
            'model',
            'invoice_has_model',
            'model_id',
            'invoice_id'
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
