<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderMaterial2 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_material', function($table)
        {
            $table->renameColumn('material_type', 'material_type_id');
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_material', function($table)
        {
            $table->renameColumn('material_type_id', 'material_type');
        });
    }
}
