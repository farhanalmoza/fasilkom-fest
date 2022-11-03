@extends('committee.sport.components.template')
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
						<label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="category">
						</div>
					</div>
					<div class="row mb-3">
					  <label class="col-sm-2 col-form-label" for="basic-default-name">Captain</label>
					  <div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="captain">
					  </div>
						<label class="col-sm-2 col-form-label" for="basic-default-name">NPM</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="npm">
						</div>
					</div>
					<div class="row mb-3">
					  <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
					  <div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="email">
					  </div>
						<label class="col-sm-2 col-form-label" for="basic-default-name">WhatsApp</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="no_wa">
						</div>
					</div>
					<a class="btn btn-sm btn-outline-primary" id="ktm">View KTM</a>
					<a class="btn btn-sm btn-outline-primary" id=formulir>View Formulir</a>
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
			getDetail.loadData = id
		})
	</script>
	<script src="{{asset('dashboard')}}/js/panitia-sport/index.js"></script>
@endsection