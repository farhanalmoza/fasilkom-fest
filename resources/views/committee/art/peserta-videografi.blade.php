@extends('committee.art.components.template')
@section('title', 'Peserta Videography')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Peserta /</span> Videography</h4>

	<div class="row">
		<div class="col-lg-12 mb-4 order-0">
			<div class="card">
				<h5 class="card-header">Peserta Videography</h5>
				<div class="table-responsive text-nowrap">
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Participation</th>
								<th>Email</th>
								<th>WhatsApp</th>
								<th>Agency</th>
								<th>Occupation</th>
								<th>Payment</th>
							</tr>
						</thead>
						<tbody class="table-border-bottom-0" id="tb-videography">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
		$(document).ready(function () {
			getVideography.loadData = "/videography";
		})
	</script>
	<script src="{{asset('dashboard')}}/js/panitia-art/index.js"></script>
@endsection