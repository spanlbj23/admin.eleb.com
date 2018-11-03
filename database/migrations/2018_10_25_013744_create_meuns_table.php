<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meuns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_name');
            $table->float('rating');
            $table->integer('shop_id');
            $table->integer('category_id');
            $table->float('goods_price');
            $table->string('description');
            $table->integer('months_sales');
            $table->integer('rating_count');
            $table->string('tips');
            $table->integer('satisfy_count');
            $table->float('satisfy_rate');
            $table->string('goods_img');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meuns');
    }
}
