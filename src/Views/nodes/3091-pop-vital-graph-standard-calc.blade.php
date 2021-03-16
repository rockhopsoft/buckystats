<!-- Stored in resources/views/vendor/buckystats/nodes/3091-pop-vital-graph-standard-calc.blade.php -->

<div class="pT30 mT30">
	<h3 class="mT30">Example of Scaling Mortality to a Standard Age Group Distribution</h3>
	<p>
		The goal here is to <i>somewhat control</i> for changes in this population's
		demographics over time. This is just one big variable in the mix, but it
		is very important as there are many more people are living longer.
		A person's age range is not always known for every death.
		10,000 per million equals 1%.
	</p>
	<h5>
		In {{ $stdYear }}, {{ $stdStateName }} had an
		<a href="https://data.cdc.gov/NCHS/Weekly-counts-of-deaths-by-jurisdiction-and-age-gr/y5bj-9g5w/"
			target="_blank">estimated</a>
		{{ number_format(round($comparePop->us_pop_mortality)) }} deaths, or
		{{ number_format(round($comparePop->us_pop_mortality/($comparePop->us_pop_population/1000000))) }}
		per million.
	</h5>
</div>

<table border=0 class="table table-striped mT15 mB30" >
	<tr class="brdBotBlue2">
		<td></td>
		<th><b>{{ $stdYear }} {{ $stdStateName }} Estimated Population</b></td>
		<th><b>{{ $stdYear }} {{ $stdStateName }} Estimated Deaths</b></td>
		<th class="brdLftGrey"><b>{{ $stdYear }} {{ $stdStateName }} Crude <nobr>Mortality Rate</nobr></b></td>
		<th> </th>
		<th><b>{{ $compareState }} 2019 <nobr>Age Group</nobr> <nobr>Standardized Million</nobr></b></td>
		<th> </th>
		<th>
			<b>Estimated {{ $stdYear }} {{ $stdStateName }} Deaths per
			{{ $compareState }} 2019 <nobr>Age Group</nobr> <nobr>Standardized Million</nobr></b>
		</td>
	</tr>
	<tr>
		<td><nobr>Under 25</nobr></td>
		<td class="taR">{{ number_format($comparePop->us_pop_25_years) }}</td>
		<td class="taR">{{ number_format($comparePop->us_pop_mort_25_years) }}</td>
		<td class="taR brdLftGrey">{{ $GLOBALS["SL"]->sigFigs((100*$comparePop->us_pop_mort_perc_25_years), 4) }}%</td>
		<td class="taR">x</td>
		<td class="taR">{{ number_format(round($distPeeps[0])) }}</td>
		<td class="taR">=</td>
		<td class="taR">{{ number_format(round($ageStandards[0])) }}</td>
	</tr>
	<tr>
		<td>25-44</td>
		<td class="taR">{{ number_format($comparePop->us_pop_25_44_years) }}</td>
		<td class="taR">{{ number_format($comparePop->us_pop_mort_25_44_years) }}</td>
		<td class="taR brdLftGrey">{{ $GLOBALS["SL"]->sigFigs((100*$comparePop->us_pop_mort_perc_25_44_years), 4) }}%</td>
		<td class="taR">x</td>
		<td class="taR">{{ number_format(round($distPeeps[1])) }}</td>
		<td class="taR">=</td>
		<td class="taR">{{ number_format(round($ageStandards[1])) }}</td>
	</tr>
	<tr>
		<td>45-64</td>
		<td class="taR">{{ number_format($comparePop->us_pop_45_64_years) }}</td>
		<td class="taR">{{ number_format($comparePop->us_pop_mort_45_64_years) }}</td>
		<td class="taR brdLftGrey">{{ $GLOBALS["SL"]->sigFigs((100*$comparePop->us_pop_mort_perc_45_64_years), 4) }}%</td>
		<td class="taR">x</td>
		<td class="taR">{{ number_format(round($distPeeps[2])) }}</td>
		<td class="taR">=</td>
		<td class="taR">{{ number_format(round($ageStandards[2])) }}</td>
	</tr>
	<tr>
		<td>65-74</td>
		<td class="taR">{{ number_format($comparePop->us_pop_65_74_years) }}</td>
		<td class="taR">{{ number_format($comparePop->us_pop_mort_65_74_years) }}</td>
		<td class="taR brdLftGrey">{{ $GLOBALS["SL"]->sigFigs((100*$comparePop->us_pop_mort_perc_65_74_years), 4) }}%</td>
		<td class="taR">x</td>
		<td class="taR">{{ number_format(round($distPeeps[3])) }}</td>
		<td class="taR">=</td>
		<td class="taR">{{ number_format(round($ageStandards[3])) }}</td>
	</tr>
	<tr>
		<td>75-84</td>
		<td class="taR">{{ number_format($comparePop->us_pop_75_84_years) }}</td>
		<td class="taR">{{ number_format($comparePop->us_pop_mort_75_84_years) }}</td>
		<td class="taR brdLftGrey">{{ $GLOBALS["SL"]->sigFigs((100*$comparePop->us_pop_mort_perc_75_84_years), 4) }}%</td>
		<td class="taR">x</td>
		<td class="taR">{{ number_format(round($distPeeps[4])) }}</td>
		<td class="taR">=</td>
		<td class="taR">{{ number_format(round($ageStandards[4])) }}</td>
	</tr>
	<tr>
		<td>85+</td>
		<td class="taR">{{ number_format($comparePop->us_pop_85_years) }}</td>
		<td class="taR">{{ number_format($comparePop->us_pop_mort_85_years) }}</td>
		<td class="taR brdLftGrey">{{ $GLOBALS["SL"]->sigFigs((100*$comparePop->us_pop_mort_perc_85_years), 4) }}%</td>
		<td class="taR">x</td>
		<td class="taR">{{ number_format(round($distPeeps[5])) }}</td>
		<td class="taR">=</td>
		<td class="taR">{{ number_format(round($ageStandards[5])) }}</td>
	</tr>
	<tr class="brdTopGrey">
		<td><b>Total</td>

		<td class="taR">{{ number_format($comparePop->us_pop_25_years+$comparePop->us_pop_25_44_years+$comparePop->us_pop_45_64_years+$comparePop->us_pop_65_74_years+$comparePop->us_pop_75_84_years+$comparePop->us_pop_85_years) }}</td>
		<td class="taR">{{ number_format($comparePop->us_pop_mort_25_years+$comparePop->us_pop_mort_25_44_years+$comparePop->us_pop_mort_45_64_years+$comparePop->us_pop_mort_65_74_years+$comparePop->us_pop_mort_75_84_years+$comparePop->us_pop_mort_85_years) }}</td>
		<td class="taR brdLftGrey"> <?php /* {{ $GLOBALS["SL"]->sigFigs((100*
			($comparePop->us_pop_mort_25_years+$comparePop->us_pop_mort_25_44_years+$comparePop->us_pop_mort_45_64_years+$comparePop->us_pop_mort_65_74_years+$comparePop->us_pop_mort_75_84_years+$comparePop->us_pop_mort_85_years)
				/($comparePop->us_pop_25_years+$comparePop->us_pop_25_44_years+$comparePop->us_pop_45_64_years+$comparePop->us_pop_65_74_years+$comparePop->us_pop_75_84_years+$comparePop->us_pop_85_years)
			), 4) }}% */ ?> </td>
		<td> </td>
		<td class="taR">{{ number_format(round(
			$distPeeps[0]+$distPeeps[1]+$distPeeps[2]
				+$distPeeps[3]+$distPeeps[4]+$distPeeps[5]
		)) }}</td>
		<td> </td>
		<td class="taR"><b>{{ number_format(round(
			$ageStandards[0]+$ageStandards[1]+$ageStandards[2]
				+$ageStandards[3]+$ageStandards[4]+$ageStandards[5]
		)) }}</b></td>
	</tr>
</table>

<div class="p15"></div>
