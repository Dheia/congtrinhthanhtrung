<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionMaterialEmployee extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material_employee', function($table)
        {
            $table->dateTime('date');
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material_employee', function($table)
        {
            $table->dropColumn('date');
        });
    }
}
