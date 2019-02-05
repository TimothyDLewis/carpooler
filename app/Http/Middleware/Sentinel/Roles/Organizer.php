<?php

namespace Carpooler\Http\Middleware\Sentinel\Roles;

use Closure;
use Sentinel;
use Carpooler\Classes\FeedbackObject;

class Organizer {
    public function handle($request, Closure $next, $guard = null) {
    	$user = \Sentinel::getUser();
    	if($user){
	    	if(!$user->inRole("organizer") && !$user->inRole("superuser")){
	    		$feedback = new FeedbackObject("danger", "fa fa-times-circle fa-3x pull-left", "Unauthorized.<br/>Your account does not have permission to access that page.");
	    		return redirect("/")->with(["feedback" => $feedback]);
	    	}
	    }
        return $next($request);
    }
}