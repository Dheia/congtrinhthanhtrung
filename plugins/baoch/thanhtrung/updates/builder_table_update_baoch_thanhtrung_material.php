<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungMaterial extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->integer('material_type_id');
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_material', function($table)
        {
            $table->dropColumn('material_type_id');
        });
    }
}
