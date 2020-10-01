<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstructionDateMaterial extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->dropColumn('custom_price');
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->double('custom_price', 10, 0);
        });
    }
}
