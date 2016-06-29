<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kalas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
             $table->string('details');
            $table->string('pic_name');
            $table->timestamps();
        });
        
        
        Schema::create('kala_user',function(Blueprint $table)
        {
        
             $table->integer('user_id')->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        
             $table->integer('kala_id')->index();
            $table->foreign('kala_id')
                ->references('id')
                ->on('kalas')
                ->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kalas');
    }
}
