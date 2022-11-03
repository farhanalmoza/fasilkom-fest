@extends('committee.esport.components.template')
@section('title', 'Team Detail')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Peserta /</span> Team Detail</h4>

	<div class="row">
		<div class="col-lg-12 mb-4 order-0">
			<div class="card mb-4">
				<div class="card-header d-flex align-items-center justify-content-between">
				  <h5 class="mb-0">Team Detail</h5>
				</div>
				<div class="card-body">
					<div class="row mb-3">
					  <label class="col-sm-2 col-form-label" for="basic-default-name">Team Name</label>
					  <div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="team_name">
					  </div>
						<label class="col-sm-2 col-form-label" for="basic-default-name">Major</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="major">
						</div>
					</div>
					<div class="row mb-3">
					  <label class="col-sm-2 col-form-label" for="basic-default-name">Captain</label>
					  <div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="captain">
					  </div>
						<label class="col-sm-2 col-form-label" for="basic-default-name">WhatsApp</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="no_wa">
						</div>
					</div>
					<div class="row mb-3">
					  <label class="col-sm-2 col-form-label" for="basic-default-name">Player 2</label>
					  <div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="player_2">
					  </div>
						<label class="col-sm-2 col-form-label" for="basic-default-name">Player 3</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="player_3">
						</div>
					</div>
					<div class="row mb-3">
					  <label class="col-sm-2 col-form-label" for="basic-default-name">Player 4</label>
					  <div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="player_4">
					  </div>
						<label class="col-sm-2 col-form-label" for="basic-default-name">Player 5</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="player_5">
						</div>
					</div>
					<div class="row mb-3">
					</div>
					<a class="btn btn-sm btn-outline-primary" id="bukti_bayar">Bukti Pembayaran</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
		$(document).ready(function () {
			const id = window.location.href.split('/').pop();
			getDetailPubg.loadData = id
		})
	</script>
	<script src="{{asset('dashboard')}}/js/panitia-esport/index.js"></script>
@endsection