<?php namespace RainLab\Builder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRainlabBuilderTest extends Migration
{
    public function up()
    {
        Schema::create('rainlab_builder_test', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->smallInteger('price');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rainlab_builder_test');
    }
}
