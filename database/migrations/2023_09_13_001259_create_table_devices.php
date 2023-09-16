<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->boolean('connection_state');
            $table->boolean('enabled');
            $table->bigInteger('device_to_cloud_messages');
            $table->bigInteger('cloud_to_device_messages');
            $table->json('last_message');
            $table->json('desired');
            $table->json('reported');
            $table->timestamp('modified_at')->useCurrent();
            $table->timestamps();
            #set foreign key
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
