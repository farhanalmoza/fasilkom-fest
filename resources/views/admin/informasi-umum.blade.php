@extends('admin.components.template')
@section('title', 'Informasi Umum')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Informasi /</span> Informasi Umum</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<h5 class="card-header">Informasi Umum</h5>
				<!-- Account -->
				<div class="card-body">
					<form id="formInformasi">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="tgl_closing" class="form-label">Tanggal Pelaksanaan</label>
								<input
									class="form-control"
									type="date"
									id="tgl_closing"
									name="tgl_closing"
								/>
							</div>
							<div class="mb-3 col-md-6">
								<label for="tmp_closing" class="form-label">Tempat Pelaksanaan</label>
								<input
									class="form-control"
									type="text"
									id="tmp_closing"
									name="tmp_closing"
									placeholder="tempat pelaksanaan closing"
								/>
							</div>
						</div>
						<div class="mb-3">
							<label for="deskripsi" class="form-label">Deskripsi Fasilkom Fest</label>
							<textarea
								class="form-control"
								id="deskripsi"
								name="deskripsi"
								rows="3"
							></textarea>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="email" class="form-label">Email</label>
								<input
									class="form-control"
									type="email"
									id="email"
									name="email"
                                    placeholder="masukkan email"
								/>
							</div>
							<div class="mb-3 col-md-6">
								<label for="instagram" class="form-label">Instagram</label>
								<input
									class="form-control"
									type="text"
									id="instagram"
									name="instagram"
                                    placeholder="masukkan link instagram"
								/>
							</div>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Simpan</button>
							<button type="reset" class="btn btn-outline-secondary" id="batal">Batal</button>
						</div>
					</form>
				</div>
				<!-- /Account -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
		$(document).ready(function() {
			// getInformasi.loadData = "/informasi/detail"
		})
	</script>
    <script src="{{ asset('dashboard') }}/js/informasi.js"></script>
@endsection