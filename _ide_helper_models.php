<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Offer
 *
 * @property int $id
 * @property string|null $customer_name
 * @property string|null $customer_email
 * @property string|null $customer_phone
 * @property string|null $device
 * @property string|null $serial_number
 * @property string $status
 * @property string|null $cost
 * @property string|null $percentage
 * @property string|null $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoice
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereCustomerPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Offer whereUpdatedAt($value)
 */
	class Offer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BackpackUser
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser role($roles)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereUpdatedAt($value)
 */
	class BackpackUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Request
 *
 * @property int $id
 * @property string|null $customer_name
 * @property string|null $customer_email
 * @property string|null $customer_phone
 * @property string|null $device
 * @property string|null $serial_number
 * @property string $type
 * @property string $status
 * @property string|null $cost
 * @property string|null $details
 * @property string|null $deadline
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoice
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereCustomerPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereUpdatedAt($value)
 */
	class Request extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Invoice
 *
 * @property int $id
 * @property int|null $model_id
 * @property string|null $model_type
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Offer[] $offers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Request[] $requests
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice whereUpdatedAt($value)
 */
	class Invoice extends \Eloquent {}
}

