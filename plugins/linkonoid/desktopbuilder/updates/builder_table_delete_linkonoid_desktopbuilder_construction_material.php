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
            $table->integer('construction_id');
            $table->smallInteger('material_id');
            $table->primary(['construction_id','material_id']);
        });
    }
}
