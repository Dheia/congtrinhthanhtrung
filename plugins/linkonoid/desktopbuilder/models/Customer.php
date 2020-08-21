<?php namespace Linkonoid\DesktopBuilder\Models;

use Model;

/**
 * Model
 */
class Customer extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'linkonoid_desktopbuilder_customer';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * Defined realation ship with construction
     */
    public $hasMany = [
        'constructions' => ['linkonoid/desktopbuilder/models/Construction', 'key' => 'customer_id'],
    ];
}
