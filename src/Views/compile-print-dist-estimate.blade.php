<!-- Stored in resources/views/vendor/buckystats/compile-print-dist-estimate.blade.php -->
<h3>Estimating {{ $yr }}</h3>
<table style="width: 50%; min-width: 500px;">
<tr>
	<td></td>
	<th>{{ $year6->pop_dist_year }}</th>
	<th>{{ $year1->pop_dist_year }}</th>
	<th>{{ $year2020->pop_dist_year }}</th>
</tr>
@foreach ($fldNames as $f)
	<tr>
		<th>{{ $f }}</th>
		<td>
		@if (isset($year6->{ 'pop_dist_' . $f }))
			{{ number_format($year6->{ 'pop_dist_' . $f }) }}
		@endif
		</td>
		<td>
		@if (isset($year1->{ 'pop_dist_' . $f }))
			{{ number_format($year1->{ 'pop_dist_' . $f }) }}
		@endif
		</td>
		<td>
		@if (isset($year2020->{ 'pop_dist_' . $f }))
			{{ number_format($year2020->{ 'pop_dist_' . $f }) }}
		@endif
		</td>
	</tr>
@endforeach
@foreach ($fldNames as $f)
	@if ($f != 'total')
		<tr>
			<th>perc_{{ $f }}</th>
			<td>
			@if (isset($year6->{ 'pop_dist_perc_' . $f }))
				{{ $fLOBALS["SL"]->sigFigs((100*$year6->{ 'pop_dist_perc_' . $f }), 3) }}
			@endif
			</td>
			<td>
			@if (isset($year1->{ 'pop_dist_perc_' . $f }))
				{{ $fLOBALS["SL"]->sigFigs((100*$year1->{ 'pop_dist_perc_' . $f }), 3) }}
			@endif
			</td>
			<td>
			@if (isset($year2020->{ 'pop_dist_perc_' . $f }))
				{{ $fLOBALS["SL"]->sigFigs((100*$year2020->{ 'pop_dist_perc_' . $f }), 3) }}
			@endif
			</td>
		</tr>
	@endif
@endforeach
</table>

