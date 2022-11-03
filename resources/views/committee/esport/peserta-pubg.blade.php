@extends('committee.esport.components.template')
@section('title', 'Peserta PUBG Mobile')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Peserta /</span> PUBG Mobile</h4>

	<div class="row">
		<div class="col-lg-12 mb-4 order-0">
			<div class="card">
				<h5 class="card-header">Peserta PUBG Mobile</h5>
				<div class="table-responsive text-nowrap">
					<table class="table">
						<thead>
							<tr>
								<th>Team</th>
								<th>Captain</th>
								<th>WhatsApp</th>
								<th>Major</th>
							</tr>
						</thead>
						<tbody class="table-border-bottom-0" id="tb-pubg">
							
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
			getPubg.loadData = "/pubg-mobile";
		})
	</script>
	<script src="{{asset('dashboard')}}/js/panitia-esport/index.js"></script>
@endsection