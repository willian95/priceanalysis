<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsInComercialInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comercial_infos', function (Blueprint $table) {
            $table->dropColumn("contact_information");
            $table->dropColumn("other_info");
            $table->renameColumn("notional_made", "national_made");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comercial_infos', function (Blueprint $table) {
            //
        });
    }
}
