<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstructionDate3 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction_date', function($table)
        {
            $table->decimal('total_income', 10, 0)->nullable();
            $table->decimal('total_paid', 10, 0);
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction_date', function($table)
        {
            $table->dropColumn('total_income');
            $table->dropColumn('total_paid');
        });
    }
}
