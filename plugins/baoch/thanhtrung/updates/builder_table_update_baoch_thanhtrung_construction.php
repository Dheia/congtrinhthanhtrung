<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstruction extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction', function($table)
        {
            $table->text('address')->nullable();
            $table->decimal('estimated_price', 20, 2);
            $table->decimal('prepaid', 20, 2)->default(0);
            $table->integer('customer_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction', function($table)
        {
            $table->dropColumn('address');
            $table->dropColumn('estimated_price');
            $table->dropColumn('prepaid');
            $table->dropColumn('customer_id');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
}
