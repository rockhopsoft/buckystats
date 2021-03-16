<!-- Stored in resources/views/vendor/buckystats/inc-graph-nav-form.blade.php -->

<div class="pT15 pB5">
    <a id="hidivBtnGraphCustomize" href="javascript:;"
        class="hidivBtn btn btn-secondary btn-sm"
        ><i class="fa fa-sliders mR3" aria-hidden="true"></i>
        Customize @if ($embed) Graph @else Graphs @endif</a>
    <a id="hidivBtnGraphShare" href="javascript:;"
        class="hidivBtn btn btn-secondary btn-sm"
        ><i class="fa fa-share-alt mR3" aria-hidden="true"></i>
        Share @if ($embed) Graph @else Graphs @endif</a>
    <div class="fC"></div>
</div>

<div id="hidivGraphShare" class="disNon row2 p30 mB5">
    <div id="copyConfirmation" class="pull-right disNon"></div>
    <h3 class="mTn5 slBlueDark">
        <i class="fa fa-share-alt mR3" aria-hidden="true"></i>
        Share @if ($embed) Graph @else Graphs @endif
    </h3>
    <div class="row mT15">
        <div class="col-md-1">
            <h5 class="mT5">Link</h5>
        </div>
        <div class="col-md-9">
            <input type="text" id="copyGraphLinkHtml" class="form-control"
                value="{{ $GLOBALS['SL']->x['share-url'] }}">
        </div>
        <div class="col-md-2">
            <a id="copyBtnGraphLinkHtml" href="javascript:;"
                class="btn btn-primary btn-block"
                ><i class="fa fa-files-o mR3" aria-hidden="true"></i> Copy</a>
        </div>
    </div>
@if (!isset($embed) || $embed === true)
    <div class="row mT15">
        <div class="col-md-1">
            <h5 class="mT5">Embed</h5>
        </div>
        <div class="col-md-9">
            <textarea id="copyGraphEmbedHtml" class="form-control"
                >{!! $GLOBALS['SL']->x['share-embed'] !!}</textarea>
        </div>
        <div class="col-md-2">
            <a id="copyBtnGraphEmbedHtml" href="javascript:;"
                class="btn btn-primary btn-block"
                ><i class="fa fa-files-o mR3" aria-hidden="true"></i> Copy</a>
        </div>
    </div>
@endif
</div>

<div id="hidivGraphCustomize" class="disNon row2 mB5">
    <div class="p30">
        <h3 class="mTn5 slBlueDark">
            <i class="fa fa-sliders mR3" aria-hidden="true"></i>
            Customize @if ($embed) Graph @else Graphs @endif
        </h3>
        <div class="row">
            <div class="col-md-3">
                <select id="popGraphStateID" name="popGraphState"
                    class="form-control form-control-lg mB10" autocomplete="off"
                    onChange=" selectTag('1', this.value); this.value='';">
                    <option value="" SELECTED >Select state to add...</option>
                    {!! str_replace('<option value=""', '<option value="US"',
                        str_replace('All United States', 'United States (US as a whole)',
                        str_replace('SELECTED', '',
                            $GLOBALS["SL"]->states->stateDrop(
                                ((sizeof($states) > 0) ? $states[0] : ''),
                                true
                            )
                        ))
                    ) !!}
                </select>
                <input name="n1tagIDs" id="n1tagIDsID"
                    data-nid="1" type="hidden" value=",">
            </div>
            <div class="col-md-6">
                <select id="popGraphGroupsID" name="popGraphGroups"
                    class="form-control form-control-lg mB10" autocomplete="off"
                    onChange="selectTag('2', this.value); this.value='';">
                    <option value="" SELECTED >Select data point to add...</option>
                    {!! str_replace('SELECTED', '',
                        $dataTypes->printDropOpts()
                    ) !!}
                </select>
                <input name="n2tagIDs" id="n2tagIDsID"
                    data-nid="2" type="hidden" value=",">
            </div>
            <div class="col-md-3">
                <select id="popGraphTimescaleID" name="popGraphTimescale"
                    class="form-control form-control-lg mB10" autocomplete="off">
                    <option value="years"
                        @if ($timescale == 'years') SELECTED @endif
                        >Yearly Data</option>
                    <option value="weeks-for-years"
                        @if ($timescale == 'weeks-for-years') SELECTED @endif
                        >Weekly Data Over Years</option>
                    <option value="weeks"
                        @if ($timescale == 'weeks') SELECTED @endif
                        >Weekly Data for 2020</option>
                    <option value="days"
                        @if ($timescale == 'days') SELECTED @endif
                        >Daily Data for 2020</option>
                </select>
            </div>
        </div>

        <div class="row mTn10">
            <div class="col-md-3">
                <div id="n1tags" class="slTagList"></div>
            </div>
            <div class="col-md-9">
                <div id="n2tags" class="slTagList"></div>
            </div>
        </div>
    </div>
