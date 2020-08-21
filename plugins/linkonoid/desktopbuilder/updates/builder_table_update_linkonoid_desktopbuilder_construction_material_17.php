<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionMaterial17 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->integer('construction_id')->unsigned(false)->change();
            $table->integer('material_id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->integer('construction_id')->unsigned()->change();
            $table->integer('material_id')->unsigned()->change();
        });
    }
}
