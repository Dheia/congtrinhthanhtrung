<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungMaterialStorage extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_material_storage', function($table)
        {
            $table->decimal('amount', 20, 2)->change();
            $table->decimal('price', 20, 2)->change();
            $table->decimal('total', 20, 2)->change();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_material_storage', function($table)
        {
            $table->decimal('amount', 10, 2)->change();
            $table->decimal('price', 10, 2)->change();
            $table->decimal('total', 10, 2)->change();
        });
    }
}
