<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstruction3 extends Migration
{
    public function up()
    {
        Schema::table('linkonoid_desktopbuilder_construction', function($table)
        {
            $table->double('total_construction_paid', 10, 0)->nullable();
            $table->double('total_construction_revenue', 10, 0)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('linkonoid_desktopbuilder_construction', function($table)
        {
            $table->dropColumn('total_construction_paid');
            $table->dropColumn('total_construction_revenue');
        });
    }
}
