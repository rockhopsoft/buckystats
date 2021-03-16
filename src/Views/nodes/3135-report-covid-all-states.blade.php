<!-- Stored in resources/views/vendor/buckystats/nodes/3135-report-covid-all-states.blade.php -->

@if ($timescale == 'weeks')
    <h2 class="slBlueDark">COVID-19 Government Response: Weekly Data for All States</h2>
    <a href="/covid-govt-response" class="fL btn btn-secondary mR15 mB5"
        >2020 Overall COVID Government Responses</a>
    <a href="/covid-response-all-states-daily" class="fL btn btn-secondary mR15 mB5"
        >Daily COVID Response Graphs for All States</a>
@else
    <h2 class="slBlueDark">COVID-19 Government Response: Daily Data for All States</h2>
    <a href="/covid-govt-response" class="fL btn btn-secondary mR15 mB5"
        >2020 Overall COVID Government Responses</a>
    <a href="/covid-response-all-states-weekly" class="fL btn btn-secondary mR15 mB5"
        >Weekly COVID Response Graphs for All States</a>
@endif
<div class="fC mB30"></div>

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

{!! $GLOBALS["CUST"]->printSources(['covid'], '2020') !!}

{!! view('vendor.buckystats.inc-back-to-top')->render() !!}

<style>
#blockWrap3135, #blockWrap3141 {
    margin-top: 30px;
}
</style>

{!! view('vendor.buckystats.inc-header-shrink')->render() !!}
