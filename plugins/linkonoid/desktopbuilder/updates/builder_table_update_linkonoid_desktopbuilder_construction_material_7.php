<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionMaterial7 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->integer('material_amount')->nullable(false)->unsigned(false)->default(null)->change();
            $table->integer('material_price')->nullable(false)->unsigned(false)->default(null)->change();
            $table->integer('custom_price')->nullable(false)->unsigned(false)->default(null)->change();
            $table->string('material_name', 191)->nullable(false)->change();
            $table->string('construction_name', 191)->nullable(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->double('material_amount', 10, 2)->nullable()->unsigned(false)->default(0.00)->change();
            $table->double('material_price', 10, 2)->nullable()->unsigned(false)->default(0.00)->change();
            $table->double('custom_price', 10, 2)->nullable()->unsigned(false)->default(0.00)->change();
            $table->string('material_name', 191)->nullable()->change();
            $table->string('construction_name', 191)->nullable()->change();
        });
    }
}
