<?php namespace Baoch\Thanhtrung\Models;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

/**
 * MaterialImport Model
 */
class MaterialImportSheet1 implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 9;
    }

    /**
     * @param array $row
     *
     * @return Material|null
     */
    public function model(array $row)
    {
        if (!empty($row[0])) {
            $martialCheck = Material::where('code', $row[1])->first();
            if ($martialCheck) {
                return null;
            }
            $material = new Material;
            $material->code = $row[1];
            $material->name = $row[2];
            $material->length = $row[3];
            $material->total_weight = $row[4];
            $material->amount = $row[5];
            $material->purchase_price = str_replace(',', '', $row[7]);
            $material->material_type_id = 3;

            return $material;
        }

        return null;
    }
}
