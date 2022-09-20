@extends('participant.peserta-cso.components.template')
@section('title', 'Pengaturan Akun')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Pengaturan Akun</h4>

	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills flex-column flex-md-row mb-3">
				<li class="nav-item">
					<a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Akun</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('peserta-cso/ganti-password') }}"
						><i class="bx bx-lock-alt me-1"></i> Password</a
					>
				</li>
			</ul>
			<div class="card mb-4">
				<h5 class="card-header">Detail Profile</h5>
				<!-- Account -->
				<div class="card-body">
					<div class="d-flex align-items-start align-items-sm-center gap-4">
						<img
							src="{{ asset('dashboard') }}/img/avatars/1.png"
							alt="user-avatar"
							class="d-block rounded"
							height="100"
							width="100"
							id="uploadedAvatar"
						/>
						<div class="button-wrapper">
							<label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
								<span class="d-none d-sm-block">Ganti Foto</span>
								<i class="bx bx-upload d-block d-sm-none"></i>
								<input
									type="file"
									id="upload"
									class="account-file-input"
									hidden
									accept="image/png, image/jpeg"
								/>
							</label>
							<button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
								<i class="bx bx-reset d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Reset</span>
							</button>

							<p class="text-muted mb-0">Harus JPG, JPEG, atau PNG. Ratio 1:1</p>
						</div>
					</div>
				</div>
				<hr class="my-0" />
				<div class="card-body">
					<form id="formAccountSettings" method="POST" onsubmit="return false">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="nama" class="form-label">Nama</label>
								<input
									class="form-control"
									type="text"
									id="nama"
									name="nama"
									value="John"
									autofocus
								/>
							</div>
							<div class="mb-3 col-md-6">
								<label for="email" class="form-label">E-mail</label>
								<input
									class="form-control"
									type="text"
									id="email"
									name="email"
									value="john.doe@example.com"
									disabled
								/>
							</div>
						</div>
						<div class="mb-3 col-md-6">
							<label for="divisi" class="form-label">Divisi</label>
							<input
								class="form-control"
								type="text"
								id="divisi"
								name="divisi"
								value="Humas"
								disabled
							/>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Simpan</button>
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