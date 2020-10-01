<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungEmployee extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_employee', function($table)
        {
            $table->decimal('base_salary', 10, 2)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_employee', function($table)
        {
            $table->dropColumn('base_salary');
        });
    }
}
