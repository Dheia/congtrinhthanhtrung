<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLinkonoidDesktopbuilderMaterial extends Migration
{
    public function up()
    {
        Schema::create('linkonoid_desktopbuilder_material', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->double('price', 10, 0);
            $table->double('quantity', 10, 0);
            $table->string('unit');
            $table->text('description');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('linkonoid_desktopbuilder_material');
    }
}
