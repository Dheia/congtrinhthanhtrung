<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungCustomer2 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_customer', function($table)
        {
            $table->decimal('total_paid', 10, 2)->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_customer', function($table)
        {
            $table->decimal('total_paid', 10, 2)->default(null)->change();
        });
    }
}
