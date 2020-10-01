<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionMaterialPivot extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material_pivot', function($table)
        {
            $table->double('custom_price', 10, 0)->nullable();
            $table->double('amount', 10, 0)->nullable();
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material_pivot', function($table)
        {
            $table->dropColumn('custom_price');
            $table->dropColumn('amount');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