</div>

@if (in_array($timescale, ['weeks', 'days'])
    && (in_array('life-expect-birth', $reqDataSlugs)
        || in_array('life-expect-65', $reqDataSlugs)
        || in_array('life-expect-75', $reqDataSlugs)))
    <div class="alert alert-danger fade in alert-dismissible show"
        style="padding: 10px 15px;">
        * Life expectancy estimates are not availables for the most recent years.
    </div>
@endif

<script type="text/javascript">

setTimeout("updateTagList('1')", 100);
function loadFltTagState1() {
    addTagOptExtra("1", "US", "United States", {{ ((in_array('US', $states)) ? 1 : 0) }}, "");
@foreach ($GLOBALS["SL"]->states->stateList as $abbr => $name)
    addTagOptExtra("1", {!! json_encode($abbr) !!}, {!! json_encode($name) !!}, {{ ((in_array($abbr, $states)) ? 1 : 0) }}, "");
@endforeach
    updateTagList("1");
}
setTimeout("loadFltTagState1()", 50);

function clearState() {
    if (document.getElementById("n1tagIDsID")) {
        document.getElementById("n1tagIDsID").value=",";
        deselectTag("1", "ALL");
    }
}

setTimeout("updateTagList('2')", 100);
function loadFltTagData2() {
@forelse ($dataTypes->typeGroups as $group)
    @forelse ($group->types as $type)
    addTagOptExtra("2", "{{ $type->slug }}", {!! json_encode($type->title) !!}, {{ ((in_array($type->slug, $reqDataSlugs)) ? 1 : 0) }}, "");
    @empty
    @endforelse
@empty
@endforelse
    updateTagList("2");
}
setTimeout("loadFltTagData2()", 50);


$(document).ready(function(){

    function reloadPopGraph() {
        if (document.getElementById("n1tagIDsID") && document.getElementById("n2tagIDsID") && document.getElementById("popGraphTimescaleID")) {
            var src = "/";
            var timescale = document.getElementById("popGraphTimescaleID").value;
            var stateVal  = document.getElementById("n1tagIDsID").value;
            if (stateVal.length > 1) {
                stateVal = stateVal.substring(1, stateVal.length-1);
            }
            var dataVal = document.getElementById("n2tagIDsID").value;
            if (dataVal.length > 1) {
                dataVal = dataVal.substring(1, dataVal.length-1);
            }
            var stateCnt = stateVal.split(",").length;
            var dataCnt  = dataVal.split(",").length;
            if (dataVal == ",") {
                src += "all-lines/US/";
                if (stateVal == ",") {
                    stateVal = ",US,";
                }
                if (stateVal != ",US," && stateCnt == 1) {
                    src += stateVal.replace(",", "").replace(",", "") + "/";
                }
            } else if (stateVal == ",") {
                src += "all-states/US/";
            } else if (stateCnt == 1) {
                src += "one/US/";
                var state = document.getElementById("n1tagIDsID").value.substring(1, 3);
                if (state != "US") {
                    src += state.replace(",", "").replace(",", "") + "/";
                }
            } else {
                src += "multi/US/";
            }
            src += timescale+"?";
            if (stateCnt > 1) {
                src += "states=" + stateVal;
                if (dataVal != ",") {
                    src += "&data="+dataVal;
                }
            } else if (dataVal != ",") {
                src += "data="+dataVal;
            }
            graphFormSpinner();
            console.log("stateCnt: "+stateCnt+", dataCnt: "+dataCnt+", timescale: "+timescale+" - src: "+src);
            window.location=src; // +"&refresh=1";
        }
    }
    $(document).on("change", "#popGraphStateID", function() {
        setTimeout(function() { reloadPopGraph(); }, 300);
    });
    $(document).on("change", "#popGraphGroupsID", function() {
        setTimeout(function() { reloadPopGraph(); }, 300);
    });
    $(document).on("click", ".formTagDeselect", function() {
        setTimeout(function() { reloadPopGraph(); }, 300);
    });
    $(document).on("change", "#popGraphTimescaleID", function() {
        reloadPopGraph();
    });

});

</script>