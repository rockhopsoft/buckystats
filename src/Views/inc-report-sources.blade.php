<!-- Stored in resources/views/vendor/buckystats/inc-report-sources.blade.php -->
<?php $moreTxt = 'Description & Disclaimers'; ?>

<hr>
<div class="pT30">
    <h3>Data Sources</h3>
</div>

@if ($GLOBALS["CUST"]->hasDataSourceCat('pop', $data))
    <p><br /></p>
    <h4 class="slBlueDark">Population Statistics</h4>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('raw-pop', $data)
    || $GLOBALS["CUST"]->hasDataSource('std-pop', $data)
    || $GLOBALS["CUST"]->hasDataSource('raw-mort', $data)
    || $GLOBALS["CUST"]->hasDataSource('std-mort', $data))
    <h5>2017-2019 — Population by United States Jurisdictions</h5>
    <p>
        United States Census Bureau. American Community Survey. ACS Demographic and Housing Estimates.<br />
        Available from:
        <a href="https://data.census.gov/cedsci/table?q=United%20States&g=0100000US&tid=ACSDP1Y2019.DP05"
            target="_blank" class="urlWrap"
            >data.census.gov/cedsci/table?q=United%20States&g=0100000US&tid=ACSDP1Y2019.DP05</a>
    </p>
    <p><br /></p>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('raw-pop', $data)
    || $GLOBALS["CUST"]->hasDataSource('std-pop', $data)
    || $GLOBALS["CUST"]->hasDataSource('raw-mort', $data)
    || $GLOBALS["CUST"]->hasDataSource('std-mort', $data))
    <h5>1968-2016 — Population by United States Jurisdictions</h5>
    <p>
        National Center for Health Statistics. Mortality Data on CDC WONDER.<br />
        Available from: <a href="https://wonder.cdc.gov/mortSQL.html" target="_blank"
            >wonder.cdc.gov/mortSQL.html</a><br />
        1999-2016: <a href="https://wonder.cdc.gov/cmf-icd10.html" target="_blank"
            >wonder.cdc.gov/cmf-icd10.html</a><br />
        1979-1998: <a href="https://wonder.cdc.gov/cmf-icd9.html" target="_blank"
            >wonder.cdc.gov/cmf-icd9.html</a><br />
        1968-1978: <a href="https://wonder.cdc.gov/cmf-icd8.html" target="_blank"
            >wonder.cdc.gov/cmf-icd8.html</a>
    </p>
    <p><br /></p>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('raw-pop', $data)
    || $GLOBALS["CUST"]->hasDataSource('raw-mort', $data))
    <h5>1900-1967 — Population for the United States as a Whole</h5>
    <p>
        Population Division, United States Census Bureau. Population Estimates Program.
        <a href="https://www2.census.gov/programs-surveys/popest/tables/1900-1980/national/totals/popclockest.txt"
            target="_blank">National Intercensal Tables: 1900-1990</a>.<br />
        Available from:
        <a href="https://www.census.gov/data/tables/time-series/demo/popest/pre-1980-national.html"
            target="_blank" class="urlWrap"
            >census.gov/data/tables/time-series/demo/popest/pre-1980-national.html</a>
    </p>
    {!! $GLOBALS["SL"]->printAccordTxtLeft(
        $moreTxt,
        view('vendor.buckystats.inc-report-sources-us-pop-1900-1967')->render()
    ) !!}
    <p><br /></p>

    <h5>1902-1967 — Population for Maryland</h5>
    <p>
        Maryland Department of Health.
        <a href="https://health.maryland.gov/vsa/Pages/reports.aspx"
            target="_blank">Historical Trend Data, Maryland, 1790 - 2018</a><br />
        Available from:
        <a href="https://health.maryland.gov/vsa/Documents/HistoricalTrend_2018.pdf"
            target="_blank" class="urlWrap"
            >health.maryland.gov/vsa/Documents/HistoricalTrend_2018.pdf</a>
    </p>
    <p><br /></p>
@endif


