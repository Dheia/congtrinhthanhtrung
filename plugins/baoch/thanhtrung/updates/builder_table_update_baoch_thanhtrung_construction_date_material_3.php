<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstructionDateMaterial3 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->smallInteger('custom_price')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->smallInteger('custom_price')->nullable(false)->change();
        });
    }
}
