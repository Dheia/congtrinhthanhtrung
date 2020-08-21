<?php namespace Linkonoid\DesktopBuilder\Models;

use Model;

/**
 * Model
 */
class ConstructionMaterial extends Model
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
    public $table = 'linkonoid_desktopbuilder_construction_material';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * Relationship of construction and material
     */
    public $belongsToMany = [
      'constructions' => 'linkonoid/desktopbuilder/models/Construction',
      'materials' => 'linkonoid/desktopbuilder/models/Material',
    ];

    /**
     * Function get list customer
     */
    public function getConstructionIdOptions()
    {
      //do whatever you want to do
      $result = [];
      foreach (Construction::all() as $construction) {
          $result[$construction->id] = [$construction->name];
      }
      return $result;
    }

    /**
     * Function get list material
     */
    public function getMaterialIdOptions()
    {
      //do whatever you want to do
      $result = [];
      foreach (Material::all() as $material) {
          $result[$material->id] = [$material->name];
      }
      return $result;
    }

        /**
     * Function get list material
     */
    public function filterFields($fields, $context = null)
    {
        $material = Material::find($fields->material_id->value);
        if (!empty($material)) {
          $fields->material_price->value = $material->price;
        }
    }


}
