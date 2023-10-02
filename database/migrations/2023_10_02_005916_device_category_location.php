<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeviceCategoryLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("device_category_location", function (Blueprint $table) {
            $table->unsignedInteger("device_category_id");
            $table->unsignedInteger("location_id");
            $table->foreign("device_category_id")->references("id")->on("device_categories")->onDelete("cascade");
            $table->foreign("location_id")->references("id")->on("locations")->onDelete("cascade");
            $table->primary(["device_category_id", "location_id"], "device_category_location_device_category_id_location_id_primary");
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
        //
        Schema::dropIfExists("device_category_location");
    }
}
