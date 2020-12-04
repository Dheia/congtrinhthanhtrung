<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungMaterial5 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->decimal('length', 10, 2)->nullable();
            $table->string('formula', 191)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->dropColumn('length');
            $table->dropColumn('formula');
        });
    }
}
