<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostPendingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_pending_products', function (Blueprint $table) {
            $table->id();
            $table->string("displayName");
            $table->integer("amount");
            $table->string("status")->default("pending");
            $table->unsignedBigInteger("post_id");
            $table->foreign("post_id")->references("id")->on("posts");
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
        Schema::dropIfExists('post_pending_products');
    }
}
