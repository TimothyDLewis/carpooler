<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Carpooler\Classes\Slugger;

use Carpooler\Models\Role;
use Carpooler\Models\User;
use Carpooler\Models\Event;
use Carpooler\Models\Vehicle;
use Carpooler\Models\Driver;
use Carpooler\Models\Passenger;

class TestSeeder extends Seeder {
	private $slugger = null;

	public function __construct(){
		$this->slugger = new Slugger();
	}
    
    public function run(){
    	$defaultPassword = env("DEFAULT_PASSWORD", 'pa$$w0rd');
		$this->command->info("Using default password of ".$defaultPassword." for non-Superuser Accounts.");

    	$organizerRole = Role::where("slug", "=", "organizer")->first();
    	$userRole = Role::where("slug", "=", "user")->first();

    	$organizerUser = User::create([
			"email" => "organizer@carpooler.com",
			"password" => \Hash::make($defaultPassword),
			"first_name" => "Organizer",
			"last_name" => "User"
		]);

		$activation = Activation::create($organizerUser);
		Activation::complete($organizerUser, $activation->code);

		$organizerRole->users()->attach($organizerUser, [
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		$userRole->users()->attach($organizerUser, [
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		$this->command->info("Created and Activated User:".$organizerUser->email." (".$organizerUser->roles->first()->name.")");

		$driverUser = User::create([
			"email" => "driver@carpooler.com",
			"password" => \Hash::make($defaultPassword),
			"first_name" => "Driver",
			"last_name" => "User"
		]);

		$activation = Activation::create($driverUser);
		Activation::complete($driverUser, $activation->code);

		$userRole->users()->attach($driverUser, [
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		$this->command->info("Created and Activated User:".$driverUser->email." (".$driverUser->roles->first()->name.")");

		$passengerUser = User::create([
			"email" => "passenger@carpooler.com",
			"password" => \Hash::make($defaultPassword),
			"first_name" => "Passenger",
			"last_name" => "User"
		]);

		$activation = Activation::create($passengerUser);
		Activation::complete($passengerUser, $activation->code);

		$userRole->users()->attach($passengerUser, [
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		$this->command->info("Created and Activated User: ".$passengerUser->email." (".$passengerUser->roles->first()->name.")");

		$testEvent = Event::create([
			"name" => "Testing Event",
			"description" => "This is a testing event; used to determine correct relationship data.",
			"start_date" => Carbon::now()->addMonths(1)->hour(11)->minute(30)->second(0),
			"end_date" => Carbon::now()->addMonths(1)->addDays(3)->hour(21)->minute(0)->second(0),
			"location" => "Olio Digital Labs",
			"address" => "148 Fullarton St",
			"address_opt" => "Unit 48",
			"city" => "London",
			"prov_state" => "Ontario",
			"prov_state_code" => "ON",
			"postal_zip" => "N6A 5P3",
			"country" => "Canada",
			"country_code" => "CA",
			"phone_number" => "226-785-0420",
			"latitude" => 42.9844308,
			"longitude" => -81.2408681,
			"created_by" => $organizerUser->id,
			"updated_by" => $organizerUser->id
		]);

		$this->command->info("Created Event: ".$testEvent->name);

		$testVehicle = Vehicle::create([
			"user_id" => $driverUser->id,
			"capacity" => 5,
			"make" => "Dodge",
			"model" => "Caliber",
			"colour" => "Black",
			"plate" => "BRMZ 712",
			"avg_cost_per_tank" => 40
		]);

		$this->command->info("Created Vehicle: ".$testVehicle->colour." ".$testVehicle->make." ".$testVehicle->model." (".$testVehicle->plate.")");

		$driver = Driver::create([
			"event_id" => $testEvent->id,
			"user_id" => $driverUser->id,
			"vehicle_id" => $testVehicle->id,
			"vehicle_capacity" => $testVehicle->capacity,
			"vehicle_make" => $testVehicle->make,
			"vehicle_model" => $testVehicle->model,
			"vehicle_colour" => $testVehicle->colour,
			"vehicle_plate" => $testVehicle->plate,
			"vehicle_avg_cost_per_tank" => $testVehicle->avg_cost_per_tank,
			"travel_type" => "both",
			"depart_date" => Carbon::now()->addMonths(1)->hour(9)->minute(0)->second(0),
			"depart_location" => "Fanshawe College",
			"depart_address" => "1001 Fanshawe College Blvd",
			"depart_address_opt" => "",
			"depart_city" => "London",
			"depart_prov_state" => "Ontario",
			"depart_prov_state_code" => "ON",
			"depart_postal_zip" => "N5Y 5R6",
			"depart_country" => "Canada",
			"depart_country_code" => "CA",
			"depart_latitude" => 43.0114819,
			"depart_longitude" => -81.2095966,
			"depart_notes" => "",
			"return_date" => Carbon::now()->addMonths(1)->addDays(3)->hour(17)->minute(0)->second(0),
			"return_location" => "Western University",
			"return_address" => "1151 Richmond St",
			"return_address_opt" => "",
			"return_city" => "London",
			"return_prov_state" => "Ontario",
			"return_prov_state_code" => "ON",
			"return_postal_zip" => "N6A 3K7",
			"return_country" => "Canada",
			"return_country_code" => "CA",
			"return_latitude" => 43.0095971,
			"return_longitude" => -81.2759223,
			"return_notes" => "Note; leaving the event early."
		]);

		$this->command->info("Created Driver for Event: ".$testEvent->name." (".$driverUser->full_name.", ".$testVehicle->colour." ".$testVehicle->make." ".$testVehicle->model." (".$testVehicle->plate."))");

		$passenger = Passenger::create([
			"event_id" => $testEvent->id,
			"depart_driver_id" => $driver->id,
			"depart_address" => "1290 Sandford St",
			"depart_address_opt" => "Unit 48",
			"depart_city" => "London",
			"depart_prov_state" => "Ontario",
			"depart_prov_state_code" => "ON",
			"depart_postal_zip" => "N5V 3Y2",
			"depart_country" => "Canada",
			"depart_country_code" => "CA",
			"depart_latitude" => 43.0243366,
			"depart_longitude" => -81.2065361,
			"return_driver_id" => $driver->id,
			"return_address" => "1290 Sandford St",
			"return_address_opt" => "Unit 48",
			"return_city" => "London",
			"return_prov_state" => "Ontario",
			"return_prov_state_code" => "ON",
			"return_postal_zip" => "N5V 3Y2",
			"return_country" => "Canada",
			"return_country_code" => "CA",
			"return_latitude" => 43.0243366,
			"return_longitude" => -81.2065361
		]);

		$this->command->info("Created Passenger for Event: ".$testEvent->name." (".$passengerUser->full_name.", ".$driverUser->full_name."(depart), ".$driverUser->full_name."(return))");
    }
}
