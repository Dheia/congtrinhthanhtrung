<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBaochThanhtrungMaterialType extends Migration
{
    public function up()
    {
        Schema::create('baoch_thanhtrung_material_type', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('baoch_thanhtrung_material_type');
    }
}
