<?php namespace Baoch\Thanhtrung\Models;

use October\Rain\Database\Pivot;

/**
 * User-Role Pivot Model
 */
class ConstructionDateMaterial extends Pivot
{

    use \October\Rain\Database\Traits\Validation;

    /**
     * @var array Rules
     */
    public $rules = [
        'custom_amount' => 'required|min:0.0|max:10.0',
        'custom_price' => 'required|min:0.0|max:10.0',
    ];

}