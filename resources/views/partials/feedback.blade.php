@if(session()->get("feedback"))
<div class="alert alert-{{ session()->get("feedback")->class }} alert-dismissable">
	<span class="pull-right close" data-dismiss="alert"><i class="fa fa-remove"></i></span>
	<i class="{{ session()->get("feedback")->icon }}"></i>
	{!! session()->get("feedback")->message !!}
</div>
@endif