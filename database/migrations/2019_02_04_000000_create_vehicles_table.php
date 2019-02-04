<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("vehicles", function(Blueprint $table) {
        	$table->increments("id");

        	$table->integer("user_id");
        	$table->integer("capacity");

        	$table->string("make");
        	$table->string("model");
        	$table->string("colour");
        	$table->decimal("avg_cost_per_tank", 10, 2);
        	$table->string("plate")->nullable();

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
        Schema::drop("vehicles");
    }
}
