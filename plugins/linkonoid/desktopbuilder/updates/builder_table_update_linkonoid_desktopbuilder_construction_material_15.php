<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionMaterial15 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->integer('id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->dropColumn('id');
        });
    }
}
