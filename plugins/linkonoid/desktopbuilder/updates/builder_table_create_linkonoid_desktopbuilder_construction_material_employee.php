<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLinkonoidDesktopbuilderConstructionMaterialEmployee extends Migration
{
    public function up()
    {
        Schema::create('linkonoid_desktopbuilder_construction_material_employee', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('construction_id');
            $table->integer('material_id');
            $table->integer('employee_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('linkonoid_desktopbuilder_construction_material_employee');
    }
}
