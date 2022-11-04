@extends('committee.bpc.components.template')
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
						<label class="col-sm-2 col-form-label" for="basic-default-name">WhatsApp</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="no_wa">
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label" for="basic-default-name">Agency</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="agency">
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label" for="basic-default-name">Member 1</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="member_1">
						</div>
						<div class="col-sm-4">
							<a target="_blank" class="btn btn-primary btn-sm" id="identitas_1">Identitas</a>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label" for="basic-default-name">Member 2</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="member_2">
						</div>
						<div class="col-sm-4">
							<a target="_blank" class="btn btn-primary btn-sm" id="identitas_2">Identitas</a>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label" for="basic-default-name">Member 3</label>
						<div class="col-sm-4">
							<input type="text" readonly="" class="form-control-plaintext" id="member_3">
						</div>
						<div class="col-sm-4">
							<a target="_blank" class="btn btn-primary btn-sm" id="identitas_3">Identitas</a>
						</div>
					</div>
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
	<script src="{{asset('dashboard')}}/js/panitia-bpc/index.js"></script>
@endsection