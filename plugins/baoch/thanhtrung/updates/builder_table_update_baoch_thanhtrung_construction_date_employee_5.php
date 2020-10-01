<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstructionDateEmployee5 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction_date_employee', function($table)
        {
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction_date_employee', function($table)
        {
            $table->dropColumn('description');
        });
    }
}
