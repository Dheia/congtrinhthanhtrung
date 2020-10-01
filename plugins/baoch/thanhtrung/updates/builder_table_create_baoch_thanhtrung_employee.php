<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBaochThanhtrungEmployee extends Migration
{
    public function up()
    {
        Schema::create('baoch_thanhtrung_employee', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('baoch_thanhtrung_employee');
    }
}
