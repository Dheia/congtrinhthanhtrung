<?php namespace Linkonoid\DesktopBuilder\Models;

use Model;

/**
 * Model
 */
class Construction extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'linkonoid_desktopbuilder_construction';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $jsonable = ['construction_material'];

   /**
     * Defined realation ship with material type
     */
    public $belongsTo = [
      // 'customer' => 'linkonoid/desktopbuilder/models/Customer',
    ];

    /**
     * Function get list customer
     */
    public function getCustomerIdOptions()
    {
        //do whatever you want to do
        $result = [];
        foreach (Customer::all() as $customer) {
            $result[$customer->id] = [$customer->name];
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
        $result[''] = '';
        foreach (Material::all() as $material) {
            $result[$material->id] = [$material->name];
        }
        return $result;
    }

    public function filterFields($fields, $context = null)
    {
        // print_r($field);
        if (!empty($fields->total)) {
            $fields->remaining_amount->value = $fields->total->value - $fields->total_paid->value;
        }
        if (!empty($fields->material_id)) {
            $material = Material::find($fields->material_id->value);
            if (!empty($material)) {

                if (!empty($fields->material_amount)) {
                    $fields->material_quantity->value = $material->quantity - $fields->material_amount->value;
                    $fields->construction_material_paid->value = $material->price * $fields->material_amount->value;
                    if (!empty($fields->material_custom_price)) {
                      $fields->construction_material_total->value = $fields->material_amount->value * $fields->material_custom_price->value;
                      $fields->material_revenue->value = $fields->construction_material_total->value - $fields->construction_material_paid->value;
                    }
                } else {
                    $fields->material_quantity->value = $material->quantity;
                    $fields->construction_material_paid->value = '0';
                }
                // $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
                // fwrite($myfile, print_r(json_decode(json_encode($material), true), true));
                // fclose($myfile);
                $fields->material_price->value = $material->price;
            }
        }

        if (!empty($fields->construction_material->value)) {
          $totalPaid  = 0;
          $totalRevenue  = 0;
          foreach ($fields->construction_material->value as $value) {
              $totalPaid += $value['construction_material_paid'];
              $totalRevenue += $value['material_revenue'];
          }
          $fields->total_construction_paid->value = $totalPaid;
          $fields->total_construction_revenue->value = $totalRevenue;
        }
      }

}
