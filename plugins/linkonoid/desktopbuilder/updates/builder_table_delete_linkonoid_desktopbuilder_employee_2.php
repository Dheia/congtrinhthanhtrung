<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLinkonoidDesktopbuilderEmployee2 extends Migration
{
    public function up()
    {
        Schema::dropIfExists('linkonoid_desktopbuilder_employee');
    }
    
    public function down()
    {
        Schema::create('linkonoid_desktopbuilder_employee', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 191);
        });
    }
}
