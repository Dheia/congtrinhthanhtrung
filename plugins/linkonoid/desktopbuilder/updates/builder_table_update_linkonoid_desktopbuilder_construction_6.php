<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstruction6 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction', function($table)
        {
            $table->text('construction_material')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction', function($table)
        {
            $table->dropColumn('construction_material');
        });
    }
}
