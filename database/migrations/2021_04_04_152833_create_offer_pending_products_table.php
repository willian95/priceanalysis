<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferPendingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_pending_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("offer_id");
            $table->unsignedBigInteger("post_pending_product_id");
            $table->string("price");
            $table->timestamps();

            $table->foreign("offer_id")->references("id")->on("offers");
            $table->foreign("post_pending_product_id")->references("id")->on("post_pending_products");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_pending_products');
    }
}
