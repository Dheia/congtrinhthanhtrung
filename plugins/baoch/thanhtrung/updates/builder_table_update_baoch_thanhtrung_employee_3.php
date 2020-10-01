<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungEmployee3 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_employee', function($table)
        {
            $table->string('mobile')->nullable();
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_employee', function($table)
        {
            $table->dropColumn('mobile');
            $table->dropColumn('description');
        });
    }
}
