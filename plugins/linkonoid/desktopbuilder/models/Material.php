<?php namespace Linkonoid\DesktopBuilder\Models;

use Model;

/**
 * Model
 */
class Material extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'linkonoid_desktopbuilder_material';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * Defined realation ship with material type
     */
    public $belongsTo = [
        'material_type' => 'linkonoid/desktopbuilder/models/MaterialType',
      ];

    /**
     * Function get list material type
     */
    public function getMaterialTypeIdOptions()
    {
        //do whatever you want to do
        $result = [];
        foreach (MaterialType::all() as $materialType) {
            $result[$materialType->id] = [$materialType->name, $materialType->description];
        }
        return $result;
    }

}
