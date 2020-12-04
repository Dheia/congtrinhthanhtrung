<?php namespace Baoch\Thanhtrung\Models;

use Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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


    /**
     * Function handle filter
     */
    public function filterFields($fields, $context = null)
    {
        if (!empty($fields->length->value) &&
            !empty($fields->amount->value) &&
            !empty($fields->total_weight->value) &&
            !empty($fields->purchase_price->value) &&
            !empty($fields->formula->value)) {
            // Calculate using excel format
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', $fields->amount->value);
            $sheet->setCellValue('B1', $fields->purchase_price->value);
            $sheet->setCellValue('C1', $fields->amount->value);
            $sheet->setCellValue('D1', $fields->purchase_price->value);
            $sheet->setCellValue('A2', '=' . $fields->formula->value);
            $fields->sale_price->value = $sheet->getCell('A2')->getCalculatedValue();
        }
    }

}
