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
            'pivotModel' => 'Baoch\Thanhtrung\Models\ConstructionDateMaterial',
        ],
        'employees' => [
            'Baoch\Thanhtrung\Models\Employee',
            'table' => 'baoch_thanhtrung_construction_date_employee',
        ],
        'employees_pivot' => [
            'Baoch\Thanhtrung\Models\Employee',
            'table' => 'baoch_thanhtrung_construction_date_employee',
            'pivot' => ['custom_salary', 'working_hour', 'description'],
            'pivotModel' => 'Baoch\Thanhtrung\Models\ConstructionDateEmployee',
        ],
    ];

    public $belongsTo = [
        'construction' => 'Baoch\Thanhtrung\Models\Construction',
        'customer' => 'Baoch\Thanhtrung\Models\Customer',
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
        $totalPaid = 0;
        $totalIncome = 0;
        if (!empty($fields->paid_or_received->value)) {
            foreach ($fields->paid_or_received->value as $value) {
                if (!empty($value['isPaid']) && $value['isPaid'] == 'thu') {
                    $totalIncome += $value['price'];
                }
                if (!empty($value['isPaid']) && $value['isPaid'] == 'chi') {
                    $totalPaid += $value['price'];
                }
            }
        }
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
                    $totalPaid += $value->pivot->custom_salary * $value->pivot->working_hour;
                }
            }
        }
        if (!empty($fields->total_paid)) {
            $fields->total_paid->value = -$totalPaid;
        }
        if (!empty($fields->total_income)) {
            $fields->total_income->value = $totalIncome;
        }

    }

}
