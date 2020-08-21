<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLinkonoidDesktopbuilderConstruction extends Migration
{
    public function up()
    {
        Schema::create('linkonoid_desktopbuilder_construction', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('address')->nullable();
            $table->double('total', 10, 0);
            $table->double('total_paid', 10, 0);
            $table->double('remaining_amount', 10, 0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('linkonoid_desktopbuilder_construction');
    }
}
