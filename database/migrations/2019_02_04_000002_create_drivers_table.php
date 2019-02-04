<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("drivers", function(Blueprint $table) {
        	$table->increments("id");

        	$table->integer("event_id");
        	$table->integer("user_id");
        	
        	$table->integer("vehicle_id");
        	$table->integer("vehicle_capacity");
        	$table->string("vehicle_make");
        	$table->string("vehicle_model");
        	$table->string("vehicle_colour");
        	$table->decimal("vehicle_avg_cost_per_tank", 10, 2);
        	$table->string("vehicle_plate")->nullable();

        	$table->enum("travel_type", ["depart_only", "return_only", "both"])->default("both");

        	$table->timestamp("depart_date", 512)->nullable();
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

        	$table->timestamp("return_date", 512)->nullable();
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

        	$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop("drivers");
    }
}
