@extends('participant.peserta-uiux.components.template')
@section('title', 'Detail Tim')

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
								<label for="instansi" class="form-label">Asal Instansi</label>
								<input
									class="form-control"
									type="text"
									id="instansi"
									name="instansi"
                                    placeholder="masukkan asal instansi"
								/>
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="orisinalitas" class="form-label">Surat Orisinalitas</label>
								<input class="form-control" type="file" id="orisinalitas" name="orisinalitas">
							</div>
							<div class="mb-3 col-md-6">
								<label for="buktiBayar" class="form-label">Bukti Pembayaran</label>
								<input class="form-control" type="file" id="buktiBayar" name="buktiBayar">
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-4">
								<label for="member_1" class="form-label">Nama Anggota 1</label>
								<input
									class="form-control"
									type="text"
									id="member_1"
									name="member_1"
                                    placeholder="masukkan nama tim"
								/>
							</div>
							<div class="mb-3 col-md-4">
								<label for="identitas_1" class="form-label">Kartu Identitas 1</label>
								<input class="form-control" type="file" id="identitas_1" name="identitas_1">
							</div>
							<div class="mb-3 col-md-4">
								<label for="wa" class="form-label">No WhatsApp Anggota 1</label>
								<input
									class="form-control"
									type="text"
									id="wa"
									name="wa"
                                    placeholder="masukkan nomor whatsapp anggota 1"
								/>
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-4">
								<label for="member_2" class="form-label">Nama Anggota 2</label>
								<input
									class="form-control"
									type="text"
									id="member_2"
									name="member_2"
                                    placeholder="masukkan nama tim"
								/>
							</div>
							<div class="mb-3 col-md-4">
								<label for="identitas_2" class="form-label">Kartu Identitas 2</label>
								<input class="form-control" type="file" id="identitas_2" name="identitas_2">
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
	<script src="{{ asset('dashboard') }}/js/peserta-uiux/tim.js"></script>
@endsection