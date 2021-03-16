<!-- Stored in resources/views/vendor/buckystats/nodes/3091-pop-vital-compare.blade.php -->

{!! view(
    'vendor.buckystats.inc-graph-nav-form',
    [
        "states"       => [],
        "dataTypes"    => $dataTypes,
        "timescale"    => $timescale,
        "reqDataSlugs" => $reqDataSlugs,
        "embed"        => false
    ]
)->render() !!}
<h2>Every Jurisdiction</h2>
<h4 class="slBlueDark">
@foreach ($reqDataSlugs as $i => $dataSlug)
    {{ $dataTypes->getDataPointTitle($dataSlug)
        . (($i < sizeof($reqDataSlugs)-1) ? ', ' : '') }}
@endforeach
</h4>
<p><br/></p>

{!! view(
    'vendor.buckystats.inc-all-states-graphs',
    [
        "title"     => '',
        "data"      => ',' . implode(',' , $reqDataSlugs) . ',',
        "timescale" => $timescale
    ]
)->render() !!}

{!! $GLOBALS["CUST"]->printSources(['covid'], $timescale) !!}

{!! view('vendor.buckystats.inc-back-to-top')->render() !!}

{!! view('vendor.buckystats.inc-header-shrink')->render() !!}