@if ($GLOBALS["CUST"]->hasDataSourceCat('mort', $data))
    <p><br /></p>
    <h4 class="slBlueDark">Vital Statistics</h4>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('raw-pop', $data)
    || $GLOBALS["CUST"]->hasDataSource('std-pop', $data)
    || $GLOBALS["CUST"]->hasDataSource('raw-mort', $data)
    || $GLOBALS["CUST"]->hasDataSource('std-mort', $data))
    <h5>2015-2020 — All-Cause Mortality for United States Jurisdictions</h5>
    <p>
        Used for 2015-2020 weekly data, but only for 2017-2020 annual data.<br />
        National Center for Health Statistics. Weekly counts of deaths by jurisdiction and age group.<br />
        Available from:
        <a href="https://data.cdc.gov/NCHS/Weekly-counts-of-deaths-by-jurisdiction-and-age-gr/y5bj-9g5w/"
            target="_blank" class="urlWrap"
            >data.cdc.gov/NCHS/Weekly-counts-of-deaths-by-jurisdiction-and-age-gr/y5bj-9g5w/</a><br />
        Weighted (predicted) provisional counts are used in these graphs. Data imported 3/1/21.
    </p>
    {!! $GLOBALS["SL"]->printAccordTxtLeft(
        $moreTxt,
        view('vendor.buckystats.inc-report-sources-us-pop-mort-recent-weekly')->render()
    ) !!}
    <p><br /></p>

    <h5>1968-2016 — All-Cause Mortality for United States Jurisdictions</h5>
    <p>
        National Center for Health Statistics.
        <a href="https://wonder.cdc.gov/wonder/help/cmf.html" target="_blank"
            >Compressed Mortality Data</a> on CDC WONDER.<br />
        Available from: <a href="https://wonder.cdc.gov/mortSQL.html" target="_blank"
            >wonder.cdc.gov/mortSQL.html</a><br />
        1999-2016: <a href="https://wonder.cdc.gov/cmf-icd10.html" target="_blank"
            >wonder.cdc.gov/cmf-icd10.html</a><br />
        1979-1998: <a href="https://wonder.cdc.gov/cmf-icd9.html" target="_blank"
            >wonder.cdc.gov/cmf-icd9.html</a><br />
        1968-1978: <a href="https://wonder.cdc.gov/cmf-icd8.html" target="_blank"
            >wonder.cdc.gov/cmf-icd8.html</a>
    </p>
    <p><br /></p>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('raw-pop', $data)
    || $GLOBALS["CUST"]->hasDataSource('raw-mort', $data))
    <h5>1900-1967 — All-Cause Mortality for the United States as a Whole</h5>
    <p>
        National Center for Health Statistics. Leading Causes of Death, 1900-1998.<br />
        Available from:
        <a href="https://www.cdc.gov/nchs/data/dvs/lead1900_98.pdf"
            target="_blank" class="urlWrap"
            >cdc.gov/nchs/data/dvs/lead1900_98.pdf</a>
    </p>
    {!! $GLOBALS["SL"]->printAccordTxtLeft(
        $moreTxt,
        view('vendor.buckystats.inc-report-sources-us-pop-mort-1900-1967')->render()
    ) !!}
    <p><br /></p>

    <h5>1900-1967 — All-Cause Mortality for Maryland</h5>
    <p>
        Maryland Department of Health.
        <a href="https://health.maryland.gov/vsa/Pages/reports.aspx"
            target="_blank">Historical Trend Data</a>, Maryland, 1790 - 2018<br />
        Available from:
        <a href="https://health.maryland.gov/vsa/Documents/HistoricalTrend_2018.pdf"
            target="_blank" class="urlWrap"
            >health.maryland.gov/vsa/Documents/HistoricalTrend_2018.pdf</a>
    </p>
    <p><br /></p>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('life-expect', $data))
    <h5>1900-2018 — Life Expectancy for the United States as a Whole</h5>
    <p>
        National Center for Health Statistics. Health, United States, 2019:
        Table 4. Hyattsville, MD. 2021.<br />
        Life expectancy at birth (1900-2018), age 65 (1950-2018), and age 75 (1980-2018),
        selected years 1900–2018.<br />
        Available from:
        <a href="https://www.cdc.gov/nchs/hus/contents2019.htm"
            target="_blank" class="urlWrap"
            >cdc.gov/nchs/hus/contents2019.htm</a>
    </p>
    {!! $GLOBALS["SL"]->printAccordTxtLeft(
        $moreTxt,
        view('vendor.buckystats.inc-report-sources-us-pop-life-expect')->render()
    ) !!}
    <p><br /></p>
@endif

