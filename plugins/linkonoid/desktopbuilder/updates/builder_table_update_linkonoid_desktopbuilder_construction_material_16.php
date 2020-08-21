<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionMaterial16 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->string('construction_name', 191)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->string('construction_name', 191)->nullable(false)->change();
        });
    }
}
