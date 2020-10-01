<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstructionDateEmployee3 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction_date_employee', function($table)
        {
            $table->decimal('custom_salary', 20, 2)->change();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction_date_employee', function($table)
        {
            $table->decimal('custom_salary', 10, 2)->change();
        });
    }
}
