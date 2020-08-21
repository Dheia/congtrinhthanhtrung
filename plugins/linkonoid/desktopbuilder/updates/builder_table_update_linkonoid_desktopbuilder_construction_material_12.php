<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionMaterial12 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->double('custom_price', 10, 0);
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->dropColumn('custom_price');
        });
    }
}
