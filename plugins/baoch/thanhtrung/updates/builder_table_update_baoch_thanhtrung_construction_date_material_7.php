<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBaochThanhtrungConstructionDateMaterial7 extends Migration
{
    public function up()
    {
        Schema::table('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->string('custom_formula', 255)->nullable();
            $table->decimal('custom_total', 20, 2)->nullable();
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
    
    public function down()
    {
        Schema::table('baoch_thanhtrung_construction_date_material', function($table)
        {
            $table->dropColumn('custom_formula');
            $table->dropColumn('custom_total');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
