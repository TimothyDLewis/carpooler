<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("events", function(Blueprint $table) {
            $table->increments("id");

            $table->string("name", 512);
            $table->text("description")->nullable();

            $table->timestamp("start_date");
            $table->timestamp("end_date");

            $table->string("location", 512)->nullable();
            $table->string("address", 256)->nullable();
            $table->string("address_opt", 256)->nullable();
            $table->string("city", 256)->nullable();
            $table->string("prov_state", 256)->nullable();
            $table->string("prov_state_code", 2)->nullable();
            $table->string("postal_zip", 10)->nullable();
            $table->string("country", 256)->nullable();
            $table->string("country_code", 2)->nullable();
            $table->string("phone_number", 15)->nullable();
            $table->decimal("latitude", 10, 8)->nullable();
            $table->decimal("longitude", 10, 8)->nullable();

            $table->integer("created_by")->default(0);
            $table->integer("updated_by")->default(0);
            $table->integer("deleted_by")->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop("events");
    }
}
