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
            $length = empty(trim($row[3])) ? 0 : number_format(trim($row[3]), 2, '.', '');
            $total_weight = empty(trim($row[4])) ? 0 : number_format(trim($row[4]), 2, '.','');
            $amount = empty(trim($row[5])) ? 0 : number_format(str_replace(['.', ',', ' '], '', trim($row[5])) ,0,'.', '');
            $price = empty(trim($row[7])) ? 0 : number_format(str_replace(['.', ',', ' '], '', trim($row[7])),0, '.', '');
            //print_r($length . ' - ' . $total_weight . ' - ' . $amount . ' - ' . $price);die;
            // Get storage
            $cDate = (new \DateTime())->setTimezone(new \DateTimeZone('Asia/Ho_Chi_Minh'))->format('Y-m-d');
            $storage = Storage::where('date', $cDate)->first();
            if (!$storage) {
                $storage = new Storage();
                $storage->date = $cDate;
                $storage->save();
            }
            // Get martial
            $material = Material::where('code', $row[1])->first();
            if (!$material) {
                $material = new Material;
                $material->code = $row[1];
                $material->name = $row[2];
                $material->length = $length;
                $material->total_weight = $total_weight;
                $material->material_type_id = 3;
                $material->save();
            }
            // Create pivot
            if ($storage->materials->count() == 0) {
                $storage->materials()->attach($material,
                    ['amount'=> $amount,
                        'price'=> $price,
                        'formula' => "A1*A2*A3*A4",
                        'total' => $length * $total_weight * $amount * $price]);
                $material->total += $amount;
            }

            return $material;
        }

        return null;
    }
}
