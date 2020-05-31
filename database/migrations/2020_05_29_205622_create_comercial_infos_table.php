<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComercialInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercial_infos', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->nullable()->unique();
            $table->integer("category_id")->nullable();
            $table->text("products")->nullable();
            $table->date("opening")->nullable();
            $table->integer("employees_amount")->nullable();
            $table->integer("men_employees_amount")->nullable();
            $table->integer("women_employees_amount")->nullable();
            $table->integer("women_leadership_amount")->nullable();
            $table->text("countries_presence")->nullable();
            $table->text("contact_information")->nullable();
            $table->text("contact_person")->nullable();
            $table->text("phone_number")->nullable();
            $table->text("other_info")->nullable();
            $table->text("main_clients")->nullable();
            $table->boolean("export")->nullable();
            $table->boolean("import")->nullable();
            $table->boolean("notional_made")->nullable();
            $table->boolean("related_activities")->nullable();
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
        Schema::dropIfExists('comercial_infos');
    }
}
