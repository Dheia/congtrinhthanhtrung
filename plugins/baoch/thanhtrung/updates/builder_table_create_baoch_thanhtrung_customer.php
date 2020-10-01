<?php namespace Baoch\Thanhtrung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBaochThanhtrungCustomer extends Migration
{
    public function up()
    {
        Schema::create('baoch_thanhtrung_customer', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->text('note');
            $table->decimal('total_paid', 10, 2);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('baoch_thanhtrung_customer');
    }
}
