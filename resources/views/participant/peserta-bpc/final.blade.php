@extends('participant.peserta-bpc.components.template')
@section('title', 'Final')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Karya /</span> Final</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<h5 class="card-header">Final</h5>
				<!-- Detail Tim -->
				<div class="card-body">
					<form id="formFinal">
						<input type="hidden" name="id" id="id">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="ppt" class="form-label">PPT Presentasi</label>
								<input class="form-control" type="file" id="ppt" name="ppt">
							</div>
						</div>
						<div class="mt-2" id="tombolSubmit">
							<button type="submit" class="btn btn-primary me-2" id="submitPPT">Unggah</button>
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
		// get team id in table uiux where user_id = user_id
		const team_id = '{{ $team_id }}'
		$(document).ready(function () {
			getDetailTim.loadData = user_id
		});
	</script>
	<script src="{{ asset('dashboard') }}/js/peserta-bpc/tim.js"></script>
@endsection