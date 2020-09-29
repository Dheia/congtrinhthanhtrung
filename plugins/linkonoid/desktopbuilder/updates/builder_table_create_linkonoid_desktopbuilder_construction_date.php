<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLinkonoidDesktopbuilderConstructionDate extends Migration
{
    public function up()
    {
        Schema::create('linkonoid_desktopbuilder_construction_date', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('construction_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('linkonoid_desktopbuilder_construction_date');
    }
}
