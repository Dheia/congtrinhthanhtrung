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
    public $table = 'baoch_thanhtrung_construction';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
      'customer' => 'baoch\thanhtrung\models\Customer',
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
