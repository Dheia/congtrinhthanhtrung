<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionDate3 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction_date', function($table)
        {
            $table->increments('id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction_date', function($table)
        {
            $table->dropColumn('id');
        });
    }
}
