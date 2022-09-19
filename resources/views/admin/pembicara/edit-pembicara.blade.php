@extends('admin.components.template')
@section('title', 'Edit Pembicara')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pembicara /</span> Edit Pembicara</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<h5 class="card-header">Edit Pembicara</h5>
				<!-- Account -->
				<form id="formEditPembicara">
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
									<input type="hidden" name="old_thumb" id="old_thumb">
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
						<input type="hidden" name="id" id="id">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="name" class="form-label">Nama Pembicara</label>
								<input
									class="form-control"
									type="text"
									id="name"
									name="name"
								/>
							</div>
							<div class="mb-3 col-md-6">
								<label for="headline" class="form-label">Headline</label>
								<input
									class="form-control"
									type="text"
									id="headline"
									name="headline"
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
								/>
							</div>
							<div class="mb-3 col-md-4">
								<label for="linkedin" class="form-label">Linked In</label>
								<input
									class="form-control"
									type="text"
									id="linkedin"
									name="linkedin"
								/>
							</div>
							<div class="mb-3 col-md-4">
								<label for="instagram" class="form-label">Instagram</label>
								<input
									class="form-control"
									type="text"
									id="instagram"
									name="instagram"
								/>
							</div>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Simpan</button>
							<button type="reset" id="batal" class="btn btn-outline-secondary">Batal</button>
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
		$(document).ready( function() {
			// get id from url
			var url = window.location.href;
			var id = url.substring(url.lastIndexOf('/') + 1);
			getDetailEdit.loadData = id

			$('#batal').on('click', function(e) {
				getDetailEdit.loadData = id
			})
		})
	</script>
	<script src="{{ asset('dashboard') }}/js/pembicara/index.js"></script>
@endsection