@extends('admin.components.template')
@section('title', 'Daftar Panitia')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light">Panitia /</span> Daftar Panitia</h4>

	<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahPanitiaModal">Tambah Panitia</button>

	<div class="card">
		<h5 class="card-header">Table Basic</h5>
		<div class="table-responsive text-nowrap">
		  <table class="table">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Email</th>
						<th>Divisi</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0" id="panitia-table">
					
				</tbody>
		  </table>
		</div>
	</div>
</div>
@endsection

@section('modal')
	<!-- Modal -->
	<div class="modal fade" id="tambahPanitiaModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel1">Tambah Panitia</h5>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"
					></button>
				</div>
				<form id="formTambahPanitia">
					<input type="hidden" id="id" name="id" />
					<div class="modal-body">
						<div class="col mb-3">
							<label for="name" class="form-label">Nama</label>
							<input type="text" id="name" name="name" class="form-control" placeholder="masukkan nama panitia" />
						</div>
						<div class="col mb-3">
							<label for="divisi" class="form-label">Example select</label>
							<select class="form-select" id="divisi" name="divisi" aria-label="Default select example">
							  <option selected="">Pilih divisi</option>
							</select>
						</div>
						<div class="col mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" id="email" name="email" class="form-control" placeholder="masukkan email panitia" />
						</div>
						<div class="col mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
						</div>
						<div class="col mb-3">
							<label for="confirmPassword" class="form-label">Konfirmasi Password</label>
							<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel1">Hapus Panitia</h5>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"
					></button>
				</div>
				<div class="modal-body">
					Apakah Anda yakin ingin menghapus panitia ini?
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
			getPanitia.loadData = "/panitia"
			getDivisi.loadData = "/divisi-panitia"
		})
	</script>
	<script src="{{ asset('dashboard') }}/js/panitia/index.js"></script>
@endsection