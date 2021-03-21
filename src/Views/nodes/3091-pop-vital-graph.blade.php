<!-- Stored in resources/views/vendor/buckystats/nodes/3091-pop-vital-graph.blade.php -->

{!! view(
    'vendor.buckystats.inc-graph-nav-form',
    [
        "states"       => $states,
        "dataTypes"    => $dataTypes,
        "timescale"    => $timescale,
        "reqDataSlugs" => $reqDataSlugs,
        "embed"        => true
    ]
)->render() !!}

<div id="wrap{{ $rand }}" class="container mB15"
    style="padding-left: 0px; padding-right: 0px;">
    {!! $graph->print($rand) !!}
</div>


<div class="pT30 mT30 mB30">
    <h2 class="slBlueDark">{{ $graph->title }}</h2>
    <h2>Data Table</h2>
    <a href="{{ $currGraphUrl }}&csv=1" target="_blank"
        class="fL mR15 btn btn-secondary btn-sm"
        ><i class="fa fa-cloud-download mR3" aria-hidden="true"></i> CSV</a>
    <a href="{{ $currGraphUrl }}&excel=1"
        class="fL mR15 btn btn-secondary btn-sm"
        ><i class="fa fa-file-excel-o mR3" aria-hidden="true"></i> Excel</a>
    <div class="fC pB15"></div>

    <div id="popGraphData" class="mT30">
        <div id="popGraphDataTable" class="w100 mB30 pB30">
            {!! $graph->printDataTable($timescale != 'years') !!}
        </div>
        {!! $stdCalcExample !!}
    </div>
</div>

{!! $GLOBALS["CUST"]->printSources($reqDataSlugs) !!}

{!! view('vendor.buckystats.inc-back-to-top')->render() !!}

<style>
@if ($graph->getDataTableDatColumnCnt() == 1)
    #popGraphDataTable { width: 50%; }
@elseif ($graph->getDataTableDatColumnCnt() == 2)
    #popGraphDataTable { width: 66%; }
@endif
@media screen and (max-width: 992px) {
    #popGraphDataTable { width: 100%; }
}
</style>

{!! view('vendor.buckystats.inc-header-shrink')->render() !!}
