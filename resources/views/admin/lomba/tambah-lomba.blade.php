@extends('admin.components.template')
@section('title', 'Tambah Mata Lomba')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Lomba /</span> Tambah Mata Lomba</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<h5 class="card-header">Tambah Mata Lomba</h5>
				<!-- Account -->
				<form id="formTambahLomba">
					<div class="card-body">
						<div class="d-flex align-items-start align-items-sm-center gap-4">
							<img
								src="{{ asset('thumbnail_lomba') }}/default.jpg"
								alt="user-avatar"
								class="d-block rounded"
								height="100"
								width="100"
								id="uploadedPicture"
							/>
							<div class="button-wrapper">
								<label for="picture" class="btn btn-primary me-2 mb-4" tabindex="0">
									<span class="d-none d-sm-block">Pilih Gambar</span>
									<i class="bx bx-upload d-block d-sm-none"></i>
									<input
										type="file"
										id="picture"
										name="picture"
										class="account-file-input"
										hidden
										accept="image/png, image/jpeg"
									/>
								</label>

								<p class="text-muted mb-0">Harus JPG, JPEG, atau PNG. Ratio 1:1</p>
							</div>
						</div>
					</div>
					<hr class="my-0" />
					<div class="card-body">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="name" class="form-label">Nama Lomba</label>
								<input
									class="form-control"
									type="text"
									id="name"
									name="name"
									autofocus
									placeholder="masukkan nama mata lomba"
								/>
							</div>
							<div class="mb-3 col-md-3">
								<label for="bidangLomba" class="form-label">Bidang Lomba</label>
								<select class="form-select" id="bidangLomba" name="bidangLomba" aria-label="Default select example">
									<option selected="">Pilih bidang lomba</option>
								</select>
							</div>
							<div class="mb-3 col-md-3">
								<label for="peserta" class="form-label">Target Peserta</label>
								<select class="form-select" id="peserta" name="peserta" aria-label="Default select example">
									<option selected="">Pilih target peserta</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
								<input class="form-control" type="date" id="tgl_mulai" name="tgl_mulai">
							</div>
							<div class="mb-3 col-md-6">
								<label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
								<input class="form-control" type="date" id="tgl_selesai" name="tgl_selesai">
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="deskripsi" class="form-label">Deskripsi Lomba</label>
								<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
							</div>
							<div class="mb-3 col-md-6">
								<label for="lokasi" class="form-label">Lokasi Lomba</label>
								<textarea class="form-control" id="lokasi" name="lokasi" rows="3"></textarea>
							</div>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Tambah</button>
							<button type="reset" class="btn btn-outline-secondary">Batal</button>
						</div>
					</div>
				</form>
				<!-- /Account -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
		$(document).ready(function() {
			getBidangLomba.loadData = "/bidang-lomba"
			getTargetPeserta.loadData = "/target-peserta"
		})
	</script>
	<script src="{{ asset('dashboard') }}/js/lomba/bidang-lomba.js"></script>
	<script src="{{ asset('dashboard') }}/js/lomba/index.js"></script>
@endsection