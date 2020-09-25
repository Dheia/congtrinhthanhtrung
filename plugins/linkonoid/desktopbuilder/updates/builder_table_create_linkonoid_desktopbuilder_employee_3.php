<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLinkonoidDesktopbuilderEmployee3 extends Migration
{
    public function up()
    {
        Schema::create('linkonoid_desktopbuilder_employee', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->double('base_salary', 10, 0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('linkonoid_desktopbuilder_employee');
    }
}
