@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
{{ Sanatorium\Pricingexchangecnb\Controllers\Services\CNBExchangesController::NAME }}
@stop

{{-- Inline scripts --}}
@section('scripts')
@parent
@stop

{{-- Inline styles --}}
@section('styles')
@parent
@stop

{{-- Page content --}}
@section('page')

{{-- Grid --}}
<section class="panel panel-default">
	
	<header class="panel-heading">
		{{ Sanatorium\Pricingexchangecnb\Controllers\Services\CNBExchangesController::NAME }}
	</header>

	<div class="panel-body">
		<h3>Data</h3>
		<pre>{{ Sanatorium\Pricingexchangecnb\Controllers\Services\CNBExchangesController::SOURCE }}</pre>
	</div>

	<table class="table table-grid">
		<tbody>
		@foreach( Sanatorium\Pricingexchangecnb\Controllers\Services\CNBExchangesController::getSourceData() as $data)
			<tr>
				@foreach($data as $key => $value)
				<td>{{ $value }}</td>
				@endforeach
			</tr>
		@endforeach
		</tbody>
	</table>

	<div class="panel-body">

		<h3>Data+</h3>
		<pre>{{ Sanatorium\Pricingexchangecnb\Controllers\Services\CNBExchangesController::SOURCE_FULL }}</pre>
	</div>

	<table class="table table-grid">
		<tbody>
		@foreach( Sanatorium\Pricingexchangecnb\Controllers\Services\CNBExchangesController::getSourceData(true) as $data)
			<tr>
				@foreach($data as $key => $value)
				<td>{{ $value }}</td>
				@endforeach
			</tr>
		@endforeach
		</tbody>
	</table>

</section>


@stop
