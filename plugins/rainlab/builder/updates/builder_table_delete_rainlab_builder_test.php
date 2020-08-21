<?php namespace RainLab\Builder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteRainlabBuilderTest extends Migration
{
    public function up()
    {
        Schema::dropIfExists('rainlab_builder_test');
    }
    
    public function down()
    {
        Schema::create('rainlab_builder_test', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 191);
            $table->smallInteger('price');
        });
    }
}
