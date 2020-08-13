<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderMaterial extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_material', function($table)
        {
            $table->integer('material_type');
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_material', function($table)
        {
            $table->dropColumn('material_type');
        });
    }
}
