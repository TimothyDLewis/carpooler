<?php

namespace Carpooler\Http\Controllers;

use Carpooler\Http\Controllers\Controller;

class DefaultController extends Controller {
	public function getIndex(){
		return view("index");
	}
}