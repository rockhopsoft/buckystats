<!-- Stored in resources/views/vendor/buckystats/nodes/3131-report-covid-response.blade.php -->

<div class="container mT30 mB30">
    <h2 class="slBlueDark mB30">All United States: <nobr>COVID-19</nobr> Government Responses
        & Standardized <nobr>All-Cause</nobr> Mortality Statistics</h2>

    <a href="/covid-response-all-states-daily" class="fL btn btn-secondary mR15 mB5"
        >Daily COVID Response Graphs <nobr>for All States</nobr></a>
    <a href="/covid-response-all-states-weekly" class="fL btn btn-secondary mR15 mB5"
        >Weekly COVID Response Graphs <nobr>for All States</nobr></a>
    <div class="fC p30"></div>

    {!! view('vendor.buckystats.inc-oxford-description')->render() !!}
</div>

<div class="container-fluid mT30 mB30">
    <h2>Data Table</h2>
    <a href="?csv=1" target="_blank" class="fL mR15 btn btn-secondary btn-sm"
        ><i class="fa fa-cloud-download mR3" aria-hidden="true"></i> CSV</a>
    <a href="?excel=1" class="fL mR15 btn btn-secondary btn-sm"
        ><i class="fa fa-file-excel-o mR3" aria-hidden="true"></i> Excel</a>
    <div class="fC pB15"></div>

    <div id="graphDataTbl" class="w100">
        {!! $covidTblUS->print() !!}
    </div>
    <p><br/></p>
</div>

<div class="container mT30 mB30">
    <h2 class="slBlueDark">Graph #1</h2>
    <h3>X: {{ $graph1->axisX->label }}<br />Y: {{ $graph1->title }}</h3>
    {!! $graph1->print(null, false) !!}
    <p><br/></p>
    <p><br/></p>

    <h2 class="slBlueDark">Graph #2</h2>
    <h3>X: {{ $graph2->axisX->label }}<br />Y: {{ $graph2->title }}</h3>
    {!! $graph2->print(null, false) !!}
    <p><br/></p>
    <p><br/></p>

    <h2 class="slBlueDark">Graph #3</h2>
    <h3>X: {{ $graph3->axisX->label }}<br />Y: {{ $graph3->title }}</h3>
    {!! $graph3->print(null, false) !!}
    <p><br/></p>
    <p><br/></p>

    <h2 class="slBlueDark">Graph #4</h2>
    <h3>X: {{ $graph4->axisX->label }}<br />Y: {{ $graph4->title }}</h3>
    {!! $graph4->print(null, false) !!}
    <p><br/></p>
    <p><br/></p>

    <h2 class="slBlueDark">Graph #5</h2>
    <h3>X: {{ $graph5->axisX->label }}<br />Y: {{ $graph5->title }}</h3>
    {!! $graph5->print(null, false) !!}
    <p><br/></p>
    <p><br/></p>

    <h2 class="slBlueDark">Graph #6</h2>
    <h3>X: {{ $graph6->axisX->label }}<br />Y: {{ $graph6->title }}</h3>
    {!! $graph6->print(null, false) !!}
    <p><br/></p>
    <p><br/></p>

    <h2 class="slBlueDark">Graph #7</h2>
    <h3>X: {{ $graph7->axisX->label }}<br />Y: {{ $graph7->title }}</h3>
    {!! $graph7->print(null, false) !!}
    <p><br/></p>
    <p><br/></p>

    <h2 class="slBlueDark">Graph #8</h2>
    <h3>X: {{ $graph8->axisX->label }}<br />Y: {{ $graph8->title }}</h3>
    {!! $graph8->print(null, false) !!}
    <p><br/></p>
    <p><br/></p>

    <h2 class="slBlueDark">Graph #9</h2>
    <h3>X: {{ $graph9->axisX->label }}<br />Y: {{ $graph9->title }}</h3>
    {!! $graph9->print(null, false) !!}
    <p><br/></p>
    <p><br/></p>

    <h2 class="slBlueDark">Graph #10</h2>
    <h3>X: {{ $graph10->axisX->label }}<br />Y: {{ $graph10->title }}</h3>
    {!! $graph10->print(null, false) !!}
    <p><br/></p>
    <p><br/></p>


    {!! $stdCalcExample !!}

    {!! $GLOBALS["CUST"]->printSources(['covid-all-avg', 'standardized-by-age-us'], '2020') !!}

    {!! view('vendor.buckystats.inc-back-to-top')->render() !!}
</div>

<script type="text/javascript"> $(document).ready(function(){

function sortDataTable(slug, tbl) {
    if (document.getElementById(tbl)) {
        $("#"+tbl+"").load("?ajaxTbl=1&sort="+slug+"");
    }
}
$(document).on("click", ".dataTblHeaderSort", function() {
    var slug = $(this).attr("data-sort-slug");
    var tbl = $(this).attr("data-sort-tbl");
    setTimeout(function() { sortDataTable(slug, tbl); }, 10);
});

}); </script>


<style>
#blockWrap3132 {
    margin-top: 30px;
}
#tblR0 {
    background: #FFF;
}
#tblR0C0, #tblR0C1, #tblR0C2, #tblR0C3, #tblR0C4, #tblR0C5,
#tblR0C6, #tblR0C7, #tblR0C8, #tblR0C9, #tblR0C10 {
    border-top: 0px none;
}
</style>

{!! view('vendor.buckystats.inc-header-shrink')->render() !!}
