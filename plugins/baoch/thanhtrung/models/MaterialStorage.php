<?php namespace Baoch\Thanhtrung\Models;

use October\Rain\Database\Pivot;

/**
 * Model
 */
class MaterialStorage extends Pivot
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var array Rules
     */
    public $rules = [];
}
