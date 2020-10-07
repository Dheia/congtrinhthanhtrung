<?php namespace Baoch\Thanhtrung\Models;

use Model;

/**
 * Model
 */
class Construction extends Model
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
    public $table = 'baoch_thanhtrung_construction_date_material';

    /**
     * @var array Validation rules
     */
    public $rules = [
      'clearance_level' => 'required|min:3',
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
}
