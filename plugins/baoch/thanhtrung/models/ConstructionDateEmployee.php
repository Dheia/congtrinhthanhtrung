<?php namespace Baoch\Thanhtrung\Models;

use October\Rain\Database\Pivot;

/**
 * User-Role Pivot Model
 */
class ConstructionDateEmployee extends Pivot
{

    use \October\Rain\Database\Traits\Validation;

    /**
     * @var array Rules
     */
    public $rules = [
        'custom_salary' => 'required|min:0.0|max:10.0',
        'working_hour' => 'required|min:0.0|max:10.0',
    ];

}