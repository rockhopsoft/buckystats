<!-- Stored in resources/views/vendor/buckystats/nodes/3100-home-page.blade.php -->

<div id="wrapHomeHeader" class="w100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p30">
                <h3>Data & Graphs To Explore Our <nobr>Shared Realities</nobr></h3>
                <div class="w100 mT15" style="border-bottom: 1px #33ff06 solid;"></div>
                <div class="w100 mB30" style="border-bottom: 2px #33ff06 dotted;"></div>
                <p>
                More hubs of open source intelligence should help
                inform better decisions — both individual and collective.
                If we think harder together, our world's path can still get lucky.
                </p>
                <p>
                Until recently, nuances in world data were only accessible to the dominant
                <nobr><i><a href="https://www.alibris.com/Grunch-of-Giants-Professor-R-Buckminster-Fuller/book/2725727"
                    target="_blank">Grunch</a>
                <a href="https://www.audible.com/pd/Grunch-of-Giants-Audiobook/B0743L3Q85"
                    target="_blank">of Giants</a></i></nobr>,
                and <nobr>data-minded</nobr> visionaries like
                <nobr><a href="https://infogalactic.com/info/Buckminster_Fuller"
                    target="_blank">Buckminster Fuller</a>.</nobr>
                    Today, tons of data are a couple of clicks away, with sources
                    referenced at the bottom of every page.
                </p>
                <h5 class="mT30">
                Hopefully, you find some useful insights from these graphs...
                like <nobr>radar displays</nobr> for fellow co-pilots of spaceship earth...
                </h5>
            </div>
            <div class="col-lg-6 pT30 pB30"
                style="background-image: url('/buckystats/uploads/bg-1.jpg');
                    background-size: cover; background-repeat: no-repeat;">
                <center><div id="headerGif" class="round30 opac80">
                    <img src="/buckystats/uploads/buckystats-loading.gif">
                </div></center>
            </div>
        </div>
    </div>
</div>


<div id="wrapHome" class="container-fluid mT30">

    <div class="row">
        <div class="col-lg-6 p30">
            <h3 class="slBlueDark">Historical Stats on Life & Death</h3>
            <p>
                Statistics like these contain <b>both tragedy and hope</b>.
                For decades before 2020, most places in the United States
                experienced slowly expanding life expectancy.
            </p>
            <p>
                So far, this site has all-cause mortality going back to 1902
                for Maryland and the United States as a whole.
                (10,000 deaths per million equals 1%.)
            </p>
        </div>
        <div class="col-lg-6"></div>
    </div>
    <div class="row">
        <div class="col-lg-6 p30">
            <h5><a href="/one/US/weeks?data=raw-mort,avg-raw-mort"
                >U.S. Deaths per Million, <nobr>1902-2020</nobr></a></h5>
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[0]->id) !!}
        </div>
        <div class="col-lg-6 p30">
            <h5><a href="/one/US/years?data=life-expect-birth,life-expect-65,life-expect-75"
                >United States Life Expectancy, <nobr>1902-2018</nobr></a></h5>
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[1]->id) !!}
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6 pT30">

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
                        Most pages on this website have a button to "Customize Graphs"
                        and this is where most of the power hides.
                        So choose your own data adventure:
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
        <div class="col-lg-6 pT30">

            <p>
                <a href="https://wonder.cdc.gov/mortSQL.html" target="_blank"
                    >The CDC provides age group breakdowns
                    for mortality going back to 1968</a>,
                providing more actionable comparisons over time.
                Here is the national average alongside the eight largest states:
            </p>

            <h5><a href="/multi/US/years?states=US,CA,TX,FL,NY,PA,IL,OH,GA&data=standardized-by-age-us"
                >Deaths per Million of U.S. 2019 Standardized Population, <nobr>1968-2020</nobr></a></h5>
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[2]->id) !!}
            <p><br /></p>
            <h5><a href="/multi/US/years?states=US,CA,TX,FL,NY,PA,IL,OH,GA&data=standardized-by-age-us-avg-5yr"
                >% Increase Over Previous 5-Year Average of Deaths per Million
                of U.S. 2019 Standardized Population, <nobr>1968-2020</nobr></a></h5>
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[3]->id) !!}
            <p><br /></p>
            <p>
                So far, only a few other data lines have been added like
                the U.S. estimates of unemployment, the national debt,
                and a some consumer price indices.
            </p>

            <h5><a href="/one/US/years?data=unemployment-rate,debt-govt-per-capita"
                >U.S. Unemployment & National Debt Per Capita, <nobr>1902-2020</nobr></a></h5>
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[4]->id) !!}

            <h5><a href="/one/US/years?data=r-cpi-u,r-cpi-u-rs"
                >Consumer Price Index <nobr>(CPI-U,</nobr> <nobr>since 1913)</nobr> and
                Retroactive Series <nobr>(R-CPI-U-RS,</nobr> <nobr>since 1978)</nobr></a></h5>
            {!! $GLOBALS["CUST"]->printGraphEmbed($charts[5]->id) !!}

        </div>
    </div>
</div>

<div class="container mT30 mB30">
    <h3 class="slBlueDark">COVID-Related Government Responses</h3>
    <p>
        The <a href="https://github.com/OxCGRT/covid-policy-tracker"
            target="_blank">Blavatnik School of Government created the
            Oxford Covid-19 Government <nobr>Response Tracker (OxCGRT)</nobr></a>
        with daily indices.
    </p>
    {!! view('vendor.buckystats.inc-desc-covid-oxford-indexes')->render() !!}
    <p><br /></p>

    <h5><a href="/one/US/days?data=standardized-by-age-us,avg-standardized-by-age-us,covid-all-avg"
        >United States All-Cause Mortality & COVID-19 Response</a></h5>
    {!! $GLOBALS["CUST"]->printGraphEmbed($charts[6]->id) !!}
    <p><br /></p>

    <h5><a href="/one/US/MD/days?data=standardized-by-age-us,avg-standardized-by-age-us,covid-all-avg"
        >Maryland All-Cause Mortality & COVID-19 Response</a></h5>
    {!! $GLOBALS["CUST"]->printGraphEmbed($charts[7]->id) !!}
    <p><br /></p>

    <h5><a href="/one/US/FL/days?data=standardized-by-age-us,avg-standardized-by-age-us,covid-all-avg"
        >Florida All-Cause Mortality & COVID-19 Response</a></h5>
    {!! $GLOBALS["CUST"]->printGraphEmbed($charts[8]->id) !!}

    <a href="/covid-govt-response" class="fL btn btn-secondary mR15 mB5"
        >2020 Overall COVID Response <nobr>Data Tables</nobr></a>
    <a href="/covid-response-all-states-weekly" class="fL btn btn-secondary mR15 mB5"
        >Weekly COVID Response Graphs <nobr>for All States</nobr></a>
    <div class="fC mB30"></div>
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
body { overflow-x: hidden; }
#wrapHomeHeader a:link, #wrapHomeHeader a:active, #wrapHomeHeader a:visited, #wrapHomeHeader a:hover {
    color: #33ff06;
}
#wrapHomeHeader {
    background: #000;
}
#wrapHomeHeader,
#wrapHomeHeader .container-fluid,
#wrapHomeHeader .container-fluid .row,
#wrapHomeHeader .container-fluid .row div,
#wrapHomeHeader .container-fluid .row div p,
#wrapHomeHeader .container-fluid .row div h3,
#wrapHomeHeader .container-fluid .row div h5 {
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
