<!-- Stored in resources/views/vendor/buckystats/nodes/3150-about-graphs.blade.php -->

{!! $GLOBALS["CUST"]->printGraphEmbed($charts[0]->id) !!}
{!! $GLOBALS["CUST"]->printGraphEmbed($charts[1]->id) !!}
{!! $GLOBALS["CUST"]->printGraphEmbed($charts[2]->id) !!}

<center><div class="treeWrapForm">
    <p><br></p>
    <p>
        <a href="https://www.nidcd.nih.gov/health/statistics/what-epidemiology" target="_blank"
            >Epidemiology is the branch of medical science that investigates diseases,
            disorders, and how they relate to society.</a>
        When comparing health data between populations, more actionable
        analysis requires accounting for relevant demographic differences.
    </p>
    <p>
        For example, about 6.7% of Maryland is at least 75 years old. But about 9.6% of Florida
        is at least 75 years old. So beyond scaling all-cause mortality data to the total size
        of a population (percent or "per million"), we can get even more comparable datasets
        by converting each state's data to a standardized population distribution.
        Each graph that includes these population distributions includes
        sample calculations that help explain the methods used here.
    </p>
    <p><br></p>
</div></center>

{!! $GLOBALS["CUST"]->printGraphEmbed($charts[3]->id) !!}

<center><div class="treeWrapForm">
    <p><br></p>
    <p>
        In my current judgment, standardizing populations by age group
        distribution provides somewhat more actionable and responsible
        comparisons between jurisdictions. This is better than the raw numbers,
        but should also only be the beginning, as we determine other significant
        variables impacting all the systems which are integral to our most important questions.
    </p>
    <p>
        Because preexisting science on 2020 public health policies was far from
        overwhelming or unquestionable, we must compare different populations in retrospect.
        <i>(<a href="https://www.who.int/influenza/publications/public_health_measures/publication/en/"
            target="_blank">Non-pharmaceutical public health measures for mitigating the risk and
            impact of epidemic and pandemic influenza</a>,
        World Health Organization, November 2019: "The evidence base on the effectiveness
        of NPIs in community settings is limited, and the overall quality of evidence was
        very low for most interventions.")</i>
    </p>
    <p>
        In my personal experience of 2020, large governmental and media institutions
        rarely presented any data with enough analysis to make it
        worthy of any life-or-death decisions.
        Here is the national average alongside the 15 largest states:
    </p>
    <p><br></p>
</div></center>

{!! $GLOBALS["CUST"]->printGraphEmbed($charts[4]->id) !!}

<p><br></p>

<script type="text/javascript"> $(document).ready(function(){

@foreach ($charts as $chart)
    {!! $GLOBALS["CUST"]->printGraphEmbedJS($chart->id, $chart->url, $chart->delay) !!}
@endforeach

}); </script>