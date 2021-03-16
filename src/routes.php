<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use RockHopSoft\BuckyStats\Controllers\BuckyStats;

Route::middleware(['web'])->group(function () {

    Route::get('/multi/{country}/{state}/years', [BuckyStats::class, 'loadGraphPageVitalYears']);
    Route::get('/one/{country}/{state}/years',   [BuckyStats::class, 'loadGraphPageVitalYears']);
    Route::get('/one/{country}/years',           [BuckyStats::class, 'loadGraphPageVitalYearsUS']);

    Route::get('/multi/{country}/{state}/weeks', [BuckyStats::class, 'loadGraphPageVitalWeeks']);
    Route::get('/one/{country}/{state}/weeks',   [BuckyStats::class, 'loadGraphPageVitalWeeks']);
    Route::get('/one/{country}/weeks',           [BuckyStats::class, 'loadGraphPageVitalWeeksUS']);

    Route::get('/multi/{country}/{state}/weeks-for-years', [BuckyStats::class, 'loadGraphPageVitalWeeksYears']);
    Route::get('/one/{country}/{state}/weeks-for-years',   [BuckyStats::class, 'loadGraphPageVitalWeeksYears']);
    Route::get('/one/{country}/weeks-for-years',           [BuckyStats::class, 'loadGraphPageVitalWeeksYearsUS']);

    Route::get('/mutli/{country}/{state}/days', [BuckyStats::class, 'loadGraphPageVitalDays']);
    Route::get('/one/{country}/{state}/days',   [BuckyStats::class, 'loadGraphPageVitalDays']);
    Route::get('/one/{country}/days',           [BuckyStats::class, 'loadGraphPageVitalDaysUS']);

    Route::get('/multi/{country}/years',           [BuckyStats::class, 'loadGraphPageVitalYearsMulti']);
    Route::get('/multi/{country}/weeks',           [BuckyStats::class, 'loadGraphPageVitalWeeksMulti']);
    Route::get('/multi/{country}/weeks-for-years', [BuckyStats::class, 'loadGraphPageVitalWeeksYearsMulti']);
    Route::get('/multi/{country}/days',            [BuckyStats::class, 'loadGraphPageVitalDaysMulti']);


    Route::get('/all-states/{country}/years',           [BuckyStats::class, 'loadGraphsAllStatesYears']);
    Route::get('/all-states/{country}/weeks',           [BuckyStats::class, 'loadGraphsAllStatesWeeks']);
    Route::get('/all-states/{country}/weeks-for-years', [BuckyStats::class, 'loadGraphsAllStatesWeeksYears']);
    Route::get('/all-states/{country}/days',            [BuckyStats::class, 'loadGraphsAllStatesDays']);

    Route::get('/all-lines/{country}/{state}/years',           [BuckyStats::class, 'loadGraphsAllLinesYears']);
    Route::get('/all-lines/{country}/years',                   [BuckyStats::class, 'loadGraphsAllLinesYears']);

    Route::get('/all-lines/{country}/{state}/weeks',           [BuckyStats::class, 'loadGraphsAllLinesWeeks']);
    Route::get('/all-lines/{country}/weeks',                   [BuckyStats::class, 'loadGraphsAllLinesWeeks']);

    Route::get('/all-lines/{country}/{state}/weeks-for-years', [BuckyStats::class, 'loadGraphsAllLinesWeeksYears']);
    Route::get('/all-lines/{country}/weeks-for-years',         [BuckyStats::class, 'loadGraphsAllLinesWeeksYears']);

    Route::get('/all-lines/{country}/{state}/days',            [BuckyStats::class, 'loadGraphsAllLinesDays']);
    Route::get('/all-lines/{country}/days',                    [BuckyStats::class, 'loadGraphsAllLinesDays']);


});

?>