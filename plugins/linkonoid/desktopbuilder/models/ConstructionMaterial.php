<?php namespace Linkonoid\DesktopBuilder\Models;

use Model;

/**
 * Model
 */
class ConstructionMaterial extends Model
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
    public $table = 'linkonoid_desktopbuilder_construction_material';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];


    // public $hasMany = [
    //   // 'material' =>[
    //   //     'linkonoid/desktopbuilder/models/Material',
    //   //     'table' => 'linkonoid_desktopbuilder_material',
    //   //     'key'=>'construction_id'
    //   // ],
    //   'construction' =>[
    //     'linkonoid/desktopbuilder/models/Construction',
    //     'table' => 'linkonoid_desktopbuilder_construction',
    //     'key'=>'construction_id'
    // ],
    // ];

    public $belongsToMany = [
      'construction' => 'linkonoid/desktopbuilder/models/Construction',
    ];
}
