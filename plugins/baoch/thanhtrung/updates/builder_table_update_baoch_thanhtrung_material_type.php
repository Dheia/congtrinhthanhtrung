<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungMaterialType extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_material_type', function($table)
        {
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_material_type', function($table)
        {
            $table->dropColumn('description');
        });
    }
}
