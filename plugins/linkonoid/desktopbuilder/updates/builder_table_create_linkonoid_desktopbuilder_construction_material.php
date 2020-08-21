<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLinkonoidDesktopbuilderConstructionMaterial extends Migration
{
    public function up()
    {
        Schema::create('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('construction_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->integer('amount_material')->nullable()->default(0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('linkonoid_desktopbuilder_construction_material');
    }
}
