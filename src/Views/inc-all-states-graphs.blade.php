<!-- Stored in resources/views/vendor/buckystats/inc-all-states-graphs.blade.php -->

<h4>United States {!! $title !!}</h4>
<div id="graphUScovid" class="embedGraphBig">
    <div class="embedGraphSpin"><h4><i class="fa fa-spinner fa-spin"></i></h4></div>
</div>
<p><br /></p>
    <p><br /></p>

@foreach ($GLOBALS["SL"]->states->stateList as $abbr => $name)
    <h4>{{ $name }} {!! $title !!}</h4>
    <div id="graph{{ $abbr }}" class="embedGraphBig">
        <div class="embedGraphSpin"><h4><i class="fa fa-spinner fa-spin"></i></h4></div>
    </div>
    <p><br /></p>
    <p><br /></p>
@endforeach

{!! view('vendor.buckystats.inc-back-to-top')->render() !!}

<script type="text/javascript"> $(document).ready(function(){

setTimeout(function() {
console.log("/one/US/{{ $timescale }}?data={{ $data }}&ajax=1");
$("#graphUScovid").load("/one/US/{{ $timescale }}?data={{ $data }}&ajax=1");
}, 10);

<?php $cnt = 0; ?>
@foreach ($GLOBALS["SL"]->states->stateList as $abbr => $name)
    @if (!isset($skips) || !in_array($skips, $abbr))
        <?php $cnt++; ?>
        setTimeout(function() {
        console.log("/one/US/{{ $abbr }}/{{ $timescale }}?data={{ $data }}&ajax=1");
        $("#graph{{ $abbr }}").load("/one/US/{{ $abbr }}/{{ $timescale }}?data={{ $data }}&ajax=1");
        }, {{ ($cnt*250) }});
    @endif
@endforeach

}); </script>

