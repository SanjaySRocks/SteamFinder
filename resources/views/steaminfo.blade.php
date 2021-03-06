@extends('app')
@section('title', $data['pn'].' - Steam Finder')



@section('content')
@php
switch($data['ps']) 
{
	case 0:	$data['ps'] = "Offline";
		break;
	case 1: $data['ps'] = "Online";
		break;
	case 2: $data['ps'] = "Busy";
		break;
	case 3:	$data['ps'] = "Away";
		break;
	default: $data['ps'] = $data['ps'];
		break;
}

switch($bans['vb'])
{
	case 0: $bans['vb'] = "No Bans";
		break;
	case 1: $bans['vb'] = "Banned";
		break;
	default: $bans['vb'] = "No Bans";
}

switch($bans['dslb'])
{
	case 0: $bans['dslb'] = "No Bans";
		break;
	default: $bans['dslb'] = $bans['dslb'] . " day(s) since last ban";

}
@endphp

<div class="container">
	<div class="alert alert-primary" role="alert">
	Hey <a href="#" class="alert-link">{{ $data['pn'] }}</a> !
	</div>
</div>


<div class="container">
<div class="card mb-3 shadow-sm">
<div class="card-body">
<h2>{{ __('trans.result') }}</h2>
	<div class="media">
	<img src="{{ $data['avf'] }}" class="align-self-start mr-3 img-thumbnail" alt="Profile images" width="64">
	<div class="media-body">
	<h5 class="mt-0">
	<i class="fab fa-steam"></i> {{ $data['pn'] }} <a href="{{ $data['purl'] }}" target="_blank" rel="noopener"><i class="fas fa-external-link-alt"></i></a>
	</h5>
	<p class="text-muted">{{ $data['rn'] }}</p>
	</div>
	</div>

	<br>
	<div class="row mb-5">
	<div class="col-md">
		<strong>{{ __('trans.player_name') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="personaname" class="form-control bg-white" value="{{ $data['pn'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#personaname"><i class="far fa-clone"></i></button>
		</div>

		<strong>{{ __('trans.steamid') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="steamid32" class="form-control bg-white" value="{{ $data['steam32'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#steamid32"><i class="far fa-clone"></i></button>
		</div>


		<strong>{{ __('trans.steamid64') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="steamid64" class="form-control bg-white" value="{{ $data['si64'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#steamid64"><i class="far fa-clone"></i></button>
		</div>

		<strong>{{ __('trans.steamid3') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="steamid3" class="form-control bg-white" value="{{ $data['steam3'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#steamid3"><i class="far fa-clone"></i></button>
		</div>

		<strong>{{ __('trans.custom_url') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="profilelink" class="form-control bg-white" value="{{ $data['purl'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#profilelink"><i class="far fa-clone"></i></button>
		</div>

		<strong>{{ __('trans.profile_url') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="profilelink2" class="form-control bg-white" value="{{ $data['profile2'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#profilelink2"><i class="far fa-clone"></i></button>
		</div>

		<strong>{{ __('trans.fivem_hex') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="_hex" class="form-control bg-white" value="{{ "STEAM:".strtoupper(dechex($data['si64'])) }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#_hex"><i class="far fa-clone"></i></button>
		</div>

		<strong>{{ __('trans.account_id') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="_account_id" class="form-control bg-white" value="{{ $data['account_id'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#_account_id"><i class="far fa-clone"></i></button>
		</div>


	</div>

	<div class="col-md">
		<strong>{{ __('trans.real_name') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="realname" class="form-control bg-white" value="{{ $data['rn'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#realname"><i class="far fa-clone"></i></button>
		</div>


		<strong>{{ __('trans.profile_state') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="p_state" class="form-control bg-white" value="{{ $data['ps'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#p_state"><i class="far fa-clone"></i></button>
		</div>


		<strong>{{ __('trans.profile_created') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="p_created" class="form-control bg-white" value="{{ !empty($data['createdat']) ? date("F j, Y", $data['createdat']) : "" }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#p_created"><i class="far fa-clone"></i></button>
		</div>

		<strong>{{ __('trans.vacbanned') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="vacbanned" class="form-control bg-white" value="{{ $bans['vb'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#vacbanned"><i class="far fa-clone"></i></button>
		</div>

		<strong>{{ __('trans.last_ban') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="dslb" class="form-control bg-white" value="{{ $bans['dslb'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#dslb"><i class="far fa-clone"></i></button>
		</div>

		<strong>{{ __('trans.invite_url') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="_invite_url" class="form-control bg-white" value="{{ "https://s.team/p/".$data['invite_url'] }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#_invite_url"><i class="far fa-clone"></i></button>
		</div>

		<strong>{{ __('trans.csgo') }}</strong>
		<div class="input-group mb-3">
		<input type="text" id="csgohour" class="form-control bg-white" value="{{ isset($hours['csgo']) ? round($hours['csgo']->playtimeForever/60, 0) .' Hours' : "" }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#csgohour"><i class="far fa-clone"></i></button>
		</div>

		{{ __('trans.extra') }}
		<div class="input-group mb-3">
		<input type="text" id="extra" class="form-control bg-white" value="{{ '// '.$data['pn']." ".date("d-F-Y") }}" aria-describedby="basic-addon1" readonly="">
		<button class="btn btn-outline-dark" type="button" data-clipboard-target="#extra"><i class="far fa-clone"></i></button>
		</div>

	</div>

	</div>
</div>
</div>
</div>

@endsection