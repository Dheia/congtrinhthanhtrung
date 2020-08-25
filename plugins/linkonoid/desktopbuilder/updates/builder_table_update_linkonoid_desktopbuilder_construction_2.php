<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstruction2 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction', function($table)
        {
            $table->renameColumn('constuctor_material', 'construction_material');
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction', function($table)
        {
            $table->renameColumn('construction_material', 'constuctor_material');
        });
    }
}
