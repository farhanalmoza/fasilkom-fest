@extends('committee.uiux.components.template')
@section('title', 'Ganti Password')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Ganti Password</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<h5 class="card-header">Ganti Password</h5>
				<!-- Account -->
				<div class="card-body">
					<form id="formGantiPassword">
                        <div class="mb-3 col-md-6">
							<label for="passLama" class="form-label">Password Lama</label>
							<input
								class="form-control"
								type="password"
								id="passLama"
								name="passLama"
                                placeholder="masukkan password lama"
							/>
						</div>
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="passBaru" class="form-label">Password baru</label>
								<input
									class="form-control"
									type="password"
									id="passBaru"
									name="passBaru"
                                    placeholder="masukkan password baru"
								/>
							</div>
							<div class="mb-3 col-md-6">
								<label for="konfirPassBaru" class="form-label">Konfirmasi Password Baru</label>
								<input
									class="form-control"
									type="password"
									id="konfirPassBaru"
									name="konfirPassBaru"
                                    placeholder="masukkan konfirmasi password baru"
								/>
							</div>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Ganti</button>
							<button type="reset" class="btn btn-outline-secondary">Batal</button>
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
    <script src="{{ asset('dashboard') }}/js/pengaturan-akun.js"></script>
@endsection