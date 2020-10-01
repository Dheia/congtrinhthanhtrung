<?php namespace Baoch\Thanhtrung\Models;

use Model;

/**
 * Model
 */
class Material extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'baoch_thanhtrung_material';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * Defined realation ship with material type
     */
    public $belongsTo = [
      'material_type' => 'baoch\thanhtrung\models\MaterialType',
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
