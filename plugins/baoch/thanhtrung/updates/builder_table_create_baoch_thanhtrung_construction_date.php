<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBaochThanhtrungConstructionDate extends Migration
{
    public function up()
    {
        Schema::create('baoch_thanhtrung_construction_date', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('construction_id');
            $table->dateTime('date');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('baoch_thanhtrung_construction_date');
    }
}
