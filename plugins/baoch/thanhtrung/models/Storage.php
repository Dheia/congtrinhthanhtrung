<?php namespace Baoch\Thanhtrung\Models;

use Model;

/**
 * Model
 */
class Storage extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'baoch_thanhtrung_storage';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'materials' => [
            'Baoch\Thanhtrung\Models\Material',
            'table' => 'baoch_thanhtrung_material_storage',
        ],
        'materials_pivot' => [
            'Baoch\Thanhtrung\Models\Material',
            'table' => 'baoch_thanhtrung_material_storage',
            'pivot' => ['amount', 'price', 'formula', 'total'],
            'pivotModel' => 'Baoch\Thanhtrung\Models\MaterialStorage',
        ],
    ];
}
