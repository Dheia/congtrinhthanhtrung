<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstruction2 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction', function($table)
        {
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction', function($table)
        {
            $table->dropColumn('description');
        });
    }
}
