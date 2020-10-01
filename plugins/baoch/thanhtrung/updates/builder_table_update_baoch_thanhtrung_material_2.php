<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungMaterial2 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->text('description')->nullable();
            $table->decimal('purchase_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->dropColumn('description');
            $table->dropColumn('purchase_price');
            $table->dropColumn('sale_price');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
}
