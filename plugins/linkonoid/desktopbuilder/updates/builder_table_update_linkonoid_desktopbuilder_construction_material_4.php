<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionMaterial4 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->double('material_amount', 10, 2)->nullable()->default(0);
            $table->double('material_price', 10, 2)->nullable()->default(0);
            $table->dropColumn('amount_material');
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->dropColumn('material_amount');
            $table->dropColumn('material_price');
            $table->integer('amount_material')->nullable()->default(0);
        });
    }
}
