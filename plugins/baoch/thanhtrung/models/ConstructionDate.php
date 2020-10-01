<?php namespace Baoch\Thanhtrung\Models;

use Model;

/**
 * Model
 */
class ConstructionDate extends Model
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
    public $table = 'baoch_thanhtrung_construction_date';
    protected $jsonable = ['paid_or_received'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $belongsToMany = [
      'materials' => [
          'Baoch\Thanhtrung\Models\Material',
          'table' => 'baoch_thanhtrung_construction_date_material',
      ],
      'materials_pivot' => [
          'Baoch\Thanhtrung\Models\Material',
          'table' => 'baoch_thanhtrung_construction_date_material',
          'pivot' => ['custom_price', 'custom_amount', 'description'],
      ],
      'employees' => [
          'Baoch\Thanhtrung\Models\Employee',
          'table' => 'baoch_thanhtrung_construction_date_employee',
      ],
      'employees_pivot' => [
          'Baoch\Thanhtrung\Models\Employee',
          'table' => 'baoch_thanhtrung_construction_date_employee',
          'pivot' => ['custom_salary', 'working_hour', 'description'],
      ],
    ];

    public $belongsTo = [
      'construction' => 'baoch\thanhtrung\models\Construction',
      'customer' => 'baoch\thanhtrung\models\Customer',
    ];

    /**
     * Function get list construction
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
