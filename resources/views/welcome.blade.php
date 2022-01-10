@extends('app')
@section('title', __('trans.title'))

@section('support')
<div class="container pt-3">
	<div class="alert alert-info" role="alert">
		<h6 class="alert-heading font-weight-bold">{{ __('trans.search') }} !</h6>
		<hr>
		<div>
		<p>{{ __('trans.search_alert')}}</p>		
		</div>
	  </div>
</div>
@endsection
