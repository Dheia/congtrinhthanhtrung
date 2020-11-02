<?php namespace Baoch\Thanhtrung\Models;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

/**
 * MaterialImport Model
 */
class MaterialImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            0 => new MaterialImportSheet1(),
//            1 => new MaterialImportSheet2(),
//            2 => new MaterialImportSheet3(),
//            3 => new MaterialImportSheet4(),
        ];
    }
}
