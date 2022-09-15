@extends('admin.components.template')
@section('title', 'Bidang Lomba')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Lomba /</span> Bidang Lomba</h4>

	<div class="row">
		<div class="col-md-6">
			<div class="card mb-4">
				<h5 class="card-header">Tambah Bidang Lomba</h5>
				<!-- Tambah Bidang Lomba -->
				<div class="card-body">
					<form id="tambahBidangLomba">
						<div class="mb-3">
							<label for="name" class="form-label">Nama Bidang Lomba</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama bidang lomba" />
						</div>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</form>
				</div>
				<!-- /Tambah Bidang Lomba -->
			</div>
		</div>
		<div class="col-md-6">
			<div class="card mb-4">
				<h5 class="card-header">Daftar Bidang Lomba</h5>
				<!-- Daftar Bidang Lomba -->
				<div class="table-responsive text-nowrap">
					<table class="table">
					  <thead>
							<tr>
								<th>Bidang Lomba</th>
								<th>Actions</th>
							</tr>
					  </thead>
					  <tbody class="table-border-bottom-0" id="bidang-lomba-table">
							
					  </tbody>
					</table>
				</div>
				<!-- /Daftar Bidang Lomba -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
	<!-- Modal -->
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
					Apakah Anda yakin ingin menghapus bidang lomba ini?
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
			getBidangLomba.loadData = "/bidang-lomba"
		})
	</script>
	<script src="{{ asset('dashboard') }}/js/lomba/bidang-lomba.js"></script>
@endsection