<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstructionDateMaterial6 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->text('description')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->text('description')->nullable(false)->change();
        });
    }
}
