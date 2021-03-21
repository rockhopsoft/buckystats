<!-- Stored in resources/views/vendor/buckystats/nodes/3135-report-covid-all-states.blade.php -->

@if ($timescale == 'weeks')
    <h2 class="slBlueDark mB30">COVID-19 Government Response
        & Standardized <nobr>All-Cause</nobr> Mortality: Weekly Data for <nobr>All States</nobr></h2>
    <a href="/covid-govt-response" class="fL btn btn-secondary mR15 mB5"
        >2020 Overall COVID <nobr>Government Responses</nobr></a>
    <a href="/covid-response-all-states-daily" class="fL btn btn-secondary mR15 mB5"
        >Daily COVID Response Graphs <nobr>for All States</nobr></a>
@else
    <h2 class="slBlueDark mB30">COVID-19 Government Response
        & Standardized <nobr>All-Cause</nobr> Mortality: Daily Data for <nobr>All States</nobr></h2>
    <a href="/covid-govt-response" class="fL btn btn-secondary mR15 mB5"
        >2020 Overall COVID <nobr>Government Responses</nobr></a>
    <a href="/covid-response-all-states-weekly" class="fL btn btn-secondary mR15 mB5"
        >Weekly COVID Response Graphs <nobr>for All States</nobr></a>
@endif
<div class="fC p30"></div>

{!! view('vendor.buckystats.inc-oxford-description')->render() !!}
<p><br /></p>
<p><br /></p>

{!! view(
    'vendor.buckystats.inc-all-states-graphs',
    [
        "title" => 'All-Cause Mortality & COVID-19 Response',
        "data"  => ',standardized-by-age-us,avg-standardized-by-age-us,covid-overall-avg,covid-containment-avg,covid-stringency-avg,covid-economic-avg,',
        "timescale" => $timescale
    ]
)->render() !!}

{!! $stdCalcExample !!}

{!! $GLOBALS["CUST"]->printSources(['covid-all-avg', 'standardized-by-age-us'], '2020') !!}

{!! view('vendor.buckystats.inc-back-to-top')->render() !!}

<style>
#blockWrap3135, #blockWrap3141 {
    margin-top: 30px;
}
</style>

{!! view('vendor.buckystats.inc-header-shrink')->render() !!}
