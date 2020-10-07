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
            'pivotModel' => 'baoch\thanhtrung\models\ConstructionDateMaterial',
        ],
        'employees' => [
            'Baoch\Thanhtrung\Models\Employee',
            'table' => 'baoch_thanhtrung_construction_date_employee',
        ],
        'employees_pivot' => [
            'Baoch\Thanhtrung\Models\Employee',
            'table' => 'baoch_thanhtrung_construction_date_employee',
            'pivot' => ['custom_salary', 'working_hour', 'description'],
            'pivotModel' => 'baoch\thanhtrung\models\ConstructionDateEmployee',
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

    /**
     * Function handle filter
     */
    public function filterFields($fields, $context = null)
    {
        // if (!empty($fields)) {
        //   print_r($field);
        // }
        // if (!empty($fields->total)) {
        //     $fields->remaining_amount->value = $fields->total->value - $fields->total_paid->value;
        // }
        // if (!empty($fields->material_id)) {
        //     $material = Material::find($fields->material_id->value);
        //     if (!empty($material)) {

        //         if (!empty($fields->material_amount)) {
        //             $fields->material_quantity->value = $material->quantity - $fields->material_amount->value;
        //             $fields->construction_material_paid->value = $material->price * $fields->material_amount->value;
        //             if (!empty($fields->material_custom_price)) {
        //               $fields->construction_material_total->value = $fields->material_amount->value * $fields->material_custom_price->value;
        //               $fields->material_revenue->value = $fields->construction_material_total->value - $fields->construction_material_paid->value;
        //             }
        //         } else {
        //             $fields->material_quantity->value = $material->quantity;
        //             $fields->construction_material_paid->value = '0';
        //         }
        //         // $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        //         // fwrite($myfile, print_r(json_decode(json_encode($material), true), true));
        //         // fclose($myfile);
        //         $fields->material_price->value = $material->price;
        //     }
        // }

        if (!empty($fields->paid_or_received->value)) {
            // print_r($fields->paid_or_received->value);
            $totalPaid = 0;
            $totalIncome = 0;
            foreach ($fields->paid_or_received->value as $value) {
                if (!empty($value['isPaid']) && $value['isPaid'] == 'thu') {
                    $totalIncome += $value['price'];
                }
                if (!empty($value['isPaid']) && $value['isPaid'] == 'chi') {
                    $totalPaid += $value['price'];
                }
            }
            // echo "<pre>";
            // if (!empty($fields->id)) {
            //   print_r($fields->id);
            //   // $construction = Construction::find($fields->construction_id->value);
            //   // print_r($construction->ma);
            // }
            // print_r(json_decode(json_encode($this->id)));
            $constructionDate = ConstructionDate::find($this->id);
            if (!empty($constructionDate->materials_pivot)) {
                foreach ($constructionDate->materials_pivot as $value) {
                    if (!empty($value->pivot->custom_price)) {
                      $totalPaid += $value->pivot->custom_price;
                    }
                }
            }
            if (!empty($constructionDate->employees_pivot)) {
              foreach ($constructionDate->employees_pivot as $value) {
                  if (!empty($value->pivot->custom_salary) && !empty($value->pivot->working_hour)) {
                    // print_r($value->pivot);
                    $totalPaid += $value->pivot->custom_salary * $value->pivot->working_hour;
                  }
              }
          }
            // foreach ($constructionDate->materials_pivot)
            // foreach ($fields->materials_pivot->value as $v) {
            //   if (!empty($v)) {
            //     echo "<pre>";
            //     print_r(Material::find($v));
            //     // die;
            //   }
            // }
            // foreach($fields->materials_pivot->value as $value) {
            //   if (!empty($value)) {
            //     print_r(json_decode(json_encode($value)));
            //   }
            // }
            $fields->total_paid->value = -$totalPaid;
            $fields->total_income->value = $totalIncome;
        }
    }

}
