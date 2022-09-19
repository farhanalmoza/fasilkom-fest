@extends('admin.components.template')
@section('title', 'Edit Sponsor')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sponsor /</span> Edit Sponsor</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<h5 class="card-header">Edit Sponsor</h5>
				<!-- Account -->
				<form id="formEditSponsor">					
					<div class="card-body">
						<div class="row mb-3">
							<input type="hidden" name="id" id="id">
							<input type="hidden" name="old_thumb" id="old_thumb">
                            <div class="d-flex align-items-start align-items-sm-center gap-4 col-md-6">
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
							<div class="col-md-6">
								<label for="name" class="form-label">Nama Perusahaan</label>
								<input
									class="form-control"
									type="text"
									id="name"
									name="name"
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

@section('modal')
<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel1">Hapus Sponsor</h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				Apakah Anda yakin ingin menghapus sponsor ini?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
					Batal
				</button>
				<button type="button" class="btn btn-danger submit-hapus">hapus</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
		$(document).ready( function() {
			var url = window.location.href;
			var id = url.substring(url.lastIndexOf('/') + 1);
			getDetailEdit.loadData = id

			$('#batal').on('click', function(e) {
				getDetailEdit.loadData = id
			})
		})
	</script>
	<script src="{{ asset('dashboard') }}/js/sponsor/index.js"></script>
@endsection