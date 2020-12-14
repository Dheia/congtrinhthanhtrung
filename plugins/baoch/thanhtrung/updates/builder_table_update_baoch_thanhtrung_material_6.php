<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungMaterial6 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->dropColumn('purchase_price');
            $table->dropColumn('sale_price');
            $table->dropColumn('amount');
            $table->dropColumn('formula');
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->decimal('purchase_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('formula', 191)->nullable();
        });
    }
}
