@extends('participant.peserta-cso.components.template')
@section('title', 'Tim')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Peserta /</span> Detail Tim</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<h5 class="card-header">Detail Tim</h5>
				<!-- Detail Tim -->
				<div class="card-body">
					<form id="formDetailTim">
						<input type="hidden" name="id" id="id">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="teamName" class="form-label">Nama Tim</label>
								<input
									class="form-control"
									type="text"
									id="teamName"
									name="teamName"
                                    placeholder="masukkan nama tim"
								/>
							</div>
							<div class="mb-3 col-md-6">
								<label for="buktiBayar" class="form-label">Bukti Pembayaran</label>
								<input class="form-control" type="file" id="buktiBayar" name="buktiBayar">
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="member_1" class="form-label">Nama Anggota 1</label>
								<input
									class="form-control"
									type="text"
									id="member_1"
									name="member_1"
                                    placeholder="masukkan nama tim"
								/>
							</div>
							<div class="mb-3 col-md-6">
								<label for="kartuPelajar_1" class="form-label">Kartu Pelajar 1</label>
								<input class="form-control" type="file" id="kartuPelajar_1" name="kartuPelajar_1">
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="member_2" class="form-label">Nama Anggota 2</label>
								<input
									class="form-control"
									type="text"
									id="member_2"
									name="member_2"
                                    placeholder="masukkan nama tim"
								/>
							</div>
							<div class="mb-3 col-md-6">
								<label for="kartuPelajar_2" class="form-label">Kartu Pelajar 2</label>
								<input class="form-control" type="file" id="kartuPelajar_2" name="kartuPelajar_2">
							</div>
						</div>
						<div class="mt-2" id="tombolSubmit">
							
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
			getDetailTim.loadData = user_id
		});
	</script>
	<script src="{{ asset('dashboard') }}/js/peserta-cso/tim.js"></script>
@endsection