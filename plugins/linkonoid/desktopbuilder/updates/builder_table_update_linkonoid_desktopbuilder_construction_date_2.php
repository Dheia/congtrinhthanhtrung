<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionDate2 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction_date', function($table)
        {
            $table->text('received_or_paid')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction_date', function($table)
        {
            $table->dropColumn('received_or_paid');
        });
    }
}
