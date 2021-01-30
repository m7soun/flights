<?php

namespace App\Models\V1\User;

use App\Models\V1\Lookup\LookupCountry;
use App\Models\V1\Support\SupportTicket;
use App\Models\V1\TaxReturn\TaxReturn;
use App\Models\V1\TaxReturn\TaxReturnChildren;
use App\Models\V1\TaxReturn\TaxReturnPWSN;
use App\Models\V1\TaxReturn\TaxReturnResidence;
use App\Models\V1\TaxReturn\TaxReturnSpouse;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * Constants
     */
    // Status Types
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'app_master';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Prevent Eloquent from overriding uuid with `lastInsertId`.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $casts = [
        'password' => 'string',
        'avatar' => 'string',
        'phone' => 'string',
        'username' => 'string',
    ];

    /**
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Relationships
     */
    //Fetch user bills
    public function bills()
    {
        return $this->hasMany(UserBill::class, 'user_uuid', 'uuid');
    }
}
