<?php

namespace App\Models\V1\User;

use App\Models\Model;

class UserBill extends Model
{

    /**
     * Status types list
     *
     * @var string
     */
    const STATUS_UNPAID = 'unpaid';
    const STATUS_PAID = 'paid';
    const STATUS_EXPIRED = 'expired';
    const STATUS_CANCELLED = 'cancelled';

    /**
     * Product types list
     *
     * @var string
     */
    const PRODUCT_EMPLOYEES = 'employees';
    const PRODUCT_COMPANIES = 'companies';

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
