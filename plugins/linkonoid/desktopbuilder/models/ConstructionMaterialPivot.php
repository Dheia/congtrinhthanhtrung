<?php namespace Linkonoid\DesktopBuilder\Models;

use Model;

/**
 * Model
 */
class ConstructionMaterialPivot extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'linkonoid_desktopbuilder_construction_material_pivot';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
