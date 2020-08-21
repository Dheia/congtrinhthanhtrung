<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLinkonoidDesktopbuilderCustomer extends Migration
{
    public function up()
    {
        Schema::create('linkonoid_desktopbuilder_customer', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->text('note');
            $table->double('total_paid', 10, 0)->default(0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('linkonoid_desktopbuilder_customer');
    }
}
