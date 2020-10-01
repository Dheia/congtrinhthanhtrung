<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungCustomer extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_customer', function($table)
        {
            $table->text('mobile');
            $table->text('email')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_customer', function($table)
        {
            $table->dropColumn('mobile');
            $table->dropColumn('email');
        });
    }
}
