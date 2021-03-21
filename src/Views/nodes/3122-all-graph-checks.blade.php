<!-- Stored in resources/views/vendor/buckystats/nodes/3122-all-graph-checks.blade.php -->

{!! view(
    'vendor.buckystats.inc-graph-nav-form',
    [
        "states"       => $states,
        "dataTypes"    => $dataTypes,
        "timescale"    => $timescale,
        "reqDataSlugs" => [],
        "embed"        => false
    ]
)->render() !!}
<h2>
    Every Data Line,
    @if ($timescale == 'years') Yearly,
    @elseif ($timescale == 'weeks-for-years') Weekly Over Years,
    @elseif ($timescale == 'weeks') Weekly,
    @elseif ($timescale == 'days') Daily,
    @endif
    for
    @if (sizeof($states) > 1) {{ implode(', ', $states) }}
    @elseif ($stateName == 'United States') the United States
    @else {{ $stateName }}
    @endif
</h2>
<p><br/></p>

@foreach ($charts as $group)
    <h2 class="slBlueDark">{{ $group[0] }}</h2>
    @foreach ($group[1] as $embed)
        <div class="pT30 pB30">
            <h3>{{ $embed[0] }}</h3>
            {!! $GLOBALS["CUST"]->printGraphEmbed($embed[1]->id) !!}
        </div>
    @endforeach
@endforeach

{!! $GLOBALS["CUST"]->printSources($reqDataSlugs) !!}

{!! view('vendor.buckystats.inc-back-to-top')->render() !!}


<script type="text/javascript"> $(document).ready(function(){

@foreach ($charts as $group)
    @foreach ($group[1] as $embed)
        {!! $GLOBALS["CUST"]->printGraphEmbedJS($embed[1]->id, $embed[1]->url, $embed[1]->delay) !!}
    @endforeach
@endforeach

}); </script>

