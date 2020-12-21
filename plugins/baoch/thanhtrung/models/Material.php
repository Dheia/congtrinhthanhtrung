<?php namespace Baoch\Thanhtrung\Models;

use Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * Model
 */
class Material extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\Purgeable;

    protected $purgeable = ['old_total'];

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
      'material_type' => 'Baoch\Thanhtrung\Models\MaterialType',
    ];

    public $belongsToMany = [
        'storages' => [
            'Baoch\Thanhtrung\Models\Storage',
            'table' => 'baoch_thanhtrung_material_storage',
            'pivot' => ['amount', 'price', 'formula', 'total'],
        ],
        'storages_pivot' => [
            'Baoch\Thanhtrung\Models\Storage',
            'table' => 'baoch_thanhtrung_material_storage',
            'pivot' => ['amount', 'price', 'formula', 'total'],
            'pivotModel' => 'Baoch\Thanhtrung\Models\MaterialStorage',
        ],
    ];

    protected static function boot ()
    {
        parent::boot();

        static::deleting (function ($user) {
            $user->storages()->detach();
        });
    }


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

    /**
     * Function handle filter
     */
    public function filterFields($fields, $context = null)
    {
        $amount = 'pivot[amount]';
        $price = 'pivot[price]';
        $formula = 'pivot[formula]';
        $total = 'pivot[total]';
        $custom_amount = 'pivot[custom_amount]';
        $custom_price = 'pivot[custom_price]';
        $custom_formula = 'pivot[custom_formula]';
        $custom_total = 'pivot[custom_total]';
        if (!isset($fields->old_total->value)) {
            if (!empty($fields->$amount->value)) {
                $amount = $fields->$amount->value;
                $fields->old_total->value = $fields->total->value - $amount;
            } else if (!empty($fields->$custom_amount->value)) {
                $amount = $fields->$custom_amount->value;
                $fields->old_total->value = $fields->total->value + $amount;
            } else {
                $fields->old_total->value = $fields->total->value + 0;
            }
        }
        if (!empty($fields->length->value) &&
            !empty($fields->total_weight->value) &&
            !empty($fields->$amount->value) &&
            !empty($fields->$price->value) &&
            !empty($fields->$formula->value)) {
            // Calculate using excel format
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', $fields->length->value);
            $sheet->setCellValue('A2', $fields->total_weight->value);
            $sheet->setCellValue('A3', $fields->$amount->value);
            $sheet->setCellValue('A4', $fields->$price->value);
            $sheet->setCellValue('C1', '=' . $fields->$formula->value);
            $fields->$total->value = $sheet->getCell('C1')->getCalculatedValue();
            unset($sheet);
        }
        if (!empty($fields->length->value) &&
            !empty($fields->total_weight->value) &&
            !empty($fields->$custom_amount->value) &&
            !empty($fields->$custom_price->value) &&
            !empty($fields->$custom_formula->value)) {
            // Calculate using excel format
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', $fields->length->value);
            $sheet->setCellValue('A2', $fields->total_weight->value);
            $sheet->setCellValue('A3', $fields->$custom_amount->value);
            $sheet->setCellValue('A4', $fields->$custom_price->value);
            $sheet->setCellValue('C1', '=' . $fields->$custom_formula->value);
            $fields->$custom_total->value = $sheet->getCell('C1')->getCalculatedValue();
            unset($sheet);
        }
        if (!empty($fields->$amount->value)) {
            $fields->total->value = $fields->old_total->value + $fields->$amount->value;
        }
        if (!empty($fields->$custom_amount->value)) {
            $fields->total->value = $fields->old_total->value - $fields->$custom_amount->value;
        }
    }

//    public function beforeDelete(){
//        $this->storages->detach();
//    }
}
