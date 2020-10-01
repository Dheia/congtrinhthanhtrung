<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungMaterial3 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('code');
            $table->decimal('total_weight', 10, 2)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->dropColumn('amount');
            $table->dropColumn('code');
            $table->dropColumn('total_weight');
        });
    }
}
