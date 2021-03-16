<?php 
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-gen-migration.blade.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuckyStatsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
    	Schema::create('bs_datasets', function(Blueprint $table)
		{
			$table->increments('dat_id');
			$table->string('dat_name')->nullable();
			$table->string('dat_slug')->nullable();
			$table->longText('dat_desc')->nullable();
			$table->string('dat_source_name')->nullable();
			$table->string('dat_source_url')->nullable();
			$table->longText('dat_source_raw_url')->nullable();
			$table->string('dat_documentation_url')->nullable();
			$table->date('dat_source_date_updated')->nullable();
			$table->longText('dat_disclaim')->nullable();
			$table->longText('dat_citation')->nullable();
			$table->longText('dat_notes_import')->nullable();
			$table->integer('dat_total_recs')->nullable();
			$table->integer('dat_data_table')->nullable();
			$table->string('dat_version_ab')->nullable();
			$table->integer('dat_submission_progress')->nullable();
			$table->string('dat_ip_addy')->nullable();
			$table->string('dat_tree_version')->nullable();
			$table->string('dat_unique_str')->nullable();
			$table->integer('dat_user_id')->nullable();
			$table->string('dat_is_mobile')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_mort_weekly_us', function(Blueprint $table)
		{
			$table->increments('mrt_week_us_id');
			$table->string('mrt_week_us_state')->nullable();
			$table->string('mrt_week_us_week')->nullable();
			$table->double('mrt_week_us_mortality')->nullable();
			$table->double('mrt_week_us_mort_perc')->nullable();
			$table->double('mrt_week_us_mort_std_dist_us')->nullable();
			$table->double('mrt_week_us_std_dist_us_avg_inc')->nullable();
			$table->double('mrt_week_us_perc_avg_inc')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_geographic_areas', function(Blueprint $table)
		{
			$table->increments('geo_area_id');
			$table->string('geo_area_country')->nullable();
			$table->string('geo_area_state')->nullable();
			$table->string('geo_area_county')->nullable();
			$table->string('geo_area_city')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_organizations', function(Blueprint $table)
		{
			$table->increments('org_id');
			$table->string('org_name')->nullable();
			$table->longText('org_desc')->nullable();
			$table->string('org_url')->nullable();
			$table->string('org_slug')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_dataset_tags', function(Blueprint $table)
		{
			$table->increments('tag_id');
			$table->string('tag_name')->nullable();
			$table->string('tag_slug')->nullable();
			$table->longText('tag_desc')->nullable();
			$table->integer('tag_total_recs')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_link_dataset_geo', function(Blueprint $table)
		{
			$table->increments('dat_geo_lnk_id');
			$table->integer('dat_geo_lnk_dataset_id')->unsigned()->nullable();
			$table->integer('dat_geo_lnk_geo_area_id')->unsigned()->nullable();
			$table->timestamps();
		});
		Schema::create('bs_link_dataset_orgs', function(Blueprint $table)
		{
			$table->increments('dat_org_lnk_id');
			$table->integer('dat_org_lnk_dataset_id')->unsigned()->nullable();
			$table->integer('dat_org_lnk_org_id')->unsigned()->nullable();
			$table->timestamps();
		});
		Schema::create('bs_link_dataset_tags', function(Blueprint $table)
		{
			$table->increments('dat_tag_lnk_id');
			$table->integer('dat_tag_lnk_dataset_id')->unsigned()->nullable();
			$table->integer('dat_tag_lnk_tag_id')->unsigned()->nullable();
			$table->timestamps();
		});
		Schema::create('bs_population_us', function(Blueprint $table)
		{
			$table->increments('us_pop_id');
			$table->string('us_pop_state')->nullable();
			$table->integer('us_pop_year')->nullable();
			$table->string('us_pop_population', 255)->nullable();
			$table->string('us_pop_25_years', 255)->nullable();
			$table->string('us_pop_25_44_years', 255)->nullable();
			$table->string('us_pop_45_64_years', 255)->nullable();
			$table->string('us_pop_65_74_years', 255)->nullable();
			$table->string('us_pop_75_84_years', 255)->nullable();
			$table->string('us_pop_85_years', 255)->nullable();
			$table->integer('us_pop_age_unknown')->nullable();
			$table->string('us_pop_mortality', 255)->nullable();
			$table->string('us_pop_mort_25_years', 255)->nullable();
			$table->string('us_pop_mort_25_44_years', 255)->nullable();
			$table->string('us_pop_mort_45_64_years', 255)->nullable();
			$table->string('us_pop_mort_65_74_years', 255)->nullable();
			$table->string('us_pop_mort_75_84_years', 255)->nullable();
			$table->string('us_pop_mort_85_years', 255)->nullable();
			$table->integer('us_pop_mort_age_unknown')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_population_dist', function(Blueprint $table)
		{
			$table->increments('pop_dist_id');
			$table->integer('pop_dist_geo_area_id')->unsigned()->nullable();
			$table->integer('pop_dist_year')->nullable();
			$table->string('pop_dist_source_url')->nullable();
			$table->string('pop_dist_source_url2')->nullable();
			$table->integer('pop_dist_total')->nullable();
			$table->integer('pop_dist_gender_female')->nullable();
			$table->integer('pop_dist_gender_male')->nullable();
			$table->integer('pop_dist_age04')->nullable();
			$table->integer('pop_dist_age59')->nullable();
			$table->integer('pop_dist_age1014')->nullable();
			$table->integer('pop_dist_age1519')->nullable();
			$table->integer('pop_dist_age2024')->nullable();
			$table->integer('pop_dist_age2534')->nullable();
			$table->integer('pop_dist_age3544')->nullable();
			$table->integer('pop_dist_age4554')->nullable();
			$table->integer('pop_dist_age5559')->nullable();
			$table->integer('pop_dist_age6064')->nullable();
			$table->integer('pop_dist_age6574')->nullable();
			$table->integer('pop_dist_age7584')->nullable();
			$table->integer('pop_dist_age85')->nullable();
			$table->double('pop_dist_perc_gender_female')->nullable();
			$table->double('pop_dist_perc_gender_male')->nullable();
			$table->double('pop_dist_perc_age04')->nullable();
			$table->double('pop_dist_perc_age59')->nullable();
			$table->double('pop_dist_perc_age1014')->nullable();
			$table->double('pop_dist_perc_age1519')->nullable();
			$table->double('pop_dist_perc_age2024')->nullable();
			$table->double('pop_dist_perc_age2534')->nullable();
			$table->double('pop_dist_perc_age3544')->nullable();
			$table->double('pop_dist_perc_age4554')->nullable();
			$table->double('pop_dist_perc_age5559')->nullable();
			$table->double('pop_dist_perc_age6064')->nullable();
			$table->double('pop_dist_perc_age6574')->nullable();
			$table->double('pop_dist_perc_age7584')->nullable();
			$table->double('pop_dist_perc_age85')->nullable();
			$table->string('pop_dist_name')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_cdc_weekly_deaths_by_age_2015_2020_unweighted', function(Blueprint $table)
		{
			$table->increments('cdc_mort_age_15_20_id');
			$table->string('cdc_mort_age_15_20_week_ending_date', 255)->nullable();
			$table->string('cdc_mort_age_15_20_state_abbreviation', 255)->nullable();
			$table->integer('cdc_mort_age_15_20_year')->nullable();
			$table->integer('cdc_mort_age_15_20_week')->nullable();
			$table->string('cdc_mort_age_15_20_age_group', 255)->nullable();
			$table->integer('cdc_mort_age_15_20_number_of_deaths')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_cdc_weekly_deaths_by_age_2015_2020_weighted', function(Blueprint $table)
		{
			$table->increments('cdc_mort_age_15_20_id');
			$table->string('cdc_mort_age_15_20_week_ending_date', 255)->nullable();
			$table->string('cdc_mort_age_15_20_state_abbreviation', 255)->nullable();
			$table->integer('cdc_mort_age_15_20_year')->nullable();
			$table->integer('cdc_mort_age_15_20_week')->nullable();
			$table->string('cdc_mort_age_15_20_age_group', 255)->nullable();
			$table->integer('cdc_mort_age_15_20_number_of_deaths')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_cdc_mort_by_age_group_1999_2016', function(Blueprint $table)
		{
			$table->increments('cdc_mort_age_99_16_id');
			$table->string('cdc_mort_age_99_16_state', 255)->nullable();
			$table->integer('cdc_mort_age_99_16_state_code')->nullable();
			$table->string('cdc_mort_age_99_16_age_group', 255)->nullable();
			$table->string('cdc_mort_age_99_16_age_group_code', 255)->nullable();
			$table->integer('cdc_mort_age_99_16_year')->nullable();
			$table->integer('cdc_mort_age_99_16_year_code')->nullable();
			$table->integer('cdc_mort_age_99_16_deaths')->nullable();
			$table->string('cdc_mort_age_99_16_population', 255)->nullable();
			$table->string('cdc_mort_age_99_16_crude_rate', 255)->nullable();
			$table->timestamps();
		});
		Schema::create('bs_cdc_mort_by_age_group_1979_1998', function(Blueprint $table)
		{
			$table->increments('cdc_mort_age_79_98_id');
			$table->string('cdc_mort_age_79_98_state', 255)->nullable();
			$table->integer('cdc_mort_age_79_98_state_code')->nullable();
			$table->integer('cdc_mort_age_79_98_year')->nullable();
			$table->integer('cdc_mort_age_79_98_year_code')->nullable();
			$table->string('cdc_mort_age_79_98_age_group', 255)->nullable();
			$table->string('cdc_mort_age_79_98_age_group_code', 255)->nullable();
			$table->integer('cdc_mort_age_79_98_deaths')->nullable();
			$table->string('cdc_mort_age_79_98_population', 255)->nullable();
			$table->string('cdc_mort_age_79_98_crude_rate', 255)->nullable();
			$table->timestamps();
		});
		Schema::create('bs_cdc_mort_by_age_group_1968_1978', function(Blueprint $table)
		{
			$table->increments('cdc_mort_age_68_78_id');
			$table->string('cdc_mort_age_68_78_state', 255)->nullable();
			$table->integer('cdc_mort_age_68_78_state_code')->nullable();
			$table->integer('cdc_mort_age_68_78_year')->nullable();
			$table->integer('cdc_mort_age_68_78_year_code')->nullable();
			$table->string('cdc_mort_age_68_78_age_group', 255)->nullable();
			$table->string('cdc_mort_age_68_78_age_group_code', 255)->nullable();
			$table->integer('cdc_mort_age_68_78_deaths')->nullable();
			$table->string('cdc_mort_age_68_78_population', 255)->nullable();
			$table->string('cdc_mort_age_68_78_crude_rate', 255)->nullable();
			$table->timestamps();
		});
		Schema::create('bs_population_us_1900', function(Blueprint $table)
		{
			$table->increments('us_pop_1900_id');
			$table->integer('us_pop_1900_year')->nullable();
			$table->integer('us_pop_1900_population')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_population_md_1790', function(Blueprint $table)
		{
			$table->increments('pop_md_id');
			$table->integer('pop_md_year')->nullable();
			$table->integer('pop_md_population')->nullable();
			$table->string('pop_md_mortality', 255)->nullable();
			$table->timestamps();
		});
		Schema::create('bs_population_us_mort_1900', function(Blueprint $table)
		{
			$table->increments('us_mort_1900_id');
			$table->integer('us_mort_1900_year')->nullable();
			$table->integer('us_mort_1900_deaths_estimate')->nullable();
			$table->double('us_mort_1900_death_rates_per_1000')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_oxford_stringency_index', function(Blueprint $table)
		{
			$table->increments('oxf_strg_id');
			$table->string('oxf_strg_country_code', 255)->nullable();
			$table->string('oxf_strg_country_name', 255)->nullable();
			$table->double('oxf_strg_01jan2020')->nullable();
			$table->double('oxf_strg_02jan2020')->nullable();
			$table->double('oxf_strg_03jan2020')->nullable();
			$table->double('oxf_strg_04jan2020')->nullable();
			$table->double('oxf_strg_05jan2020')->nullable();
			$table->double('oxf_strg_06jan2020')->nullable();
			$table->double('oxf_strg_07jan2020')->nullable();
			$table->double('oxf_strg_08jan2020')->nullable();
			$table->double('oxf_strg_09jan2020')->nullable();
			$table->double('oxf_strg_10jan2020')->nullable();
			$table->double('oxf_strg_11jan2020')->nullable();
			$table->double('oxf_strg_12jan2020')->nullable();
			$table->double('oxf_strg_13jan2020')->nullable();
			$table->double('oxf_strg_14jan2020')->nullable();
			$table->double('oxf_strg_15jan2020')->nullable();
			$table->double('oxf_strg_16jan2020')->nullable();
			$table->double('oxf_strg_17jan2020')->nullable();
			$table->double('oxf_strg_18jan2020')->nullable();
			$table->double('oxf_strg_19jan2020')->nullable();
			$table->double('oxf_strg_20jan2020')->nullable();
			$table->double('oxf_strg_21jan2020')->nullable();
			$table->double('oxf_strg_22jan2020')->nullable();
			$table->double('oxf_strg_23jan2020')->nullable();
			$table->double('oxf_strg_24jan2020')->nullable();
			$table->double('oxf_strg_25jan2020')->nullable();
			$table->double('oxf_strg_26jan2020')->nullable();
			$table->double('oxf_strg_27jan2020')->nullable();
			$table->double('oxf_strg_28jan2020')->nullable();
			$table->double('oxf_strg_29jan2020')->nullable();
			$table->double('oxf_strg_30jan2020')->nullable();
			$table->double('oxf_strg_31jan2020')->nullable();
			$table->double('oxf_strg_01feb2020')->nullable();
			$table->double('oxf_strg_02feb2020')->nullable();
			$table->double('oxf_strg_03feb2020')->nullable();
			$table->double('oxf_strg_04feb2020')->nullable();
			$table->double('oxf_strg_05feb2020')->nullable();
			$table->double('oxf_strg_06feb2020')->nullable();
			$table->double('oxf_strg_07feb2020')->nullable();
			$table->double('oxf_strg_08feb2020')->nullable();
			$table->double('oxf_strg_09feb2020')->nullable();
			$table->double('oxf_strg_10feb2020')->nullable();
			$table->double('oxf_strg_11feb2020')->nullable();
			$table->double('oxf_strg_12feb2020')->nullable();
			$table->double('oxf_strg_13feb2020')->nullable();
			$table->double('oxf_strg_14feb2020')->nullable();
			$table->double('oxf_strg_15feb2020')->nullable();
			$table->double('oxf_strg_16feb2020')->nullable();
			$table->double('oxf_strg_17feb2020')->nullable();
			$table->double('oxf_strg_18feb2020')->nullable();
			$table->double('oxf_strg_19feb2020')->nullable();
			$table->double('oxf_strg_20feb2020')->nullable();
			$table->double('oxf_strg_21feb2020')->nullable();
			$table->double('oxf_strg_22feb2020')->nullable();
			$table->double('oxf_strg_23feb2020')->nullable();
			$table->double('oxf_strg_24feb2020')->nullable();
			$table->double('oxf_strg_25feb2020')->nullable();
			$table->double('oxf_strg_26feb2020')->nullable();
			$table->double('oxf_strg_27feb2020')->nullable();
			$table->double('oxf_strg_28feb2020')->nullable();
			$table->double('oxf_strg_29feb2020')->nullable();
			$table->double('oxf_strg_01mar2020')->nullable();
			$table->double('oxf_strg_02mar2020')->nullable();
			$table->double('oxf_strg_03mar2020')->nullable();
			$table->double('oxf_strg_04mar2020')->nullable();
			$table->double('oxf_strg_05mar2020')->nullable();
			$table->double('oxf_strg_06mar2020')->nullable();
			$table->double('oxf_strg_07mar2020')->nullable();
			$table->double('oxf_strg_08mar2020')->nullable();
			$table->double('oxf_strg_09mar2020')->nullable();
			$table->double('oxf_strg_10mar2020')->nullable();
			$table->double('oxf_strg_11mar2020')->nullable();
			$table->double('oxf_strg_12mar2020')->nullable();
			$table->double('oxf_strg_13mar2020')->nullable();
			$table->double('oxf_strg_14mar2020')->nullable();
			$table->double('oxf_strg_15mar2020')->nullable();
			$table->double('oxf_strg_16mar2020')->nullable();
			$table->double('oxf_strg_17mar2020')->nullable();
			$table->double('oxf_strg_18mar2020')->nullable();
			$table->double('oxf_strg_19mar2020')->nullable();
			$table->double('oxf_strg_20mar2020')->nullable();
			$table->double('oxf_strg_21mar2020')->nullable();
			$table->double('oxf_strg_22mar2020')->nullable();
			$table->double('oxf_strg_23mar2020')->nullable();
			$table->double('oxf_strg_24mar2020')->nullable();
			$table->double('oxf_strg_25mar2020')->nullable();
			$table->double('oxf_strg_26mar2020')->nullable();
			$table->double('oxf_strg_27mar2020')->nullable();
			$table->double('oxf_strg_28mar2020')->nullable();
			$table->double('oxf_strg_29mar2020')->nullable();
			$table->double('oxf_strg_30mar2020')->nullable();
			$table->double('oxf_strg_31mar2020')->nullable();
			$table->double('oxf_strg_01apr2020')->nullable();
			$table->double('oxf_strg_02apr2020')->nullable();
			$table->double('oxf_strg_03apr2020')->nullable();
			$table->double('oxf_strg_04apr2020')->nullable();
			$table->double('oxf_strg_05apr2020')->nullable();
			$table->double('oxf_strg_06apr2020')->nullable();
			$table->double('oxf_strg_07apr2020')->nullable();
			$table->double('oxf_strg_08apr2020')->nullable();
			$table->double('oxf_strg_09apr2020')->nullable();
			$table->double('oxf_strg_10apr2020')->nullable();
			$table->double('oxf_strg_11apr2020')->nullable();
			$table->double('oxf_strg_12apr2020')->nullable();
			$table->double('oxf_strg_13apr2020')->nullable();
			$table->double('oxf_strg_14apr2020')->nullable();
			$table->double('oxf_strg_15apr2020')->nullable();
			$table->double('oxf_strg_16apr2020')->nullable();
			$table->double('oxf_strg_17apr2020')->nullable();
			$table->double('oxf_strg_18apr2020')->nullable();
			$table->double('oxf_strg_19apr2020')->nullable();
			$table->double('oxf_strg_20apr2020')->nullable();
			$table->double('oxf_strg_21apr2020')->nullable();
			$table->double('oxf_strg_22apr2020')->nullable();
			$table->double('oxf_strg_23apr2020')->nullable();
			$table->double('oxf_strg_24apr2020')->nullable();
			$table->double('oxf_strg_25apr2020')->nullable();
			$table->double('oxf_strg_26apr2020')->nullable();
			$table->double('oxf_strg_27apr2020')->nullable();
			$table->double('oxf_strg_28apr2020')->nullable();
			$table->double('oxf_strg_29apr2020')->nullable();
			$table->double('oxf_strg_30apr2020')->nullable();
			$table->double('oxf_strg_01may2020')->nullable();
			$table->double('oxf_strg_02may2020')->nullable();
			$table->double('oxf_strg_03may2020')->nullable();
			$table->double('oxf_strg_04may2020')->nullable();
			$table->double('oxf_strg_05may2020')->nullable();
			$table->double('oxf_strg_06may2020')->nullable();
			$table->double('oxf_strg_07may2020')->nullable();
			$table->double('oxf_strg_08may2020')->nullable();
			$table->double('oxf_strg_09may2020')->nullable();
			$table->double('oxf_strg_10may2020')->nullable();
			$table->double('oxf_strg_11may2020')->nullable();
			$table->double('oxf_strg_12may2020')->nullable();
			$table->double('oxf_strg_13may2020')->nullable();
			$table->double('oxf_strg_14may2020')->nullable();
			$table->double('oxf_strg_15may2020')->nullable();
			$table->double('oxf_strg_16may2020')->nullable();
			$table->double('oxf_strg_17may2020')->nullable();
			$table->double('oxf_strg_18may2020')->nullable();
			$table->double('oxf_strg_19may2020')->nullable();
			$table->double('oxf_strg_20may2020')->nullable();
			$table->double('oxf_strg_21may2020')->nullable();
			$table->double('oxf_strg_22may2020')->nullable();
			$table->double('oxf_strg_23may2020')->nullable();
			$table->double('oxf_strg_24may2020')->nullable();
			$table->double('oxf_strg_25may2020')->nullable();
			$table->double('oxf_strg_26may2020')->nullable();
			$table->double('oxf_strg_27may2020')->nullable();
			$table->double('oxf_strg_28may2020')->nullable();
			$table->double('oxf_strg_29may2020')->nullable();
			$table->double('oxf_strg_30may2020')->nullable();
			$table->double('oxf_strg_31may2020')->nullable();
			$table->double('oxf_strg_01jun2020')->nullable();
			$table->double('oxf_strg_02jun2020')->nullable();
			$table->double('oxf_strg_03jun2020')->nullable();
			$table->double('oxf_strg_04jun2020')->nullable();
			$table->double('oxf_strg_05jun2020')->nullable();
			$table->double('oxf_strg_06jun2020')->nullable();
			$table->double('oxf_strg_07jun2020')->nullable();
			$table->double('oxf_strg_08jun2020')->nullable();
			$table->double('oxf_strg_09jun2020')->nullable();
			$table->double('oxf_strg_10jun2020')->nullable();
			$table->double('oxf_strg_11jun2020')->nullable();
			$table->double('oxf_strg_12jun2020')->nullable();
			$table->double('oxf_strg_13jun2020')->nullable();
			$table->double('oxf_strg_14jun2020')->nullable();
			$table->double('oxf_strg_15jun2020')->nullable();
			$table->double('oxf_strg_16jun2020')->nullable();
			$table->double('oxf_strg_17jun2020')->nullable();
			$table->double('oxf_strg_18jun2020')->nullable();
			$table->double('oxf_strg_19jun2020')->nullable();
			$table->double('oxf_strg_20jun2020')->nullable();
			$table->double('oxf_strg_21jun2020')->nullable();
			$table->double('oxf_strg_22jun2020')->nullable();
			$table->double('oxf_strg_23jun2020')->nullable();
			$table->double('oxf_strg_24jun2020')->nullable();
			$table->double('oxf_strg_25jun2020')->nullable();
			$table->double('oxf_strg_26jun2020')->nullable();
			$table->double('oxf_strg_27jun2020')->nullable();
			$table->double('oxf_strg_28jun2020')->nullable();
			$table->double('oxf_strg_29jun2020')->nullable();
			$table->double('oxf_strg_30jun2020')->nullable();
			$table->double('oxf_strg_01jul2020')->nullable();
			$table->double('oxf_strg_02jul2020')->nullable();
			$table->double('oxf_strg_03jul2020')->nullable();
			$table->double('oxf_strg_04jul2020')->nullable();
			$table->double('oxf_strg_05jul2020')->nullable();
			$table->double('oxf_strg_06jul2020')->nullable();
			$table->double('oxf_strg_07jul2020')->nullable();
			$table->double('oxf_strg_08jul2020')->nullable();
			$table->double('oxf_strg_09jul2020')->nullable();
			$table->double('oxf_strg_10jul2020')->nullable();
			$table->double('oxf_strg_11jul2020')->nullable();
			$table->double('oxf_strg_12jul2020')->nullable();
			$table->double('oxf_strg_13jul2020')->nullable();
			$table->double('oxf_strg_14jul2020')->nullable();
			$table->double('oxf_strg_15jul2020')->nullable();
			$table->double('oxf_strg_16jul2020')->nullable();
			$table->double('oxf_strg_17jul2020')->nullable();
			$table->double('oxf_strg_18jul2020')->nullable();
			$table->double('oxf_strg_19jul2020')->nullable();
			$table->double('oxf_strg_20jul2020')->nullable();
			$table->double('oxf_strg_21jul2020')->nullable();
			$table->double('oxf_strg_22jul2020')->nullable();
			$table->double('oxf_strg_23jul2020')->nullable();
			$table->double('oxf_strg_24jul2020')->nullable();
			$table->double('oxf_strg_25jul2020')->nullable();
			$table->double('oxf_strg_26jul2020')->nullable();
			$table->double('oxf_strg_27jul2020')->nullable();
			$table->double('oxf_strg_28jul2020')->nullable();
			$table->double('oxf_strg_29jul2020')->nullable();
			$table->double('oxf_strg_30jul2020')->nullable();
			$table->double('oxf_strg_31jul2020')->nullable();
			$table->double('oxf_strg_01aug2020')->nullable();
			$table->double('oxf_strg_02aug2020')->nullable();
			$table->double('oxf_strg_03aug2020')->nullable();
			$table->double('oxf_strg_04aug2020')->nullable();
			$table->double('oxf_strg_05aug2020')->nullable();
			$table->double('oxf_strg_06aug2020')->nullable();
			$table->double('oxf_strg_07aug2020')->nullable();
			$table->double('oxf_strg_08aug2020')->nullable();
			$table->double('oxf_strg_09aug2020')->nullable();
			$table->double('oxf_strg_10aug2020')->nullable();
			$table->double('oxf_strg_11aug2020')->nullable();
			$table->double('oxf_strg_12aug2020')->nullable();
			$table->double('oxf_strg_13aug2020')->nullable();
			$table->double('oxf_strg_14aug2020')->nullable();
			$table->double('oxf_strg_15aug2020')->nullable();
			$table->double('oxf_strg_16aug2020')->nullable();
			$table->double('oxf_strg_17aug2020')->nullable();
			$table->double('oxf_strg_18aug2020')->nullable();
			$table->double('oxf_strg_19aug2020')->nullable();
			$table->double('oxf_strg_20aug2020')->nullable();
			$table->double('oxf_strg_21aug2020')->nullable();
			$table->double('oxf_strg_22aug2020')->nullable();
			$table->double('oxf_strg_23aug2020')->nullable();
			$table->double('oxf_strg_24aug2020')->nullable();
			$table->double('oxf_strg_25aug2020')->nullable();
			$table->double('oxf_strg_26aug2020')->nullable();
			$table->double('oxf_strg_27aug2020')->nullable();
			$table->double('oxf_strg_28aug2020')->nullable();
			$table->double('oxf_strg_29aug2020')->nullable();
			$table->double('oxf_strg_30aug2020')->nullable();
			$table->double('oxf_strg_31aug2020')->nullable();
			$table->double('oxf_strg_01sep2020')->nullable();
			$table->double('oxf_strg_02sep2020')->nullable();
			$table->double('oxf_strg_03sep2020')->nullable();
			$table->double('oxf_strg_04sep2020')->nullable();
			$table->double('oxf_strg_05sep2020')->nullable();
			$table->double('oxf_strg_06sep2020')->nullable();
			$table->double('oxf_strg_07sep2020')->nullable();
			$table->double('oxf_strg_08sep2020')->nullable();
			$table->double('oxf_strg_09sep2020')->nullable();
			$table->double('oxf_strg_10sep2020')->nullable();
			$table->double('oxf_strg_11sep2020')->nullable();
			$table->double('oxf_strg_12sep2020')->nullable();
			$table->double('oxf_strg_13sep2020')->nullable();
			$table->double('oxf_strg_14sep2020')->nullable();
			$table->double('oxf_strg_15sep2020')->nullable();
			$table->double('oxf_strg_16sep2020')->nullable();
			$table->double('oxf_strg_17sep2020')->nullable();
			$table->double('oxf_strg_18sep2020')->nullable();
			$table->double('oxf_strg_19sep2020')->nullable();
			$table->double('oxf_strg_20sep2020')->nullable();
			$table->double('oxf_strg_21sep2020')->nullable();
			$table->double('oxf_strg_22sep2020')->nullable();
			$table->double('oxf_strg_23sep2020')->nullable();
			$table->double('oxf_strg_24sep2020')->nullable();
			$table->double('oxf_strg_25sep2020')->nullable();
			$table->double('oxf_strg_26sep2020')->nullable();
			$table->double('oxf_strg_27sep2020')->nullable();
			$table->double('oxf_strg_28sep2020')->nullable();
			$table->double('oxf_strg_29sep2020')->nullable();
			$table->double('oxf_strg_30sep2020')->nullable();
			$table->double('oxf_strg_01oct2020')->nullable();
			$table->double('oxf_strg_02oct2020')->nullable();
			$table->double('oxf_strg_03oct2020')->nullable();
			$table->double('oxf_strg_04oct2020')->nullable();
			$table->double('oxf_strg_05oct2020')->nullable();
			$table->double('oxf_strg_06oct2020')->nullable();
			$table->double('oxf_strg_07oct2020')->nullable();
			$table->double('oxf_strg_08oct2020')->nullable();
			$table->double('oxf_strg_09oct2020')->nullable();
			$table->double('oxf_strg_10oct2020')->nullable();
			$table->double('oxf_strg_11oct2020')->nullable();
			$table->double('oxf_strg_12oct2020')->nullable();
			$table->double('oxf_strg_13oct2020')->nullable();
			$table->double('oxf_strg_14oct2020')->nullable();
			$table->double('oxf_strg_15oct2020')->nullable();
			$table->double('oxf_strg_16oct2020')->nullable();
			$table->double('oxf_strg_17oct2020')->nullable();
			$table->double('oxf_strg_18oct2020')->nullable();
			$table->double('oxf_strg_19oct2020')->nullable();
			$table->double('oxf_strg_20oct2020')->nullable();
			$table->double('oxf_strg_21oct2020')->nullable();
			$table->double('oxf_strg_22oct2020')->nullable();
			$table->double('oxf_strg_23oct2020')->nullable();
			$table->double('oxf_strg_24oct2020')->nullable();
			$table->double('oxf_strg_25oct2020')->nullable();
			$table->double('oxf_strg_26oct2020')->nullable();
			$table->double('oxf_strg_27oct2020')->nullable();
			$table->double('oxf_strg_28oct2020')->nullable();
			$table->double('oxf_strg_29oct2020')->nullable();
			$table->double('oxf_strg_30oct2020')->nullable();
			$table->double('oxf_strg_31oct2020')->nullable();
			$table->double('oxf_strg_01nov2020')->nullable();
			$table->double('oxf_strg_02nov2020')->nullable();
			$table->double('oxf_strg_03nov2020')->nullable();
			$table->double('oxf_strg_04nov2020')->nullable();
			$table->double('oxf_strg_05nov2020')->nullable();
			$table->double('oxf_strg_06nov2020')->nullable();
			$table->double('oxf_strg_07nov2020')->nullable();
			$table->double('oxf_strg_08nov2020')->nullable();
			$table->double('oxf_strg_09nov2020')->nullable();
			$table->double('oxf_strg_10nov2020')->nullable();
			$table->double('oxf_strg_11nov2020')->nullable();
			$table->double('oxf_strg_12nov2020')->nullable();
			$table->double('oxf_strg_13nov2020')->nullable();
			$table->double('oxf_strg_14nov2020')->nullable();
			$table->double('oxf_strg_15nov2020')->nullable();
			$table->double('oxf_strg_16nov2020')->nullable();
			$table->double('oxf_strg_17nov2020')->nullable();
			$table->double('oxf_strg_18nov2020')->nullable();
			$table->double('oxf_strg_19nov2020')->nullable();
			$table->double('oxf_strg_20nov2020')->nullable();
			$table->double('oxf_strg_21nov2020')->nullable();
			$table->double('oxf_strg_22nov2020')->nullable();
			$table->double('oxf_strg_23nov2020')->nullable();
			$table->double('oxf_strg_24nov2020')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_labor_monthly_us', function(Blueprint $table)
		{
			$table->increments('lab_mon_us_id');
			$table->string('lab_mon_us_year_month', 255)->nullable();
			$table->double('lab_mon_us_unemployment_rate')->nullable();
			$table->timestamps();
		});
		Schema::create('bs_bs_labor_monthly_us', function(Blueprint $table)
		{
			$table->increments('lab_mon_us_id');
			$table->integer('lab_mon_us_year')->nullable();
			$table->double('lab_mon_us_jan')->nullable();
			$table->double('lab_mon_us_feb')->nullable();
			$table->string('lab_mon_us_mar', 255)->nullable();
			$table->string('lab_mon_us_apr', 255)->nullable();
			$table->string('lab_mon_us_may', 255)->nullable();
			$table->string('lab_mon_us_jun', 255)->nullable();
			$table->string('lab_mon_us_jul', 255)->nullable();
			$table->string('lab_mon_us_aug', 255)->nullable();
			$table->string('lab_mon_us_sep', 255)->nullable();
			$table->string('lab_mon_us_oct', 255)->nullable();
			$table->string('lab_mon_us_nov', 255)->nullable();
			$table->double('lab_mon_us_dec')->nullable();
			$table->timestamps();
		});
	
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
    	Schema::drop('bs_datasets');
		Schema::drop('bs_mort_weekly_us');
		Schema::drop('bs_geographic_areas');
		Schema::drop('bs_organizations');
		Schema::drop('bs_dataset_tags');
		Schema::drop('bs_link_dataset_geo');
		Schema::drop('bs_link_dataset_orgs');
		Schema::drop('bs_link_dataset_tags');
		Schema::drop('bs_population_us');
		Schema::drop('bs_population_dist');
		Schema::drop('bs_cdc_weekly_deaths_by_age_2015_2020_unweighted');
		Schema::drop('bs_cdc_weekly_deaths_by_age_2015_2020_weighted');
		Schema::drop('bs_cdc_mort_by_age_group_1999_2016');
		Schema::drop('bs_cdc_mort_by_age_group_1979_1998');
		Schema::drop('bs_cdc_mort_by_age_group_1968_1978');
		Schema::drop('bs_population_us_1900');
		Schema::drop('bs_population_md_1790');
		Schema::drop('bs_population_us_mort_1900');
		Schema::drop('bs_oxford_stringency_index');
		Schema::drop('bs_labor_monthly_us');
		Schema::drop('bs_bs_labor_monthly_us');
	
    }
}
