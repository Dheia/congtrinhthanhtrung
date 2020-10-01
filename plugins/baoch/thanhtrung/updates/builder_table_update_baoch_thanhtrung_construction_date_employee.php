<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstructionDateEmployee extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction_date_employee', function($table)
        {
            $table->decimal('custom_salary', 10, 0)->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction_date_employee', function($table)
        {
            $table->double('custom_salary', 10, 0)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
