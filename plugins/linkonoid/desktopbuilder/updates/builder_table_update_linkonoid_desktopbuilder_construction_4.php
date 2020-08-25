<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstruction4 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction', function($table)
        {
            $table->text('customer_id')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction', function($table)
        {
            $table->integer('customer_id')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
