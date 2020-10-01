<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstructionDateMaterial4 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->decimal('custom_price', 20, 2)->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->smallInteger('custom_price')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
