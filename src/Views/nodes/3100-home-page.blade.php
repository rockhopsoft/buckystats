<!-- Stored in resources/views/vendor/buckystats/nodes/3100-home-page.blade.php -->

<div id="wrapHomeHeader" class="w100 pB30 mB30" style="background: #000;
    background-image: url('/buckystats/uploads/bg-1.jpg');
    background-size: cover; background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 pT30">
                <div class="spinningDomeText w100 opac90">
                    <h3>Data & Graphs To Explore Our <nobr>Shared Realities</nobr></h3>
                    <div class="w100 mT15" style="border-bottom: 1px #33ff06 solid;"></div>
                    <div class="w100 mB30" style="border-bottom: 2px #33ff06 dotted;"></div>
                    <p>
                    Until recently, nuances in world data were only accessible to the dominant
                    <nobr><i><a href="https://www.alibris.com/Grunch-of-Giants-Professor-R-Buckminster-Fuller/book/2725727"
                        target="_blank">Grunch</a>
                    <a href="https://www.audible.com/pd/Grunch-of-Giants-Audiobook/B0743L3Q85"
                        target="_blank">of Giants</a></i></nobr>,
                    and <nobr>data-minded</nobr> visionaries like
                    <nobr><a href="https://en.wikipedia.org/wiki/Buckminster_Fuller"
                        target="_blank">Buckminster Fuller</a>.</nobr>
                    </p>
                    <p>
                    More hubs of open source intelligence should help
                    inform better decisions — both individual and collective.
                    If we think harders together, our world's path can still get lucky.
                    </p>
                    <h5 class="mT30">
                    Hopefully, you find some useful insights from these graphs...
                    like <nobr>radar displays</nobr> for fellow co-pilots of spaceship earth...
                    </h5>
                </div>
            </div>
            <div class="col-md-6 pT30 taC">
                <center><div id="headerGif" class="round30 opac80">
                    <img src="/buckystats/uploads/buckystats-loading.gif">
                </div></center>
            </div>
        </div>
    </div>
</div>


<div id="wrapHome" class="container-fluid">
    <div class="row">
        <div class="col-md-6 pT30">

            <div class="pL15 pB15">
                <h3 class="slBlueDark">List of All Data Lines</h3>
                <div id="listDesc">
                    <p>
                        From any one of these links, you can add and
                        remove multiple states and data lines.
                        Hopefully, these tools empower you to explore
                        our shared realities with better clarity.
                    </p>
                    <p>
                        The currently available collection only has a bit of depth
                        of just a couple vital statistics for the United States.
                        Choose your own data adventure:
                    </p>
                </div>
            </div>
            {!! $bigList !!}

            <p><br /></p>

            <div class="pL15 pB15">
                <h3 class="slBlueDark">Curated Trend Reports</h3>
                <div id="listDesc">
                    <p>
                        All of this site's core datasets can be explored
                        with the links above. But there are a few more
                        custom-created reports with specific analysis.
                    </p>
                </div>
            </div>
            {!! $custReps !!}
            <p><br /></p>

        </div>
        <div class="col-md-6 pT30">

            <h3 class="slBlueDark">Historical Perspectives on Life & Death</h3>
            <p>
                Statistics like these contain <b>both tragedy and hope</b>.
                For decades before 2020, most places in the United States
                experienced slowly expanding life expectancy.
            </p>
            <p>
                The oldest dataset on this website is all-cause
                mortality going back to 1902 — but only for Maryland,
                and the United States as a whole so far.
                (10,000 deaths per million equals 1%.)
            </p>
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[0]->id) !!}
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[1]->id) !!}
            <p><br /></p>
            <p>
                <a href="https://wonder.cdc.gov/mortSQL.html" target="_blank"
                    >The CDC provides age group breakdowns
                    for mortality going back to 1968</a>,
                providing more actionable comparisons over time.
                Here is the national average alongside the eight largest states:
            </p>
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[2]->id) !!}
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[3]->id) !!}
            <p><br /></p>
            <p>
                So far, only a few other data lines have been added like
                the U.S. estimates of unemployment and the national debt.
            </p>
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[4]->id) !!}

        </div>
    </div>
</div>

<div class="container mB30">
    <h3 class="slBlueDark">COVID-Related Government Responses</h3>
    <a href="/covid-govt-response"
        class="fL btn btn-secondary btn-sm mR15 mB5"
        >2020 Overall COVID Response Data Tables</a>
    <a href="/covid-19-response-all-states-weekly"
        class="fL btn btn-secondary btn-sm mR15 mB5"
        >Weekly COVID Response Graphs for All States</a>
    <div class="fC mB30"></div>
    <p>
        The <a href="https://github.com/OxCGRT/covid-policy-tracker"
            target="_blank">Blavatnik School of Government
            created the Oxford Covid-19 Government
            <nobr>Response Tracker (OxCGRT)</nobr></a>
        with daily indexes. Here are the
        <a href="/covid-govt-response" target="_blank">8 highest and 8 lowest
        average daily "Overall Government Response Index" throughout 2020</a>:
    </p>
    <p>
        Here are a few examples from the full COVID reports:
    </p>
    <h4>United States All-Cause Mortality & COVID-19 Response</h4>
    {!! $GLOBALS["CUST"]->printGraphEmbed($charts[5]->id) !!}
    <p><br /></p>

    <h4>Maryland All-Cause Mortality & COVID-19 Response</h4>
    {!! $GLOBALS["CUST"]->printGraphEmbed($charts[6]->id) !!}
    <p><br /></p>

    <h4>Florida All-Cause Mortality & COVID-19 Response</h4>
    {!! $GLOBALS["CUST"]->printGraphEmbed($charts[7]->id) !!}
    <p><br /></p>
</div>

<div id="homeSources" class="container mB30">
    {!! $GLOBALS["CUST"]->printSources() !!}

    <p><br /></p>
    {!! view('vendor.buckystats.inc-back-to-top')->render() !!}
</div>


<script type="text/javascript"> $(document).ready(function(){

@foreach ($charts as $chart)
    {!! $GLOBALS["CUST"]->printGraphEmbedJS($chart->id, $chart->url, $chart->delay) !!}
@endforeach

}); </script>


<style>

#wrapHomeHeader a:link, #wrapHomeHeader a:active, #wrapHomeHeader a:visited, #wrapHomeHeader a:hover {
    color: #33ff06;
}
#wrapHomeHeader, .spinningDomeText p, .spinningDomeText h3, .spinningDomeText h5 {
    color: #FFF;
}

#headerGif {
    display: block;
    background: #000;
    padding: 10px 30px;
    width: 212px;
    max-width: 212px;
}
#headerGif img {
    height: 270px;
    max-height: 270px;
}
#listDesc {
    width: 80%;
}

@media screen and (max-width: 768px) {
    #headerGif {
        width: 165px;
        max-width: 165px;
    }
    #headerGif img {
        height: 180px;
        max-height: 180px;
    }
    #listDesc {
        width: 100%;
    }
}

</style>
