<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("passengers", function(Blueprint $table) {
        	$table->increments("id");

        	$table->integer("event_id");
        	$table->enum("travel_type", ["depart_only", "return_only", "both"])->default("both");

        	$table->integer("depart_driver_id")->nullable();
        	$table->enum("depart_driver_status", ["pending", "accepted", "accepted_pickup", "rejected", "rejected_pickup"])->default("pending");

        	$table->string("depart_location")->nullable();
        	$table->string("depart_address", 256)->nullable();
            $table->string("depart_address_opt", 256)->nullable();
            $table->string("depart_city", 256)->nullable();
            $table->string("depart_prov_state", 256)->nullable();
            $table->string("depart_prov_state_code", 2)->nullable();
            $table->string("depart_postal_zip", 10)->nullable();
            $table->string("depart_country", 256)->nullable();
            $table->string("depart_country_code", 2)->nullable();
        	$table->decimal("depart_latitude", 10, 8)->nullable();
        	$table->decimal("depart_longitude", 10, 8)->nullable();
        	$table->text("depart_notes")->nullable();

        	$table->boolean("depart_needs_pickup")->default(0);

        	$table->integer("return_driver_id")->nullable();
        	$table->enum("return_driver_status", ["pending", "accepted", "accepted_dropoff", "rejected", "rejected_dropoff"])->default("pending");

        	$table->string("return_location")->nullable();
        	$table->string("return_address", 256)->nullable();
            $table->string("return_address_opt", 256)->nullable();
            $table->string("return_city", 256)->nullable();
            $table->string("return_prov_state", 256)->nullable();
            $table->string("return_prov_state_code", 2)->nullable();
            $table->string("return_postal_zip", 10)->nullable();
            $table->string("return_country", 256)->nullable();
            $table->string("return_country_code", 2)->nullable();
        	$table->decimal("return_latitude", 10, 8)->nullable();
        	$table->decimal("return_longitude", 10, 8)->nullable();
        	$table->text("return_notes")->nullable();

        	$table->boolean("return_needs_dropoff")->default(0);

        	$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop("passengers");
    }
}
