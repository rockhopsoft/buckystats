<!-- Stored in resources/views/vendor/buckystats/compile-print-us-vitals.blade.php -->
<h3>{{ $data[0]->year }} Re-Compiled...</h3>
<table cellpadding=5 cellspacing=0 style="width: 100%;">
	<tr>
		<td colspan="3"></td>
		<th colspan="7" class="brdLft brdBot">Population</th>
		<th colspan="7" class="brdLft brdBot">All-Cause Mortality</th>
	</tr>
	<tr>
		<th>State</th>
		<th>Population</th>
		<th>All-Cause Mortality</th>
		<td class="brdLft">Under 25 Years</td>
		<td>25-44 Years</td>
		<td>45-64 Years</td>
		<td>65-74 Years</td>
		<td>75-84 Years</td>
		<td>85 Years</td>
		<td>Age Unknown</td>
		<td class="brdLft">Under 25 Years</td>
		<td>25-44 Years</td>
		<td>45-64 Years</td>
		<td>65-74 Years</td>
		<td>75-84 Years</td>
		<td>85 Years</td>
		<td>Age Unknown</td>
	</tr>
<?php $cnt = 0; ?>
@foreach ($data as $dat)
	@if ($cnt <= $limit)
		<tr>
			<th>{{ $dat->name }}</th>
			<th>{{ number_format($dat->rec->us_pop_population) }}</th>
			<th>{{ number_format($dat->rec->us_pop_mortality) }}</th>
			<td class="brdLft">{{ number_format($dat->rec->us_pop_25_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_25_44_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_45_64_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_65_74_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_75_84_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_85_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_age_unknown) }}</td>
			<td class="brdLft">{{ number_format($dat->rec->us_pop_mort_25_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_mort_25_44_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_mort_45_64_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_mort_65_74_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_mort_75_84_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_mort_85_years) }}</td>
			<td>{{ number_format($dat->rec->us_pop_mort_age_unknown) }}</td>
		</tr>
		<?php $cnt++; ?>
	@endif
@endforeach
</table>
