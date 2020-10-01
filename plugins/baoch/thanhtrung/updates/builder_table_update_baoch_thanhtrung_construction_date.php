<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstructionDate extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction_date', function($table)
        {
            $table->text('paid_or_received')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction_date', function($table)
        {
            $table->dropColumn('paid_or_received');
        });
    }
}
