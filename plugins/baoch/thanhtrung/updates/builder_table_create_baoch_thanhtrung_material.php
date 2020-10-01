<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBaochThanhtrungMaterial extends Migration
{
    public function up()
    {
        Schema::create('baoch_thanhtrung_material', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('baoch_thanhtrung_material');
    }
}