@if ($GLOBALS["CUST"]->hasDataSourceCat('covid', $data))
    <p><br /></p>
    <h4 class="slBlueDark">Government Policy Trackers</h4>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('covid', $data))
    <h5>2020 — Oxford Covid-19 Government Response Tracker (OxCGRT) United States Data</h5>
    <p>
        Oxford University. Blavatnik School of Government.
        <a href="https://raw.githubusercontent.com/OxCGRT/covid-policy-tracker/master/data/OxCGRT_latest.csv"
            target="_blank">Latest Data</a>.<br />
        Available from:
        <a href="https://github.com/OxCGRT/covid-policy-tracker"
            target="_blank" class="urlWrap"
            >github.com/OxCGRT/covid-policy-tracker</a><br />
        Data imported 3/1/21.
    </p>
    {!! $GLOBALS["SL"]->printAccordTxtLeft(
        $moreTxt,
        view('vendor.buckystats.inc-desc-covid-oxford-indexes')->render()
    ) !!}
    </p>
    <p><br /></p>
@endif


@if ($GLOBALS["CUST"]->hasDataSourceCat('econ', $data))
    <p><br /></p>
    <h4 class="slBlueDark">Economic Statistics</h4>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('unemploy', $data))
    <h5>1948-2020 — Unemployment Rate for the United States</h5>
    <p>
        U.S. Bureau of Labor Statistics. Labor Force Statistics from the Current Population Survey.<br />
        Series Id: LNS14000000, Seasonally Adjusted Unemployment Rate (16 years and over), 1948 - 2021.<br />
        Available from:
        <a href="https://data.bls.gov/timeseries/LNS14000000"
            target="_blank" class="urlWrap"
            >data.bls.gov/timeseries/LNS14000000</a>
    </p>
    <p><br /></p>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('cpi-u', $data))
    <h5>1913-2020 — Consumer Price Index for All Urban Consumers (CPI-U)</h5>
    <p>
        Bureau of Labor Statistics.
        <a href="https://www.bls.gov/cpi/tables/supplemental-files/home.htm"
            target="_blank">Historical CPI-U</a>, 1913 - 2021<br />
        U.S. city average, All items, Not Seasonally Adjusted, Index of "100" is defined by 1982-84<br />
        Available from:
        <a href="https://www.bls.gov/cpi/tables/supplemental-files/historical-cpi-u-202102.pdf"
            target="_blank" class="urlWrap"
            >bls.gov/cpi/tables/supplemental-files/historical-cpi-u-202102.pdf</a><br />
        Data updated February 2021.
    </p>
    {!! $GLOBALS["SL"]->printAccordTxtLeft(
        $moreTxt,
        view('vendor.buckystats.inc-report-sources-us-cpi-1913-2020')->render()
    ) !!}
    <p><br /></p>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('r-cpi-u-rs', $data))
    <h5>1977-2020 — Consumer Price Index Retroactive Series (R-CPI-U-RS)</h5>
    <p>
        Bureau of Labor Statistics.
        <a href="https://www.bls.gov/cpi/research-series/r-cpi-u-rs-home.htm"
            target="_blank" class="urlWrap"
            >R-CPI-U-RS 1978 - 2021</a><br />
        U.S. city average, All items, Not Seasonally Adjusted, Index of "100" is defined as December 1977<br />
        Available from:
        <a href="https://www.bls.gov/cpi/research-series/r-cpi-u-rs-allitems.xlsx" target="_blank"
            >bls.gov/cpi/research-series/r-cpi-u-rs-allitems.xlsx</a><br />
        Data updated February 2021.
    </p>
    {!! $GLOBALS["SL"]->printAccordTxtLeft(
        $moreTxt,
        view('vendor.buckystats.inc-report-sources-us-cpiurs-1977-2020')->render()
    ) !!}
    <p><br /></p>
@endif

@if ($GLOBALS["CUST"]->hasDataSource('debt-govt', $data))
    <h5>1900-2020 — Government Debt Outstanding for the United States</h5>
    <p>
        U.S. Department of the Treasury. Historical Debt Outstanding, 1789 - 2020<br />
        Available from:
        <a href="https://fiscaldata.treasury.gov/datasets/historical-debt-outstanding/historical-debt-outstanding"
            target="_blank"
            >fiscaldata.treasury.gov/datasets/historical-debt-outstanding/historical-debt-outstanding</a>
    </p>
    {!! $GLOBALS["SL"]->printAccordTxtLeft(
        $moreTxt,
        view('vendor.buckystats.inc-report-sources-us-debt-govt')->render()
    ) !!}
    <p><br /></p>
@endif

<p><br /></p>

