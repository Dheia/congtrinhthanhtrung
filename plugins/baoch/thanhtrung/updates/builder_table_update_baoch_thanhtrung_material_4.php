<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungMaterial4 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->string('color')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->dropColumn('color');
        });
    }
}
