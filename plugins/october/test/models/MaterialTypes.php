<?php namespace October\Test\Models;

use Model;

/**
 * Model
 */
class MaterialTypes extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'october_test_material_types';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
