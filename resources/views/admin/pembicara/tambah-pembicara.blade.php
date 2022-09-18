@extends('admin.components.template')
@section('title', 'Tambah Pembicara')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pembicara /</span> Tambah Pembicara</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<h5 class="card-header">Tambah Pembicara</h5>
				<!-- Account -->
				<form id="formTambahPembicara">
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
								<label for="name" class="form-label">Nama Pembicara</label>
								<input
									class="form-control"
									type="text"
									id="name"
									name="name"
									autofocus
									placeholder="masukkan nama pembicara"
								/>
							</div>
							<div class="mb-3 col-md-6">
								<label for="headline" class="form-label">Headline</label>
								<input
									class="form-control"
									type="text"
									id="headline"
									name="headline"
									placeholder="masukkan headline pembicara"
								/>
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-md-4">
								<label for="email" class="form-label">Email</label>
								<input
									class="form-control"
									type="email"
									id="email"
									name="email"
									placeholder="masukkan email pembicara"
								/>
							</div>
							<div class="mb-3 col-md-4">
								<label for="linkedin" class="form-label">Linked In</label>
								<input
									class="form-control"
									type="text"
									id="linkedin"
									name="linkedin"
									placeholder="masukkan link linkedin pembicara"
								/>
							</div>
							<div class="mb-3 col-md-4">
								<label for="instagram" class="form-label">Instagram</label>
								<input
									class="form-control"
									type="text"
									id="instagram"
									name="instagram"
									placeholder="masukkan link instagram pembicara"
								/>
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
	<script src="{{ asset('dashboard') }}/js/pembicara/index.js"></script>
@endsection