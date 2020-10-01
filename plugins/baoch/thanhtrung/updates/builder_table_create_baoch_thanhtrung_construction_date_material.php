<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBaochThanhtrungConstructionDateMaterial extends Migration
{
    public function up()
    {
        Schema::create('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('construction_date_id');
            $table->integer('material_id');
            $table->double('custom_price', 10, 0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('baoch_thanhtrung_construction_date_material');
    }
}
