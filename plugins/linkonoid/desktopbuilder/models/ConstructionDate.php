<?php namespace Linkonoid\DesktopBuilder\Models;

use Model;

/**
 * Model
 */
class ConstructionDate extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'linkonoid_desktopbuilder_construction_date';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $jsonable = ['received_or_paid'];

    /**
     * @var array Relations
     */
    public $belongsToMany = [
      'materials' => [
          'Linkonoid\DesktopBuilder\Models\Material',
          'table' => 'linkonoid_desktopbuilder_construction_material_pivot',
          'timestamps' => true,
          'key' => 'material_id',
      ],
      'construction_materials_pivot' => [
          'Linkonoid\DesktopBuilder\Models\Material',
          'table' => 'linkonoid_desktopbuilder_construction_material_pivot',
          'pivot' => ['custom_price', 'amount'],
          'timestamps' => true,
        ],
      'employees' => [
        'Linkonoid\DesktopBuilder\Models\Employee',
        'table' => 'linkonoid_desktopbuilder_construction_employee_pivot',
        'timestamps' => true,
        'key' => 'employee_id',
      ],
      // 'materials_count' => [
      //   'Linkonoid\DesktopBuilder\Models\Material',
      //   'table' => 'linkonoid_desktopbuilder_material',
      //   'count' => true
      // ],
      // 'materials_pivot' => [
      //     'Linkonoid\DesktopBuilder\Models\Material',
      //     'table' => 'linkonoid_desktopbuilder_material',
      //     'pivot' => ['clearance_level', 'is_executive'],
      //     'timestamps' => true
      // ],
      // 'materials_pivot_model' => [
      //     'Linkonoid\DesktopBuilder\Models\Material',
      //     'table' => 'linkonoid_desktopbuilder_material',
      //     'pivot' => ['clearance_level', 'is_executive'],
      //     'timestamps' => true,
      //     'pivotModel' => 'Linkonoid\DesktopBuilder\Models\ConstructionMaterialPivot',
      // ],
    ];

    public $belongsTo = [
      'construction' => 'linkonoid/desktopbuilder/models/Construction',
    ];

    /**
     * Function get list material type
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

    
}
