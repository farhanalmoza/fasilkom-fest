@extends('participant.peserta-uiux.components.template')
@section('title', 'Penyisihan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Karya /</span> Penyisihan</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<h5 class="card-header">Penyisihan</h5>
				<!-- Detail Tim -->
				<div class="card-body">
					<form id="formPenyisihan">
						<input type="hidden" name="id" id="id">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="screen" class="form-label">Link screen</label>
								<input
									class="form-control"
									type="text"
									id="screen"
									name="screen"
                                    placeholder="masukkan link google drive screen"
								/>
							</div>
							<div class="mb-3 col-md-6">
								<label for="proposal" class="form-label">Proposal</label>
								<input
									class="form-control"
									type="text"
									id="proposal"
									name="proposal"
                                    placeholder="masukkan link google drive proposal"
								/>
							</div>
						</div>
						<div class="mt-2" id="tombolSubmit">
							<button type="submit" class="btn btn-primary me-2" id="btnSubmit">Unggah</button>
						</div>
					</form>
				</div>
				<!-- /Detail Tim -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
		$(document).ready(function () {
			getPenyisihan.loadData = team_id
		});
	</script>
	<script src="{{ asset('dashboard') }}/js/peserta-uiux/tim.js"></script>
@endsection