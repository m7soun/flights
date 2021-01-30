<?php

namespace App\Models\V1\User;

use App\Models\Model;

class UserPaymentTransaction extends Model
{

    /**
     * Status types list
     *
     * @var string
     */
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_DELETED = 'deleted';

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
    protected $table = 'users_bills';

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    protected $casts = [
        'user_uuid' => 'string',
        'code' => 'string',
        'amount' => 'string',
        'product' => 'string',
        'tax_percent' => 'string',
        'tax' => 'string',
        'total' => 'string',
        'status' => 'string',
    ];

    /**
     *
     * @var array
     */
    protected $dates = [
        'paid_at',
        'expired_at',
        'cancelled_at',
        'terminated_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Relationships
     */
}
