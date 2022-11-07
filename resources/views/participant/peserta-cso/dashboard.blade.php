@extends('participant.peserta-cso.components.template')
@section('title', 'Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4">Dashboard</h4>

	<div class="row">
		<div class="col-lg-8 mb-4 order-0" id="greetings">
			
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
		const group = '{{ $group }}'
		$(document).ready(function() {
			getDetailTim.loadData = user_id
		});

		const getDetailTim = {
			set loadData(data) {
				const URL = URL_DATA + "/tim-cso/" + data
				Functions.prototype.getRequest(getDetailTim, URL);
			},
			set successData(response) {
				const container = document.getElementById('greetings')

				if (response.verified != 0) {
					container.innerHTML = `
						<div class="card">
							<div class="d-flex align-items-end row">
								<div class="col-sm-12">
									<div class="card-body">
										<h5 class="card-title text-primary" id="greetings">Selamat datang ${response.team_name}</h5>
										<p class="mb-4">
										Untuk mendapatkan informasi lebih lanjut, silakan bergabung dengan grup whatsapp yang telah kami sediakan
										dengan mengklik tombol dibawah ini.
										</p>

										<a href="${group}" class="btn btn-sm btn-outline-primary">Masuk grup</a>
									</div>
								</div>
							</div>
						</div>
					`
				}
			}
		}
	</script>
@endsection