<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLinkonoidDesktopbuilderConstructionMaterial extends Migration
{
    public function up()
    {
        Schema::dropIfExists('linkonoid_desktopbuilder_construction_material');
    }
    
    public function down()
    {
        Schema::create('linkonoid_desktopbuilder_construction_material', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('construction_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->double('material_amount', 10, 0)->nullable()->default(0);
            $table->primary(['construction_id','material_id']);
        });
    }
}
