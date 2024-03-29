@extends('admin.components.template')
@section('title', 'Divisi')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Panitia /</span> Divisi</h4>

	<div class="row">
		<div class="col-md-6">
			<div class="card mb-4">
				<h5 class="card-header">Tambah Divisi</h5>
				<!-- Tambah Divisi -->
				<div class="card-body">
					<form id="tambahDivisi">
						<div class="mb-3">
							<label for="name" class="form-label">Nama Divisi</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama divisi" />
						</div>
						<div class="mb-3">
							<label for="status" class="form-label">Status</label>
							<select class="form-select" id="status" name="status" aria-label="Default select example">
							  <option selected="">Pilih status</option>
							  <option value="1">Panitia</option>
							  <option value="0">Peserta</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="desc" class="form-label">Deskripsi</label>
							<textarea class="form-control" id="desc" name="desc" rows="2"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</form>
				</div>
				<!-- /Tambah Divisi -->
			</div>
		</div>
		<div class="col-md-6">
			<div class="card mb-4">
				<h5 class="card-header">Daftar Divisi</h5>
				<!-- Daftar Divisi -->
				<div class="table-responsive text-nowrap">
					<table class="table">
					  <thead>
							<tr>
								<th>Divisi</th>
								<th>Actions</th>
							</tr>
					  </thead>
					  <tbody class="table-border-bottom-0" id="divisi-table">
							
					  </tbody>
					</table>
				</div>
				<!-- /Daftar Divisi -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
	<!-- Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel1">Edit Divisi</h5>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"
					></button>
				</div>
				<form id="editDivisi">
					<input type="hidden" id="id" name="id" />
					<div class="modal-body">
						<div class="col mb-3">
							<label for="nameEdit" class="form-label">Nama Divisi</label>
							<input type="text" id="nameEdit" name="nameEdit" class="form-control" />
						</div>
						<div class="mb-3">
							<label for="descEdit" class="form-label">Deskripsi</label>
							<textarea class="form-control" id="descEdit" name="descEdit" rows="2"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel1">Hapus Divisi</h5>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"
					></button>
				</div>
				<div class="modal-body">
					Apakah Anda yakin ingin menghapus divisi ini?
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
		$(document).ready(function() {
				getDivisi.loadData = "/divisi"
		})
	</script>
	<script src="{{ asset('dashboard') }}/js/role/index.js"></script>
@endsection