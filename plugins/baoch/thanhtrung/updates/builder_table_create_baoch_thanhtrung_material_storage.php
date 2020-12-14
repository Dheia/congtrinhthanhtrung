<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBaochThanhtrungMaterialStorage extends Migration
{
    public function up()
    {
        Schema::create('baoch_thanhtrung_material_storage', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('material_id');
            $table->integer('storage_id');
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('formula', 255)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('baoch_thanhtrung_material_storage');
    }
}