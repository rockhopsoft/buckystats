<?php
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-gen-seeder.blade.php

namespace Database\Seeders;

use Auth;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BuckyStatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {

	DB::table('sl_databases')->insert([
			'db_id' => 1,
			'db_user' => '1',
			'db_prefix' => 'bs_',
			'db_name' => 'Bucky Stats',
			'db_desc' => 'All Our Data Are Belong',
			'db_mission' => 'Empower your complex databases...',
			'db_tables' => '22',
			'db_fields' => '507'
		]);

	DB::table('sl_tables')->insert([
			'tbl_id' => 54,
			'tbl_database' => '1',
			'tbl_name' => 'users',
			'tbl_eng' => 'Users',
			'tbl_desc' => 'This represents the Laravel Users table, but will not actually be implemented by Survloop as part of the database installation.',
			'tbl_group' => 'Internal',
			'tbl_ord' => '14'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 55,
			'tbl_database' => '1',
			'tbl_abbr' => 'dat_',
			'tbl_name' => 'datasets',
			'tbl_eng' => 'Datasets',
			'tbl_desc' => 'All of the datasets collected by this website.',
			'tbl_group' => 'Dataset Collections',
			'tbl_num_fields' => '20',
			'tbl_num_foreign_in' => '3'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 56,
			'tbl_database' => '1',
			'tbl_abbr' => 'dat_tag_lnk_',
			'tbl_name' => 'link_dataset_tags',
			'tbl_eng' => 'Link Dataset Tags',
			'tbl_desc' => 'Stores tags for each dataset, so their disciplines can overlap.',
			'tbl_type' => 'Linking',
			'tbl_group' => 'Dataset Collections',
			'tbl_ord' => '6',
			'tbl_num_fields' => '2',
			'tbl_num_foreign_keys' => '2'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 57,
			'tbl_database' => '1',
			'tbl_abbr' => 'tag_',
			'tbl_name' => 'dataset_tags',
			'tbl_eng' => 'Dataset Tags',
			'tbl_desc' => 'Tracks the categories being tagged on different datasets.',
			'tbl_type' => 'Subset',
			'tbl_group' => 'Dataset Collections',
			'tbl_ord' => '3',
			'tbl_num_fields' => '4',
			'tbl_num_foreign_in' => '1'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 58,
			'tbl_database' => '1',
			'tbl_abbr' => 'org_',
			'tbl_name' => 'organizations',
			'tbl_eng' => 'Organizations',
			'tbl_desc' => 'Each record tracks an organization which may be associated with a dataset.',
			'tbl_group' => 'Dataset Collections',
			'tbl_ord' => '2',
			'tbl_num_fields' => '4',
			'tbl_num_foreign_in' => '1'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 59,
			'tbl_database' => '1',
			'tbl_abbr' => 'dat_org_lnk_',
			'tbl_name' => 'link_dataset_orgs',
			'tbl_eng' => 'Link Dataset Organizations',
			'tbl_desc' => 'Stores organizational tags for each dataset, so their disciplines can overlap.',
			'tbl_type' => 'Linking',
			'tbl_group' => 'Dataset Collections',
			'tbl_ord' => '5',
			'tbl_num_fields' => '2',
			'tbl_num_foreign_keys' => '2'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 60,
			'tbl_database' => '1',
			'tbl_abbr' => 'geo_area_',
			'tbl_name' => 'geographic_areas',
			'tbl_eng' => 'Geographic Areas',
			'tbl_desc' => 'Each record represents a jurisdictions to be linked to various datasets.',
			'tbl_group' => 'Dataset Collections',
			'tbl_ord' => '1',
			'tbl_num_fields' => '4',
			'tbl_num_foreign_in' => '2'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 61,
			'tbl_database' => '1',
			'tbl_abbr' => 'dat_geo_lnk_',
			'tbl_name' => 'link_dataset_geo',
			'tbl_eng' => 'Link Dataset Geographical Areas',
			'tbl_desc' => 'Stores geographical areas related to each dataset.',
			'tbl_type' => 'Linking',
			'tbl_group' => 'Dataset Collections',
			'tbl_ord' => '4',
			'tbl_num_fields' => '2',
			'tbl_num_foreign_keys' => '2'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 63,
			'tbl_database' => '1',
			'tbl_abbr' => 'us_pop_',
			'tbl_name' => 'population_us',
			'tbl_eng' => 'United States Population & Vital Statistics',
			'tbl_group' => 'Vital Statistics',
			'tbl_ord' => '7',
			'tbl_num_fields' => '18'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 64,
			'tbl_database' => '1',
			'tbl_abbr' => 'cdc_mort_age_99_16_',
			'tbl_name' => 'cdc_mort_by_age_group_1999_2016',
			'tbl_eng' => 'CDC Compressed Mortality by Age Group, 1999-2016',
			'tbl_group' => 'Vital Statistics',
			'tbl_ord' => '11',
			'tbl_num_fields' => '9'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 65,
			'tbl_database' => '1',
			'tbl_abbr' => 'cdc_mort_age_79_98_',
			'tbl_name' => 'cdc_mort_by_age_group_1979_1998',
			'tbl_eng' => 'CDC Compressed Mortality by Age Group, 1979-1998',
			'tbl_group' => 'Vital Statistics',
			'tbl_ord' => '12',
			'tbl_num_fields' => '9'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 66,
			'tbl_database' => '1',
			'tbl_abbr' => 'cdc_mort_age_68_78_',
			'tbl_name' => 'cdc_mort_by_age_group_1968_1978',
			'tbl_eng' => 'CDC Compressed Mortality by Age Group, 1968-1978',
			'tbl_group' => 'Vital Statistics',
			'tbl_ord' => '13',
			'tbl_num_fields' => '9'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 68,
			'tbl_database' => '1',
			'tbl_abbr' => 'cdc_mort_age_15_20_',
			'tbl_name' => 'cdc_weekly_deaths_by_age_2015_2020_unweighted',
			'tbl_eng' => 'CDC Weekly Deaths by State and Age, 2015-2020 Unweighted',
			'tbl_group' => 'Vital Statistics',
			'tbl_ord' => '9',
			'tbl_num_fields' => '6'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 69,
			'tbl_database' => '1',
			'tbl_abbr' => 'cdc_mort_age_15_20_',
			'tbl_name' => 'cdc_weekly_deaths_by_age_2015_2020_weighted',
			'tbl_eng' => 'CDC Weekly Deaths by State and Age, 2015-2020 Weighted (Predicted)',
			'tbl_group' => 'Vital Statistics',
			'tbl_ord' => '10',
			'tbl_num_fields' => '6'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 71,
			'tbl_database' => '1',
			'tbl_abbr' => 'pop_dist_',
			'tbl_name' => 'population_dist',
			'tbl_eng' => 'Population Age Distribution Details',
			'tbl_desc' => 'More detailed breakdowns of recent population estimates.',
			'tbl_group' => 'Vital Statistics',
			'tbl_ord' => '8',
			'tbl_num_fields' => '36',
			'tbl_num_foreign_keys' => '1'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 72,
			'tbl_database' => '1',
			'tbl_abbr' => 'us_pop_1900_',
			'tbl_name' => 'population_us_1900',
			'tbl_eng' => 'U.S. Population 1900-1999',
			'tbl_group' => 'Excel Import',
			'tbl_ord' => '15',
			'tbl_num_fields' => '2'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 73,
			'tbl_database' => '1',
			'tbl_abbr' => 'pop_md_',
			'tbl_name' => 'population_md_1790',
			'tbl_eng' => 'Maryland Population & Mortality Estimates',
			'tbl_group' => 'Excel Import',
			'tbl_ord' => '16',
			'tbl_num_fields' => '3'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 74,
			'tbl_database' => '1',
			'tbl_abbr' => 'us_mort_1900_',
			'tbl_name' => 'population_us_mort_1900',
			'tbl_eng' => 'United States Mortality Estimates 1900-1960',
			'tbl_group' => 'Excel Import',
			'tbl_ord' => '17',
			'tbl_num_fields' => '3'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 75,
			'tbl_database' => '1',
			'tbl_abbr' => 'oxf_strg_',
			'tbl_name' => 'oxford_stringency_index',
			'tbl_eng' => 'Stringency Index by Oxford Covid-19 Government Response Tracker (OxCGRT)',
			'tbl_group' => 'Excel Import',
			'tbl_ord' => '18',
			'tbl_num_fields' => '331'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 76,
			'tbl_database' => '1',
			'tbl_abbr' => 'mrt_week_us_',
			'tbl_name' => 'mort_weekly_us',
			'tbl_eng' => 'United States Recent Weekly Data',
			'tbl_desc' => 'This table organizes the weekly and daily data related to recent public health crises.',
			'tbl_group' => 'Vital Statistics',
			'tbl_num_fields' => '7'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 77,
			'tbl_database' => '1',
			'tbl_abbr' => 'lab_mon_us_',
			'tbl_name' => 'labor_monthly_us',
			'tbl_eng' => 'U.S. Bureau of Labor Statistics, Monthly',
			'tbl_group' => 'Excel Import',
			'tbl_ord' => '19',
			'tbl_num_fields' => '2'
		]);
		DB::table('sl_tables')->insert([
			'tbl_id' => 78,
			'tbl_database' => '1',
			'tbl_abbr' => 'lab_mon_us_',
			'tbl_name' => 'bs_labor_monthly_us',
			'tbl_eng' => 'U.S. Bureau of Labor Statistics, Monthly, 1948-2021',
			'tbl_group' => 'Excel Import',
			'tbl_ord' => '20',
			'tbl_num_fields' => '13'
		]);

	DB::table('sl_fields')->insert([
			'fld_id' => 10315,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '18',
			'fld_spec_type' => 'Replica',
			'fld_name' => 'user_id',
			'fld_eng' => 'User ID',
			'fld_desc' => 'Indicates the unique User ID number of the User owning the data stored in this record for this Experience.',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_char_support' => ',Numbers,',
			'fld_opts' => '39'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10316,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '14',
			'fld_spec_type' => 'Replica',
			'fld_name' => 'submission_progress',
			'fld_eng' => 'Experience Node Progress',
			'fld_desc' => 'Indicates the unique Node ID number of the last Experience Node loaded during this User\'s Experience.',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_char_support' => ',Numbers,',
			'fld_opts' => '39'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10317,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '16',
			'fld_spec_type' => 'Replica',
			'fld_name' => 'tree_version',
			'fld_eng' => 'Tree Version Number',
			'fld_desc' => 'Stores the current version number of this User Experience, important for tracking bugs.',
			'fld_opts' => '39'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10318,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '13',
			'fld_spec_type' => 'Replica',
			'fld_name' => 'version_ab',
			'fld_eng' => 'A/B Testing Version',
			'fld_desc' => 'Stores a complex string reflecting all A/B Testing variations in effect at the time of this User\'s Experience of this Node.',
			'fld_opts' => '39'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10319,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '17',
			'fld_spec_type' => 'Replica',
			'fld_name' => 'unique_str',
			'fld_eng' => 'Unique String For Record',
			'fld_desc' => 'This unique string is for cases when including the record ID number is not appropriate.',
			'fld_opts' => '39'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10320,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '15',
			'fld_spec_type' => 'Replica',
			'fld_name' => 'ip_addy',
			'fld_eng' => 'IP Address',
			'fld_desc' => 'Encrypted IP address of the current user.',
			'fld_opts' => '39'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10321,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '19',
			'fld_spec_type' => 'Replica',
			'fld_name' => 'is_mobile',
			'fld_eng' => 'Using Mobile Device',
			'fld_desc' => 'Indicates whether or not the current user is interacting via a mobile deviced.',
			'fld_opts' => '39'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10322,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_spec_source' => '0',
			'fld_name' => 'name',
			'fld_eng' => 'Dataset Name',
			'fld_desc' => 'Indicates the name of this dataset.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10323,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '1',
			'fld_spec_source' => '0',
			'fld_name' => 'slug',
			'fld_eng' => 'Dataset Slug',
			'fld_desc' => 'Indicates the unique URL slug for this dataset.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10324,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '11',
			'fld_spec_source' => '0',
			'fld_name' => 'total_recs',
			'fld_eng' => 'Total Records',
			'fld_desc' => 'Indicates the total number of records imported into this dataset.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10325,
			'fld_database' => '1',
			'fld_table' => '56',
			'fld_spec_source' => '0',
			'fld_name' => 'dataset_id',
			'fld_eng' => 'Dataset ID#',
			'fld_desc' => 'Indicates the unique ID# for the dataset record associated with this tag.',
			'fld_foreign_table' => '55',
			'fld_foreign_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',Foreign,',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10326,
			'fld_database' => '1',
			'fld_table' => '56',
			'fld_ord' => '1',
			'fld_spec_source' => '0',
			'fld_name' => 'tag_id',
			'fld_eng' => 'Dataset Tag ID#',
			'fld_desc' => 'Indicates the unique ID# for the dataset tag being linked to this dataset.',
			'fld_foreign_table' => '57',
			'fld_foreign_min' => '0',
			'fld_foreign_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',Foreign,',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10327,
			'fld_database' => '1',
			'fld_table' => '57',
			'fld_spec_source' => '0',
			'fld_name' => 'name',
			'fld_eng' => 'Tag Name',
			'fld_desc' => 'Indicates the name or title of this tag.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10328,
			'fld_database' => '1',
			'fld_table' => '57',
			'fld_ord' => '2',
			'fld_spec_source' => '0',
			'fld_name' => 'desc',
			'fld_eng' => 'Tag Description',
			'fld_desc' => 'Indicates the description for this tag.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'TEXT',
			'fld_data_length' => '0',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10329,
			'fld_database' => '1',
			'fld_table' => '57',
			'fld_ord' => '3',
			'fld_spec_source' => '0',
			'fld_name' => 'total_recs',
			'fld_eng' => 'Total Number of Tagged Datasets',
			'fld_desc' => 'Indicates the total number of tagged datasets.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10330,
			'fld_database' => '1',
			'fld_table' => '57',
			'fld_ord' => '1',
			'fld_spec_source' => '0',
			'fld_name' => 'slug',
			'fld_eng' => 'Tag Slug',
			'fld_desc' => 'Indicates the URL slug associated with this tag.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10331,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '2',
			'fld_spec_source' => '0',
			'fld_name' => 'desc',
			'fld_eng' => 'Dataset Description',
			'fld_desc' => 'Indicates a longer description for this dataset.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'TEXT',
			'fld_data_length' => '0',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10332,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '4',
			'fld_spec_source' => '0',
			'fld_name' => 'source_url',
			'fld_eng' => 'Primary Source URL',
			'fld_desc' => 'Indicates a link to the main source for this dataset.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10333,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '3',
			'fld_spec_source' => '0',
			'fld_name' => 'source_name',
			'fld_eng' => 'Source Name',
			'fld_desc' => 'Indicates the name of the source for this dataset.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10334,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '8',
			'fld_spec_source' => '0',
			'fld_name' => 'disclaim',
			'fld_eng' => 'Dataset Disclaimers',
			'fld_desc' => 'Indicates any disclaimers provided by the source regarding this dataset.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'TEXT',
			'fld_data_length' => '0',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10335,
			'fld_database' => '1',
			'fld_table' => '58',
			'fld_spec_source' => '0',
			'fld_name' => 'name',
			'fld_eng' => 'Organization Name',
			'fld_desc' => 'Indicates the name of this organization.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10336,
			'fld_database' => '1',
			'fld_table' => '58',
			'fld_ord' => '1',
			'fld_spec_source' => '0',
			'fld_name' => 'desc',
			'fld_eng' => 'Organization Description',
			'fld_desc' => 'Describes the organization which produces some datasets.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'TEXT',
			'fld_data_length' => '0',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10337,
			'fld_database' => '1',
			'fld_table' => '58',
			'fld_ord' => '2',
			'fld_spec_source' => '0',
			'fld_name' => 'url',
			'fld_eng' => 'Organization Website',
			'fld_desc' => 'Indicates the URL for this organization\'s website.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10338,
			'fld_database' => '1',
			'fld_table' => '58',
			'fld_ord' => '3',
			'fld_spec_source' => '0',
			'fld_name' => 'slug',
			'fld_eng' => 'URL Slug',
			'fld_desc' => 'Indicates the string used to identify this organization within certain website URLs.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10339,
			'fld_database' => '1',
			'fld_table' => '59',
			'fld_spec_source' => '0',
			'fld_name' => 'dataset_id',
			'fld_eng' => 'Dataset ID#',
			'fld_desc' => 'Indicates the unique ID# for the dataset record associated with this organization.',
			'fld_foreign_table' => '55',
			'fld_foreign_min' => '0',
			'fld_foreign_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',Foreign,',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10340,
			'fld_database' => '1',
			'fld_table' => '59',
			'fld_ord' => '1',
			'fld_spec_source' => '0',
			'fld_name' => 'org_id',
			'fld_eng' => 'Dataset Org ID#',
			'fld_desc' => 'Indicates the unique ID# for the organization being linked to this dataset.',
			'fld_foreign_table' => '58',
			'fld_foreign_min' => '0',
			'fld_foreign_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',Foreign,',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10341,
			'fld_database' => '1',
			'fld_table' => '60',
			'fld_spec_source' => '0',
			'fld_name' => 'country',
			'fld_eng' => 'Country',
			'fld_desc' => 'Indicates the country of this geographical area.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10342,
			'fld_database' => '1',
			'fld_table' => '60',
			'fld_ord' => '1',
			'fld_spec_source' => '0',
			'fld_name' => 'state',
			'fld_eng' => 'State/Province',
			'fld_desc' => 'Indicates the state or province of this geographical area, within one country.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10343,
			'fld_database' => '1',
			'fld_table' => '60',
			'fld_ord' => '2',
			'fld_spec_source' => '0',
			'fld_name' => 'county',
			'fld_eng' => 'County',
			'fld_desc' => 'Indicates the county of this geographical area, within a state or province.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10344,
			'fld_database' => '1',
			'fld_table' => '60',
			'fld_ord' => '3',
			'fld_spec_source' => '0',
			'fld_name' => 'city',
			'fld_eng' => 'City/Town',
			'fld_desc' => 'Indicates the city of this geographical area, within one county.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10345,
			'fld_database' => '1',
			'fld_table' => '61',
			'fld_spec_source' => '0',
			'fld_name' => 'dataset_id',
			'fld_eng' => 'Dataset ID#',
			'fld_desc' => 'Indicates the unique ID# for the dataset record associated with this geographical area.',
			'fld_foreign_table' => '55',
			'fld_foreign_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',Foreign,',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10346,
			'fld_database' => '1',
			'fld_table' => '61',
			'fld_ord' => '1',
			'fld_spec_source' => '0',
			'fld_name' => 'geo_area_id',
			'fld_eng' => 'Dataset Geographic Area ID#',
			'fld_desc' => 'Indicates the unique ID# for the geographic area being linked to this dataset.',
			'fld_foreign_table' => '60',
			'fld_foreign_min' => '0',
			'fld_foreign_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',Foreign,',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10347,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '12',
			'fld_spec_source' => '0',
			'fld_name' => 'data_table',
			'fld_eng' => 'Core Data Table',
			'fld_desc' => 'Indicates the unique ID# for the core data table which consolidates this dataset. This core data table may have been constructed with multiple raw data tables.',
			'fld_foreign_min' => '0',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => '0',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',Foreign,',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10356,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '1',
			'fld_spec_source' => '0',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10357,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '2',
			'fld_name' => 'population',
			'fld_eng' => 'Population',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10358,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '3',
			'fld_name' => '25_years',
			'fld_eng' => '< 25 years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10359,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '4',
			'fld_name' => '25_44_years',
			'fld_eng' => '25-44 years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10360,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '5',
			'fld_name' => '45_64_years',
			'fld_eng' => '45-64 years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10361,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '6',
			'fld_name' => '65_74_years',
			'fld_eng' => '65-74 years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10362,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '7',
			'fld_name' => '75_84_years',
			'fld_eng' => '75-84 years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10363,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '8',
			'fld_name' => '85_years',
			'fld_eng' => '85+ years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10432,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '10',
			'fld_name' => 'mortality',
			'fld_eng' => 'All-Cause Mortality',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10433,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '11',
			'fld_name' => 'mort_25_years',
			'fld_eng' => 'All-Cause Mortality < 25 years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10434,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '12',
			'fld_name' => 'mort_25_44_years',
			'fld_eng' => 'All-Cause Mortality 25-44 years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10435,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '13',
			'fld_name' => 'mort_45_64_years',
			'fld_eng' => 'All-Cause Mortality 45-64 years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10436,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '14',
			'fld_name' => 'mort_65_74_years',
			'fld_eng' => 'All-Cause Mortality 65-74 years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10437,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '15',
			'fld_name' => 'mort_75_84_years',
			'fld_eng' => 'All-Cause Mortality 75-84 years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10438,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '16',
			'fld_name' => 'mort_85_years',
			'fld_eng' => 'All-Cause Mortality 85+ years',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10364,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_spec_source' => '0',
			'fld_name' => 'state',
			'fld_eng' => 'State or Metropolis',
			'fld_desc' => 'Indicates the state or metropolis tracked by this record. If this field is empty, then this record is for the United States as a whole.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10365,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '10',
			'fld_spec_source' => '0',
			'fld_name' => 'notes_import',
			'fld_eng' => 'Import Notes',
			'fld_desc' => 'Provides any additional instructions required to import fresh copies of this dataset in the future.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'TEXT',
			'fld_data_length' => '0',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10366,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '7',
			'fld_spec_source' => '0',
			'fld_name' => 'source_date_updated',
			'fld_eng' => 'Source Date Updated',
			'fld_desc' => 'Indicates the date this source updated this dataset.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DATE',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10367,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '5',
			'fld_spec_source' => '0',
			'fld_name' => 'source_raw_url',
			'fld_eng' => 'URL to Download Raw Data Table',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'TEXT',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10368,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '6',
			'fld_spec_source' => '0',
			'fld_name' => 'documentation_url',
			'fld_eng' => 'Dataset Documentation URL',
			'fld_desc' => 'Indicates the URL for this dataset\'s official documentation.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10369,
			'fld_database' => '1',
			'fld_table' => '55',
			'fld_ord' => '9',
			'fld_spec_source' => '0',
			'fld_name' => 'citation',
			'fld_eng' => 'Suggested Citation',
			'fld_desc' => 'Indicates the citation suggested by the dataset\'s source.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'TEXT',
			'fld_data_length' => '0',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10370,
			'fld_database' => '1',
			'fld_table' => '64',
			'fld_name' => 'state',
			'fld_eng' => 'State',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10371,
			'fld_database' => '1',
			'fld_table' => '64',
			'fld_ord' => '1',
			'fld_name' => 'state_code',
			'fld_eng' => 'State Code',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10372,
			'fld_database' => '1',
			'fld_table' => '64',
			'fld_ord' => '2',
			'fld_name' => 'age_group',
			'fld_eng' => 'Age Group',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10373,
			'fld_database' => '1',
			'fld_table' => '64',
			'fld_ord' => '3',
			'fld_name' => 'age_group_code',
			'fld_eng' => 'Age Group Code',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10374,
			'fld_database' => '1',
			'fld_table' => '64',
			'fld_ord' => '4',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10375,
			'fld_database' => '1',
			'fld_table' => '64',
			'fld_ord' => '5',
			'fld_name' => 'year_code',
			'fld_eng' => 'Year Code',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10376,
			'fld_database' => '1',
			'fld_table' => '64',
			'fld_ord' => '6',
			'fld_name' => 'deaths',
			'fld_eng' => 'Deaths',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10377,
			'fld_database' => '1',
			'fld_table' => '64',
			'fld_ord' => '7',
			'fld_name' => 'population',
			'fld_eng' => 'Population',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10378,
			'fld_database' => '1',
			'fld_table' => '64',
			'fld_ord' => '8',
			'fld_name' => 'crude_rate',
			'fld_eng' => 'Crude Rate',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10379,
			'fld_database' => '1',
			'fld_table' => '65',
			'fld_name' => 'state',
			'fld_eng' => 'State',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10380,
			'fld_database' => '1',
			'fld_table' => '65',
			'fld_ord' => '1',
			'fld_name' => 'state_code',
			'fld_eng' => 'State Code',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10381,
			'fld_database' => '1',
			'fld_table' => '65',
			'fld_ord' => '2',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10382,
			'fld_database' => '1',
			'fld_table' => '65',
			'fld_ord' => '3',
			'fld_name' => 'year_code',
			'fld_eng' => 'Year Code',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10383,
			'fld_database' => '1',
			'fld_table' => '65',
			'fld_ord' => '4',
			'fld_name' => 'age_group',
			'fld_eng' => 'Age Group',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10384,
			'fld_database' => '1',
			'fld_table' => '65',
			'fld_ord' => '5',
			'fld_name' => 'age_group_code',
			'fld_eng' => 'Age Group Code',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10385,
			'fld_database' => '1',
			'fld_table' => '65',
			'fld_ord' => '6',
			'fld_name' => 'deaths',
			'fld_eng' => 'Deaths',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10386,
			'fld_database' => '1',
			'fld_table' => '65',
			'fld_ord' => '7',
			'fld_name' => 'population',
			'fld_eng' => 'Population',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10387,
			'fld_database' => '1',
			'fld_table' => '65',
			'fld_ord' => '8',
			'fld_name' => 'crude_rate',
			'fld_eng' => 'Crude Rate',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10388,
			'fld_database' => '1',
			'fld_table' => '66',
			'fld_name' => 'state',
			'fld_eng' => 'State',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10389,
			'fld_database' => '1',
			'fld_table' => '66',
			'fld_ord' => '1',
			'fld_name' => 'state_code',
			'fld_eng' => 'State Code',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10390,
			'fld_database' => '1',
			'fld_table' => '66',
			'fld_ord' => '2',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10391,
			'fld_database' => '1',
			'fld_table' => '66',
			'fld_ord' => '3',
			'fld_name' => 'year_code',
			'fld_eng' => 'Year Code',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10392,
			'fld_database' => '1',
			'fld_table' => '66',
			'fld_ord' => '4',
			'fld_name' => 'age_group',
			'fld_eng' => 'Age Group',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10393,
			'fld_database' => '1',
			'fld_table' => '66',
			'fld_ord' => '5',
			'fld_name' => 'age_group_code',
			'fld_eng' => 'Age Group Code',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10394,
			'fld_database' => '1',
			'fld_table' => '66',
			'fld_ord' => '6',
			'fld_name' => 'deaths',
			'fld_eng' => 'Deaths',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10395,
			'fld_database' => '1',
			'fld_table' => '66',
			'fld_ord' => '7',
			'fld_name' => 'population',
			'fld_eng' => 'Population',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10396,
			'fld_database' => '1',
			'fld_table' => '66',
			'fld_ord' => '8',
			'fld_name' => 'crude_rate',
			'fld_eng' => 'Crude Rate',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10398,
			'fld_database' => '1',
			'fld_table' => '67',
			'fld_ord' => '1',
			'fld_name' => 'week_ending_date',
			'fld_eng' => 'Week Ending Date',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10399,
			'fld_database' => '1',
			'fld_table' => '67',
			'fld_ord' => '2',
			'fld_name' => 'state_abbreviation',
			'fld_eng' => 'State Abbreviation',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10400,
			'fld_database' => '1',
			'fld_table' => '67',
			'fld_ord' => '3',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10401,
			'fld_database' => '1',
			'fld_table' => '67',
			'fld_ord' => '4',
			'fld_name' => 'week',
			'fld_eng' => 'Week',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10402,
			'fld_database' => '1',
			'fld_table' => '67',
			'fld_ord' => '5',
			'fld_name' => 'age_group',
			'fld_eng' => 'Age Group',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10403,
			'fld_database' => '1',
			'fld_table' => '67',
			'fld_ord' => '6',
			'fld_name' => 'number_of_deaths',
			'fld_eng' => 'Number of Deaths',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10404,
			'fld_database' => '1',
			'fld_table' => '67',
			'fld_ord' => '7',
			'fld_name' => 'time_period',
			'fld_eng' => 'Time Period',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10405,
			'fld_database' => '1',
			'fld_table' => '67',
			'fld_ord' => '8',
			'fld_name' => 'type',
			'fld_eng' => 'Type',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10406,
			'fld_database' => '1',
			'fld_table' => '67',
			'fld_ord' => '9',
			'fld_name' => 'suppress',
			'fld_eng' => 'Suppress',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10408,
			'fld_database' => '1',
			'fld_table' => '68',
			'fld_ord' => '1',
			'fld_name' => 'week_ending_date',
			'fld_eng' => 'Week Ending Date',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10409,
			'fld_database' => '1',
			'fld_table' => '68',
			'fld_ord' => '2',
			'fld_name' => 'state_abbreviation',
			'fld_eng' => 'State Abbreviation',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10410,
			'fld_database' => '1',
			'fld_table' => '68',
			'fld_ord' => '3',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10411,
			'fld_database' => '1',
			'fld_table' => '68',
			'fld_ord' => '4',
			'fld_name' => 'week',
			'fld_eng' => 'Week',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10412,
			'fld_database' => '1',
			'fld_table' => '68',
			'fld_ord' => '5',
			'fld_name' => 'age_group',
			'fld_eng' => 'Age Group',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10413,
			'fld_database' => '1',
			'fld_table' => '68',
			'fld_ord' => '6',
			'fld_name' => 'number_of_deaths',
			'fld_eng' => 'Number of Deaths',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10418,
			'fld_database' => '1',
			'fld_table' => '69',
			'fld_ord' => '1',
			'fld_name' => 'week_ending_date',
			'fld_eng' => 'Week Ending Date',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10419,
			'fld_database' => '1',
			'fld_table' => '69',
			'fld_ord' => '2',
			'fld_name' => 'state_abbreviation',
			'fld_eng' => 'State Abbreviation',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10420,
			'fld_database' => '1',
			'fld_table' => '69',
			'fld_ord' => '3',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10421,
			'fld_database' => '1',
			'fld_table' => '69',
			'fld_ord' => '4',
			'fld_name' => 'week',
			'fld_eng' => 'Week',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10422,
			'fld_database' => '1',
			'fld_table' => '69',
			'fld_ord' => '5',
			'fld_name' => 'age_group',
			'fld_eng' => 'Age Group',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10423,
			'fld_database' => '1',
			'fld_table' => '69',
			'fld_ord' => '6',
			'fld_name' => 'number_of_deaths',
			'fld_eng' => 'Number of Deaths',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10425,
			'fld_database' => '1',
			'fld_table' => '70',
			'fld_ord' => '1',
			'fld_name' => 'week_ending_date',
			'fld_eng' => 'Week Ending Date',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10426,
			'fld_database' => '1',
			'fld_table' => '70',
			'fld_ord' => '2',
			'fld_name' => 'state_abbreviation',
			'fld_eng' => 'State Abbreviation',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10427,
			'fld_database' => '1',
			'fld_table' => '70',
			'fld_ord' => '3',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10428,
			'fld_database' => '1',
			'fld_table' => '70',
			'fld_ord' => '4',
			'fld_name' => 'week',
			'fld_eng' => 'Week',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10429,
			'fld_database' => '1',
			'fld_table' => '70',
			'fld_ord' => '5',
			'fld_name' => 'age_group',
			'fld_eng' => 'Age Group',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10430,
			'fld_database' => '1',
			'fld_table' => '70',
			'fld_ord' => '6',
			'fld_name' => 'number_of_deaths',
			'fld_eng' => 'Number of Deaths',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10431,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '9',
			'fld_spec_source' => '0',
			'fld_name' => 'age_unknown',
			'fld_eng' => 'Age Group Unknown',
			'fld_desc' => 'Indicates the number of people missed by age group breakdowns.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10439,
			'fld_database' => '1',
			'fld_table' => '63',
			'fld_ord' => '17',
			'fld_spec_source' => '0',
			'fld_name' => 'mort_age_unknown',
			'fld_eng' => 'All-Cause Mortality Age Group Unknown',
			'fld_desc' => 'Indicates the number of people missed by age group breakdowns.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10440,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_spec_source' => '0',
			'fld_name' => 'geo_area_id',
			'fld_eng' => 'Geographical Area ID#',
			'fld_desc' => 'Indicates the unique ID# of this geographical area.',
			'fld_foreign_table' => '60',
			'fld_foreign_min' => '0',
			'fld_foreign_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',Foreign,',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10441,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '2',
			'fld_spec_source' => '0',
			'fld_name' => 'source_url',
			'fld_eng' => 'Source URL',
			'fld_desc' => 'Indicates the URL for this population distribution.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10442,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '1',
			'fld_spec_source' => '0',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_desc' => 'Indicates the year for which these population estimates were made.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10443,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '4',
			'fld_spec_source' => '0',
			'fld_name' => 'total',
			'fld_eng' => 'Total Population Estimate',
			'fld_desc' => 'Indicates the total population estimate for this distribution.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10444,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '6',
			'fld_spec_source' => '0',
			'fld_name' => 'gender_male',
			'fld_eng' => 'Gender: Male',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10474,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '21',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_gender_male',
			'fld_eng' => 'Percent Gender: Male',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10445,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '5',
			'fld_spec_source' => '0',
			'fld_name' => 'gender_female',
			'fld_eng' => 'Gender: Female',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10473,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '20',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_gender_female',
			'fld_eng' => 'Percent Gender: Female',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10446,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '7',
			'fld_spec_source' => '0',
			'fld_name' => 'age04',
			'fld_eng' => 'Under 5 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10472,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '22',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age04',
			'fld_eng' => 'Percent Under 5 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10447,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '8',
			'fld_spec_source' => '0',
			'fld_name' => 'age59',
			'fld_eng' => '5-9 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10471,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '23',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age59',
			'fld_eng' => 'Percent 5-9 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10448,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '9',
			'fld_spec_source' => '0',
			'fld_name' => 'age1014',
			'fld_eng' => '10-14 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10470,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '24',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age1014',
			'fld_eng' => 'Percent 10-14 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10449,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '10',
			'fld_spec_source' => '0',
			'fld_name' => 'age1519',
			'fld_eng' => '15-19 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10469,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '25',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age1519',
			'fld_eng' => 'Percent 15-19 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10450,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '11',
			'fld_spec_source' => '0',
			'fld_name' => 'age2024',
			'fld_eng' => '20-24 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10468,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '26',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age2024',
			'fld_eng' => 'Percent 20-24 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10451,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '13',
			'fld_spec_source' => '0',
			'fld_name' => 'age3544',
			'fld_eng' => '35-44 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10467,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '28',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age3544',
			'fld_eng' => 'Percent 35-44 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10452,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '14',
			'fld_spec_source' => '0',
			'fld_name' => 'age4554',
			'fld_eng' => '45-54 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10466,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '29',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age4554',
			'fld_eng' => 'Percent 45-54 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10453,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '15',
			'fld_spec_source' => '0',
			'fld_name' => 'age5559',
			'fld_eng' => '55-59 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10465,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '30',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age5559',
			'fld_eng' => 'Percent 55-59 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10454,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '16',
			'fld_spec_source' => '0',
			'fld_name' => 'age6064',
			'fld_eng' => '60-64 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10464,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '31',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age6064',
			'fld_eng' => 'Percent 60-64 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10455,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '17',
			'fld_spec_source' => '0',
			'fld_name' => 'age6574',
			'fld_eng' => '65-74 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10463,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '32',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age6574',
			'fld_eng' => 'Percent 65-74 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10456,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '18',
			'fld_spec_source' => '0',
			'fld_name' => 'age7584',
			'fld_eng' => '75-84 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10462,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '33',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age7584',
			'fld_eng' => 'Percent 75-84 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10457,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '19',
			'fld_spec_source' => '0',
			'fld_name' => 'age85',
			'fld_eng' => '85 Years and Older',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10461,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '34',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age85',
			'fld_eng' => 'Percent 85 Years and Older',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10458,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '12',
			'fld_spec_source' => '0',
			'fld_name' => 'age2534',
			'fld_eng' => '25-34 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10460,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '27',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_age2534',
			'fld_eng' => 'Percent 25-34 Years',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10459,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '3',
			'fld_spec_source' => '0',
			'fld_name' => 'source_url2',
			'fld_eng' => 'Source URL 2',
			'fld_desc' => 'Indicates another source URL for this population distribution.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10475,
			'fld_database' => '1',
			'fld_table' => '71',
			'fld_ord' => '35',
			'fld_spec_source' => '0',
			'fld_name' => 'name',
			'fld_eng' => 'Population Distribution Name',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10476,
			'fld_database' => '1',
			'fld_table' => '72',
			'fld_name' => 'year',
			'fld_eng' => 'Year (July 1)',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10477,
			'fld_database' => '1',
			'fld_table' => '72',
			'fld_ord' => '1',
			'fld_name' => 'population',
			'fld_eng' => 'National Population Estimate',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10478,
			'fld_database' => '1',
			'fld_table' => '73',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10479,
			'fld_database' => '1',
			'fld_table' => '73',
			'fld_ord' => '1',
			'fld_name' => 'population',
			'fld_eng' => 'Population Estimate',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10480,
			'fld_database' => '1',
			'fld_table' => '73',
			'fld_ord' => '2',
			'fld_name' => 'mortality',
			'fld_eng' => 'All-Cause Mortality Estimates',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10481,
			'fld_database' => '1',
			'fld_table' => '74',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10482,
			'fld_database' => '1',
			'fld_table' => '74',
			'fld_ord' => '1',
			'fld_name' => 'deaths_estimate',
			'fld_eng' => 'All Cause Deaths',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10483,
			'fld_database' => '1',
			'fld_table' => '74',
			'fld_ord' => '2',
			'fld_name' => 'death_rates_per_1000',
			'fld_eng' => 'Death Rates Per 1,000',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10484,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '1',
			'fld_name' => 'country_code',
			'fld_eng' => 'Country Code',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10485,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '2',
			'fld_name' => 'country_name',
			'fld_eng' => 'Country Name',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10486,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '3',
			'fld_name' => '01jan2020',
			'fld_eng' => '01Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10487,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '4',
			'fld_name' => '02jan2020',
			'fld_eng' => '02Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10488,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '5',
			'fld_name' => '03jan2020',
			'fld_eng' => '03Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10489,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '6',
			'fld_name' => '04jan2020',
			'fld_eng' => '04Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10490,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '7',
			'fld_name' => '05jan2020',
			'fld_eng' => '05Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10491,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '8',
			'fld_name' => '06jan2020',
			'fld_eng' => '06Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10492,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '9',
			'fld_name' => '07jan2020',
			'fld_eng' => '07Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10493,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '10',
			'fld_name' => '08jan2020',
			'fld_eng' => '08Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10494,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '11',
			'fld_name' => '09jan2020',
			'fld_eng' => '09Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10495,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '12',
			'fld_name' => '10jan2020',
			'fld_eng' => '10Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10496,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '13',
			'fld_name' => '11jan2020',
			'fld_eng' => '11Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10497,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '14',
			'fld_name' => '12jan2020',
			'fld_eng' => '12Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10498,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '15',
			'fld_name' => '13jan2020',
			'fld_eng' => '13Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10499,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '16',
			'fld_name' => '14jan2020',
			'fld_eng' => '14Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10500,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '17',
			'fld_name' => '15jan2020',
			'fld_eng' => '15Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10501,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '18',
			'fld_name' => '16jan2020',
			'fld_eng' => '16Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10502,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '19',
			'fld_name' => '17jan2020',
			'fld_eng' => '17Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10503,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '20',
			'fld_name' => '18jan2020',
			'fld_eng' => '18Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10504,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '21',
			'fld_name' => '19jan2020',
			'fld_eng' => '19Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10505,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '22',
			'fld_name' => '20jan2020',
			'fld_eng' => '20Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10506,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '23',
			'fld_name' => '21jan2020',
			'fld_eng' => '21Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10507,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '24',
			'fld_name' => '22jan2020',
			'fld_eng' => '22Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10508,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '25',
			'fld_name' => '23jan2020',
			'fld_eng' => '23Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10509,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '26',
			'fld_name' => '24jan2020',
			'fld_eng' => '24Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10510,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '27',
			'fld_name' => '25jan2020',
			'fld_eng' => '25Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10511,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '28',
			'fld_name' => '26jan2020',
			'fld_eng' => '26Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10512,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '29',
			'fld_name' => '27jan2020',
			'fld_eng' => '27Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10513,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '30',
			'fld_name' => '28jan2020',
			'fld_eng' => '28Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10514,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '31',
			'fld_name' => '29jan2020',
			'fld_eng' => '29Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10515,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '32',
			'fld_name' => '30jan2020',
			'fld_eng' => '30Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10516,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '33',
			'fld_name' => '31jan2020',
			'fld_eng' => '31Jan2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10517,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '34',
			'fld_name' => '01feb2020',
			'fld_eng' => '01Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10518,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '35',
			'fld_name' => '02feb2020',
			'fld_eng' => '02Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10519,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '36',
			'fld_name' => '03feb2020',
			'fld_eng' => '03Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10520,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '37',
			'fld_name' => '04feb2020',
			'fld_eng' => '04Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10521,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '38',
			'fld_name' => '05feb2020',
			'fld_eng' => '05Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10522,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '39',
			'fld_name' => '06feb2020',
			'fld_eng' => '06Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10523,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '40',
			'fld_name' => '07feb2020',
			'fld_eng' => '07Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10524,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '41',
			'fld_name' => '08feb2020',
			'fld_eng' => '08Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10525,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '42',
			'fld_name' => '09feb2020',
			'fld_eng' => '09Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10526,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '43',
			'fld_name' => '10feb2020',
			'fld_eng' => '10Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10527,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '44',
			'fld_name' => '11feb2020',
			'fld_eng' => '11Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10528,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '45',
			'fld_name' => '12feb2020',
			'fld_eng' => '12Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10529,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '46',
			'fld_name' => '13feb2020',
			'fld_eng' => '13Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10530,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '47',
			'fld_name' => '14feb2020',
			'fld_eng' => '14Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10531,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '48',
			'fld_name' => '15feb2020',
			'fld_eng' => '15Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10532,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '49',
			'fld_name' => '16feb2020',
			'fld_eng' => '16Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10533,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '50',
			'fld_name' => '17feb2020',
			'fld_eng' => '17Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10534,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '51',
			'fld_name' => '18feb2020',
			'fld_eng' => '18Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10535,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '52',
			'fld_name' => '19feb2020',
			'fld_eng' => '19Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10536,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '53',
			'fld_name' => '20feb2020',
			'fld_eng' => '20Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10537,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '54',
			'fld_name' => '21feb2020',
			'fld_eng' => '21Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10538,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '55',
			'fld_name' => '22feb2020',
			'fld_eng' => '22Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10539,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '56',
			'fld_name' => '23feb2020',
			'fld_eng' => '23Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10540,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '57',
			'fld_name' => '24feb2020',
			'fld_eng' => '24Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10541,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '58',
			'fld_name' => '25feb2020',
			'fld_eng' => '25Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10542,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '59',
			'fld_name' => '26feb2020',
			'fld_eng' => '26Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10543,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '60',
			'fld_name' => '27feb2020',
			'fld_eng' => '27Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10544,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '61',
			'fld_name' => '28feb2020',
			'fld_eng' => '28Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10545,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '62',
			'fld_name' => '29feb2020',
			'fld_eng' => '29Feb2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10546,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '63',
			'fld_name' => '01mar2020',
			'fld_eng' => '01Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10547,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '64',
			'fld_name' => '02mar2020',
			'fld_eng' => '02Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10548,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '65',
			'fld_name' => '03mar2020',
			'fld_eng' => '03Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10549,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '66',
			'fld_name' => '04mar2020',
			'fld_eng' => '04Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10550,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '67',
			'fld_name' => '05mar2020',
			'fld_eng' => '05Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10551,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '68',
			'fld_name' => '06mar2020',
			'fld_eng' => '06Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10552,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '69',
			'fld_name' => '07mar2020',
			'fld_eng' => '07Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10553,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '70',
			'fld_name' => '08mar2020',
			'fld_eng' => '08Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10554,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '71',
			'fld_name' => '09mar2020',
			'fld_eng' => '09Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10555,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '72',
			'fld_name' => '10mar2020',
			'fld_eng' => '10Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10556,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '73',
			'fld_name' => '11mar2020',
			'fld_eng' => '11Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10557,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '74',
			'fld_name' => '12mar2020',
			'fld_eng' => '12Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10558,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '75',
			'fld_name' => '13mar2020',
			'fld_eng' => '13Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10559,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '76',
			'fld_name' => '14mar2020',
			'fld_eng' => '14Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10560,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '77',
			'fld_name' => '15mar2020',
			'fld_eng' => '15Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10561,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '78',
			'fld_name' => '16mar2020',
			'fld_eng' => '16Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10562,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '79',
			'fld_name' => '17mar2020',
			'fld_eng' => '17Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10563,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '80',
			'fld_name' => '18mar2020',
			'fld_eng' => '18Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10564,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '81',
			'fld_name' => '19mar2020',
			'fld_eng' => '19Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10565,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '82',
			'fld_name' => '20mar2020',
			'fld_eng' => '20Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10566,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '83',
			'fld_name' => '21mar2020',
			'fld_eng' => '21Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10567,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '84',
			'fld_name' => '22mar2020',
			'fld_eng' => '22Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10568,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '85',
			'fld_name' => '23mar2020',
			'fld_eng' => '23Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10569,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '86',
			'fld_name' => '24mar2020',
			'fld_eng' => '24Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10570,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '87',
			'fld_name' => '25mar2020',
			'fld_eng' => '25Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10571,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '88',
			'fld_name' => '26mar2020',
			'fld_eng' => '26Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10572,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '89',
			'fld_name' => '27mar2020',
			'fld_eng' => '27Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10573,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '90',
			'fld_name' => '28mar2020',
			'fld_eng' => '28Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10574,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '91',
			'fld_name' => '29mar2020',
			'fld_eng' => '29Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10575,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '92',
			'fld_name' => '30mar2020',
			'fld_eng' => '30Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10576,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '93',
			'fld_name' => '31mar2020',
			'fld_eng' => '31Mar2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10577,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '94',
			'fld_name' => '01apr2020',
			'fld_eng' => '01Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10578,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '95',
			'fld_name' => '02apr2020',
			'fld_eng' => '02Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10579,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '96',
			'fld_name' => '03apr2020',
			'fld_eng' => '03Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10580,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '97',
			'fld_name' => '04apr2020',
			'fld_eng' => '04Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10581,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '98',
			'fld_name' => '05apr2020',
			'fld_eng' => '05Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10582,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '99',
			'fld_name' => '06apr2020',
			'fld_eng' => '06Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10583,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '100',
			'fld_name' => '07apr2020',
			'fld_eng' => '07Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10584,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '101',
			'fld_name' => '08apr2020',
			'fld_eng' => '08Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10585,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '102',
			'fld_name' => '09apr2020',
			'fld_eng' => '09Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10586,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '103',
			'fld_name' => '10apr2020',
			'fld_eng' => '10Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10587,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '104',
			'fld_name' => '11apr2020',
			'fld_eng' => '11Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10588,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '105',
			'fld_name' => '12apr2020',
			'fld_eng' => '12Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10589,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '106',
			'fld_name' => '13apr2020',
			'fld_eng' => '13Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10590,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '107',
			'fld_name' => '14apr2020',
			'fld_eng' => '14Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10591,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '108',
			'fld_name' => '15apr2020',
			'fld_eng' => '15Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10592,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '109',
			'fld_name' => '16apr2020',
			'fld_eng' => '16Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10593,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '110',
			'fld_name' => '17apr2020',
			'fld_eng' => '17Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10594,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '111',
			'fld_name' => '18apr2020',
			'fld_eng' => '18Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10595,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '112',
			'fld_name' => '19apr2020',
			'fld_eng' => '19Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10596,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '113',
			'fld_name' => '20apr2020',
			'fld_eng' => '20Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10597,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '114',
			'fld_name' => '21apr2020',
			'fld_eng' => '21Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10598,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '115',
			'fld_name' => '22apr2020',
			'fld_eng' => '22Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10599,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '116',
			'fld_name' => '23apr2020',
			'fld_eng' => '23Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10600,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '117',
			'fld_name' => '24apr2020',
			'fld_eng' => '24Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10601,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '118',
			'fld_name' => '25apr2020',
			'fld_eng' => '25Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10602,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '119',
			'fld_name' => '26apr2020',
			'fld_eng' => '26Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10603,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '120',
			'fld_name' => '27apr2020',
			'fld_eng' => '27Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10604,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '121',
			'fld_name' => '28apr2020',
			'fld_eng' => '28Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10605,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '122',
			'fld_name' => '29apr2020',
			'fld_eng' => '29Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10606,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '123',
			'fld_name' => '30apr2020',
			'fld_eng' => '30Apr2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10607,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '124',
			'fld_name' => '01may2020',
			'fld_eng' => '01May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10608,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '125',
			'fld_name' => '02may2020',
			'fld_eng' => '02May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10609,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '126',
			'fld_name' => '03may2020',
			'fld_eng' => '03May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10610,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '127',
			'fld_name' => '04may2020',
			'fld_eng' => '04May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10611,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '128',
			'fld_name' => '05may2020',
			'fld_eng' => '05May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10612,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '129',
			'fld_name' => '06may2020',
			'fld_eng' => '06May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10613,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '130',
			'fld_name' => '07may2020',
			'fld_eng' => '07May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10614,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '131',
			'fld_name' => '08may2020',
			'fld_eng' => '08May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10615,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '132',
			'fld_name' => '09may2020',
			'fld_eng' => '09May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10616,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '133',
			'fld_name' => '10may2020',
			'fld_eng' => '10May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10617,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '134',
			'fld_name' => '11may2020',
			'fld_eng' => '11May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10618,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '135',
			'fld_name' => '12may2020',
			'fld_eng' => '12May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10619,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '136',
			'fld_name' => '13may2020',
			'fld_eng' => '13May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10620,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '137',
			'fld_name' => '14may2020',
			'fld_eng' => '14May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10621,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '138',
			'fld_name' => '15may2020',
			'fld_eng' => '15May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10622,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '139',
			'fld_name' => '16may2020',
			'fld_eng' => '16May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10623,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '140',
			'fld_name' => '17may2020',
			'fld_eng' => '17May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10624,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '141',
			'fld_name' => '18may2020',
			'fld_eng' => '18May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10625,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '142',
			'fld_name' => '19may2020',
			'fld_eng' => '19May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10626,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '143',
			'fld_name' => '20may2020',
			'fld_eng' => '20May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10627,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '144',
			'fld_name' => '21may2020',
			'fld_eng' => '21May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10628,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '145',
			'fld_name' => '22may2020',
			'fld_eng' => '22May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10629,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '146',
			'fld_name' => '23may2020',
			'fld_eng' => '23May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10630,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '147',
			'fld_name' => '24may2020',
			'fld_eng' => '24May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10631,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '148',
			'fld_name' => '25may2020',
			'fld_eng' => '25May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10632,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '149',
			'fld_name' => '26may2020',
			'fld_eng' => '26May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10633,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '150',
			'fld_name' => '27may2020',
			'fld_eng' => '27May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10634,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '151',
			'fld_name' => '28may2020',
			'fld_eng' => '28May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10635,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '152',
			'fld_name' => '29may2020',
			'fld_eng' => '29May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10636,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '153',
			'fld_name' => '30may2020',
			'fld_eng' => '30May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10637,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '154',
			'fld_name' => '31may2020',
			'fld_eng' => '31May2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10638,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '155',
			'fld_name' => '01jun2020',
			'fld_eng' => '01Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10639,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '156',
			'fld_name' => '02jun2020',
			'fld_eng' => '02Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10640,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '157',
			'fld_name' => '03jun2020',
			'fld_eng' => '03Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10641,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '158',
			'fld_name' => '04jun2020',
			'fld_eng' => '04Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10642,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '159',
			'fld_name' => '05jun2020',
			'fld_eng' => '05Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10643,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '160',
			'fld_name' => '06jun2020',
			'fld_eng' => '06Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10644,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '161',
			'fld_name' => '07jun2020',
			'fld_eng' => '07Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10645,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '162',
			'fld_name' => '08jun2020',
			'fld_eng' => '08Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10646,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '163',
			'fld_name' => '09jun2020',
			'fld_eng' => '09Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10647,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '164',
			'fld_name' => '10jun2020',
			'fld_eng' => '10Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10648,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '165',
			'fld_name' => '11jun2020',
			'fld_eng' => '11Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10649,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '166',
			'fld_name' => '12jun2020',
			'fld_eng' => '12Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10650,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '167',
			'fld_name' => '13jun2020',
			'fld_eng' => '13Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10651,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '168',
			'fld_name' => '14jun2020',
			'fld_eng' => '14Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10652,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '169',
			'fld_name' => '15jun2020',
			'fld_eng' => '15Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10653,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '170',
			'fld_name' => '16jun2020',
			'fld_eng' => '16Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10654,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '171',
			'fld_name' => '17jun2020',
			'fld_eng' => '17Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10655,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '172',
			'fld_name' => '18jun2020',
			'fld_eng' => '18Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10656,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '173',
			'fld_name' => '19jun2020',
			'fld_eng' => '19Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10657,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '174',
			'fld_name' => '20jun2020',
			'fld_eng' => '20Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10658,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '175',
			'fld_name' => '21jun2020',
			'fld_eng' => '21Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10659,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '176',
			'fld_name' => '22jun2020',
			'fld_eng' => '22Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10660,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '177',
			'fld_name' => '23jun2020',
			'fld_eng' => '23Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10661,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '178',
			'fld_name' => '24jun2020',
			'fld_eng' => '24Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10662,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '179',
			'fld_name' => '25jun2020',
			'fld_eng' => '25Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10663,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '180',
			'fld_name' => '26jun2020',
			'fld_eng' => '26Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10664,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '181',
			'fld_name' => '27jun2020',
			'fld_eng' => '27Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10665,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '182',
			'fld_name' => '28jun2020',
			'fld_eng' => '28Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10666,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '183',
			'fld_name' => '29jun2020',
			'fld_eng' => '29Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10667,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '184',
			'fld_name' => '30jun2020',
			'fld_eng' => '30Jun2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10668,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '185',
			'fld_name' => '01jul2020',
			'fld_eng' => '01Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10669,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '186',
			'fld_name' => '02jul2020',
			'fld_eng' => '02Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10670,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '187',
			'fld_name' => '03jul2020',
			'fld_eng' => '03Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10671,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '188',
			'fld_name' => '04jul2020',
			'fld_eng' => '04Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10672,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '189',
			'fld_name' => '05jul2020',
			'fld_eng' => '05Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10673,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '190',
			'fld_name' => '06jul2020',
			'fld_eng' => '06Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10674,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '191',
			'fld_name' => '07jul2020',
			'fld_eng' => '07Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10675,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '192',
			'fld_name' => '08jul2020',
			'fld_eng' => '08Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10676,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '193',
			'fld_name' => '09jul2020',
			'fld_eng' => '09Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10677,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '194',
			'fld_name' => '10jul2020',
			'fld_eng' => '10Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10678,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '195',
			'fld_name' => '11jul2020',
			'fld_eng' => '11Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10679,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '196',
			'fld_name' => '12jul2020',
			'fld_eng' => '12Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10680,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '197',
			'fld_name' => '13jul2020',
			'fld_eng' => '13Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10681,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '198',
			'fld_name' => '14jul2020',
			'fld_eng' => '14Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10682,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '199',
			'fld_name' => '15jul2020',
			'fld_eng' => '15Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10683,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '200',
			'fld_name' => '16jul2020',
			'fld_eng' => '16Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10684,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '201',
			'fld_name' => '17jul2020',
			'fld_eng' => '17Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10685,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '202',
			'fld_name' => '18jul2020',
			'fld_eng' => '18Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10686,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '203',
			'fld_name' => '19jul2020',
			'fld_eng' => '19Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10687,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '204',
			'fld_name' => '20jul2020',
			'fld_eng' => '20Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10688,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '205',
			'fld_name' => '21jul2020',
			'fld_eng' => '21Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10689,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '206',
			'fld_name' => '22jul2020',
			'fld_eng' => '22Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10690,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '207',
			'fld_name' => '23jul2020',
			'fld_eng' => '23Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10691,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '208',
			'fld_name' => '24jul2020',
			'fld_eng' => '24Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10692,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '209',
			'fld_name' => '25jul2020',
			'fld_eng' => '25Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10693,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '210',
			'fld_name' => '26jul2020',
			'fld_eng' => '26Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10694,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '211',
			'fld_name' => '27jul2020',
			'fld_eng' => '27Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10695,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '212',
			'fld_name' => '28jul2020',
			'fld_eng' => '28Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10696,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '213',
			'fld_name' => '29jul2020',
			'fld_eng' => '29Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10697,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '214',
			'fld_name' => '30jul2020',
			'fld_eng' => '30Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10698,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '215',
			'fld_name' => '31jul2020',
			'fld_eng' => '31Jul2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10699,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '216',
			'fld_name' => '01aug2020',
			'fld_eng' => '01Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10700,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '217',
			'fld_name' => '02aug2020',
			'fld_eng' => '02Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10701,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '218',
			'fld_name' => '03aug2020',
			'fld_eng' => '03Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10702,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '219',
			'fld_name' => '04aug2020',
			'fld_eng' => '04Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10703,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '220',
			'fld_name' => '05aug2020',
			'fld_eng' => '05Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10704,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '221',
			'fld_name' => '06aug2020',
			'fld_eng' => '06Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10705,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '222',
			'fld_name' => '07aug2020',
			'fld_eng' => '07Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10706,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '223',
			'fld_name' => '08aug2020',
			'fld_eng' => '08Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10707,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '224',
			'fld_name' => '09aug2020',
			'fld_eng' => '09Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10708,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '225',
			'fld_name' => '10aug2020',
			'fld_eng' => '10Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10709,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '226',
			'fld_name' => '11aug2020',
			'fld_eng' => '11Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10710,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '227',
			'fld_name' => '12aug2020',
			'fld_eng' => '12Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10711,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '228',
			'fld_name' => '13aug2020',
			'fld_eng' => '13Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10712,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '229',
			'fld_name' => '14aug2020',
			'fld_eng' => '14Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10713,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '230',
			'fld_name' => '15aug2020',
			'fld_eng' => '15Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10714,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '231',
			'fld_name' => '16aug2020',
			'fld_eng' => '16Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10715,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '232',
			'fld_name' => '17aug2020',
			'fld_eng' => '17Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10716,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '233',
			'fld_name' => '18aug2020',
			'fld_eng' => '18Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10717,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '234',
			'fld_name' => '19aug2020',
			'fld_eng' => '19Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10718,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '235',
			'fld_name' => '20aug2020',
			'fld_eng' => '20Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10719,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '236',
			'fld_name' => '21aug2020',
			'fld_eng' => '21Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10720,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '237',
			'fld_name' => '22aug2020',
			'fld_eng' => '22Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10721,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '238',
			'fld_name' => '23aug2020',
			'fld_eng' => '23Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10722,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '239',
			'fld_name' => '24aug2020',
			'fld_eng' => '24Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10723,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '240',
			'fld_name' => '25aug2020',
			'fld_eng' => '25Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10724,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '241',
			'fld_name' => '26aug2020',
			'fld_eng' => '26Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10725,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '242',
			'fld_name' => '27aug2020',
			'fld_eng' => '27Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10726,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '243',
			'fld_name' => '28aug2020',
			'fld_eng' => '28Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10727,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '244',
			'fld_name' => '29aug2020',
			'fld_eng' => '29Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10728,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '245',
			'fld_name' => '30aug2020',
			'fld_eng' => '30Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10729,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '246',
			'fld_name' => '31aug2020',
			'fld_eng' => '31Aug2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10730,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '247',
			'fld_name' => '01sep2020',
			'fld_eng' => '01Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10731,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '248',
			'fld_name' => '02sep2020',
			'fld_eng' => '02Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10732,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '249',
			'fld_name' => '03sep2020',
			'fld_eng' => '03Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10733,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '250',
			'fld_name' => '04sep2020',
			'fld_eng' => '04Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10734,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '251',
			'fld_name' => '05sep2020',
			'fld_eng' => '05Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10735,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '252',
			'fld_name' => '06sep2020',
			'fld_eng' => '06Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10736,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '253',
			'fld_name' => '07sep2020',
			'fld_eng' => '07Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10737,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '254',
			'fld_name' => '08sep2020',
			'fld_eng' => '08Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10738,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '255',
			'fld_name' => '09sep2020',
			'fld_eng' => '09Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10739,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '256',
			'fld_name' => '10sep2020',
			'fld_eng' => '10Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10740,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '257',
			'fld_name' => '11sep2020',
			'fld_eng' => '11Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10741,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '258',
			'fld_name' => '12sep2020',
			'fld_eng' => '12Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10742,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '259',
			'fld_name' => '13sep2020',
			'fld_eng' => '13Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10743,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '260',
			'fld_name' => '14sep2020',
			'fld_eng' => '14Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10744,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '261',
			'fld_name' => '15sep2020',
			'fld_eng' => '15Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10745,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '262',
			'fld_name' => '16sep2020',
			'fld_eng' => '16Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10746,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '263',
			'fld_name' => '17sep2020',
			'fld_eng' => '17Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10747,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '264',
			'fld_name' => '18sep2020',
			'fld_eng' => '18Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10748,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '265',
			'fld_name' => '19sep2020',
			'fld_eng' => '19Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10749,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '266',
			'fld_name' => '20sep2020',
			'fld_eng' => '20Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10750,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '267',
			'fld_name' => '21sep2020',
			'fld_eng' => '21Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10751,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '268',
			'fld_name' => '22sep2020',
			'fld_eng' => '22Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10752,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '269',
			'fld_name' => '23sep2020',
			'fld_eng' => '23Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10753,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '270',
			'fld_name' => '24sep2020',
			'fld_eng' => '24Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10754,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '271',
			'fld_name' => '25sep2020',
			'fld_eng' => '25Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10755,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '272',
			'fld_name' => '26sep2020',
			'fld_eng' => '26Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10756,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '273',
			'fld_name' => '27sep2020',
			'fld_eng' => '27Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10757,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '274',
			'fld_name' => '28sep2020',
			'fld_eng' => '28Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10758,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '275',
			'fld_name' => '29sep2020',
			'fld_eng' => '29Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10759,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '276',
			'fld_name' => '30sep2020',
			'fld_eng' => '30Sep2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10760,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '277',
			'fld_name' => '01oct2020',
			'fld_eng' => '01Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10761,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '278',
			'fld_name' => '02oct2020',
			'fld_eng' => '02Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10762,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '279',
			'fld_name' => '03oct2020',
			'fld_eng' => '03Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10763,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '280',
			'fld_name' => '04oct2020',
			'fld_eng' => '04Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10764,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '281',
			'fld_name' => '05oct2020',
			'fld_eng' => '05Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10765,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '282',
			'fld_name' => '06oct2020',
			'fld_eng' => '06Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10766,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '283',
			'fld_name' => '07oct2020',
			'fld_eng' => '07Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10767,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '284',
			'fld_name' => '08oct2020',
			'fld_eng' => '08Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10768,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '285',
			'fld_name' => '09oct2020',
			'fld_eng' => '09Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10769,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '286',
			'fld_name' => '10oct2020',
			'fld_eng' => '10Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10770,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '287',
			'fld_name' => '11oct2020',
			'fld_eng' => '11Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10771,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '288',
			'fld_name' => '12oct2020',
			'fld_eng' => '12Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10772,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '289',
			'fld_name' => '13oct2020',
			'fld_eng' => '13Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10773,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '290',
			'fld_name' => '14oct2020',
			'fld_eng' => '14Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10774,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '291',
			'fld_name' => '15oct2020',
			'fld_eng' => '15Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10775,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '292',
			'fld_name' => '16oct2020',
			'fld_eng' => '16Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10776,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '293',
			'fld_name' => '17oct2020',
			'fld_eng' => '17Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10777,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '294',
			'fld_name' => '18oct2020',
			'fld_eng' => '18Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10778,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '295',
			'fld_name' => '19oct2020',
			'fld_eng' => '19Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10779,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '296',
			'fld_name' => '20oct2020',
			'fld_eng' => '20Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10780,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '297',
			'fld_name' => '21oct2020',
			'fld_eng' => '21Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10781,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '298',
			'fld_name' => '22oct2020',
			'fld_eng' => '22Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10782,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '299',
			'fld_name' => '23oct2020',
			'fld_eng' => '23Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10783,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '300',
			'fld_name' => '24oct2020',
			'fld_eng' => '24Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10784,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '301',
			'fld_name' => '25oct2020',
			'fld_eng' => '25Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10785,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '302',
			'fld_name' => '26oct2020',
			'fld_eng' => '26Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10786,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '303',
			'fld_name' => '27oct2020',
			'fld_eng' => '27Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10787,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '304',
			'fld_name' => '28oct2020',
			'fld_eng' => '28Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10788,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '305',
			'fld_name' => '29oct2020',
			'fld_eng' => '29Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10789,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '306',
			'fld_name' => '30oct2020',
			'fld_eng' => '30Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10790,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '307',
			'fld_name' => '31oct2020',
			'fld_eng' => '31Oct2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10791,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '308',
			'fld_name' => '01nov2020',
			'fld_eng' => '01Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10792,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '309',
			'fld_name' => '02nov2020',
			'fld_eng' => '02Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10793,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '310',
			'fld_name' => '03nov2020',
			'fld_eng' => '03Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10794,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '311',
			'fld_name' => '04nov2020',
			'fld_eng' => '04Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10795,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '312',
			'fld_name' => '05nov2020',
			'fld_eng' => '05Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10796,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '313',
			'fld_name' => '06nov2020',
			'fld_eng' => '06Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10797,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '314',
			'fld_name' => '07nov2020',
			'fld_eng' => '07Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10798,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '315',
			'fld_name' => '08nov2020',
			'fld_eng' => '08Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10799,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '316',
			'fld_name' => '09nov2020',
			'fld_eng' => '09Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10800,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '317',
			'fld_name' => '10nov2020',
			'fld_eng' => '10Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10801,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '318',
			'fld_name' => '11nov2020',
			'fld_eng' => '11Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10802,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '319',
			'fld_name' => '12nov2020',
			'fld_eng' => '12Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10803,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '320',
			'fld_name' => '13nov2020',
			'fld_eng' => '13Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10804,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '321',
			'fld_name' => '14nov2020',
			'fld_eng' => '14Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10805,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '322',
			'fld_name' => '15nov2020',
			'fld_eng' => '15Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10806,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '323',
			'fld_name' => '16nov2020',
			'fld_eng' => '16Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10807,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '324',
			'fld_name' => '17nov2020',
			'fld_eng' => '17Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10808,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '325',
			'fld_name' => '18nov2020',
			'fld_eng' => '18Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10809,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '326',
			'fld_name' => '19nov2020',
			'fld_eng' => '19Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10810,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '327',
			'fld_name' => '20nov2020',
			'fld_eng' => '20Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10811,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '328',
			'fld_name' => '21nov2020',
			'fld_eng' => '21Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10812,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '329',
			'fld_name' => '22nov2020',
			'fld_eng' => '22Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10813,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '330',
			'fld_name' => '23nov2020',
			'fld_eng' => '23Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10814,
			'fld_database' => '1',
			'fld_table' => '75',
			'fld_ord' => '331',
			'fld_name' => '24nov2020',
			'fld_eng' => '24Nov2020',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10815,
			'fld_database' => '1',
			'fld_table' => '76',
			'fld_spec_source' => '0',
			'fld_name' => 'state',
			'fld_eng' => 'State',
			'fld_desc' => 'Indicates the state or jurisdiction that this row tracks.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10816,
			'fld_database' => '1',
			'fld_table' => '76',
			'fld_ord' => '1',
			'fld_spec_source' => '0',
			'fld_name' => 'week',
			'fld_eng' => 'Week of Year',
			'fld_desc' => 'Date of data information.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_data_length' => '0',
			'fld_char_support' => ',',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10817,
			'fld_database' => '1',
			'fld_table' => '76',
			'fld_ord' => '3',
			'fld_spec_source' => '0',
			'fld_name' => 'mort_perc',
			'fld_eng' => 'Crude Mortality Rate (%)',
			'fld_desc' => 'Indicates the crude mortality rate for this jurisdiction\'s week beginning on this day.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10818,
			'fld_database' => '1',
			'fld_table' => '76',
			'fld_ord' => '4',
			'fld_spec_source' => '0',
			'fld_name' => 'mort_std_dist_us',
			'fld_eng' => 'Mortality per U.S. 2019 Age Group Standardized Million',
			'fld_desc' => 'Indicates the mortality rate per million of a U.S. 2019 Age Group Standardized distribution.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10819,
			'fld_database' => '1',
			'fld_table' => '76',
			'fld_ord' => '2',
			'fld_spec_source' => '0',
			'fld_name' => 'mortality',
			'fld_eng' => 'Raw Number of All-Cause Mortality',
			'fld_desc' => 'Indicates the officially estimated number of total deaths from all causes during this week.',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Letters,Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10820,
			'fld_database' => '1',
			'fld_table' => '76',
			'fld_ord' => '5',
			'fld_spec_source' => '0',
			'fld_name' => 'std_dist_us_avg_inc',
			'fld_eng' => 'Percentage Increase over the 2015-2019 Average Mortality per U.S. 2019 Age Group Standardized Million',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10821,
			'fld_database' => '1',
			'fld_table' => '76',
			'fld_ord' => '6',
			'fld_spec_source' => '0',
			'fld_name' => 'perc_avg_inc',
			'fld_eng' => 'Percentage Increase over the 2015-2019 Average Crude Mortality Rate',
			'fld_foreign_min' => 'N',
			'fld_foreign_max' => 'N',
			'fld_foreign2_min' => 'N',
			'fld_foreign2_max' => 'N',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0',
			'fld_char_support' => ',Numbers,Keyboard,',
			'fld_key_type' => ',',
			'fld_null_support' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10822,
			'fld_database' => '1',
			'fld_table' => '77',
			'fld_name' => 'year_month',
			'fld_eng' => 'Year-Month',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10823,
			'fld_database' => '1',
			'fld_table' => '77',
			'fld_ord' => '1',
			'fld_name' => 'unemployment_rate',
			'fld_eng' => 'Unemployment Rate (Seas, LNS14000000)',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10824,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_name' => 'year',
			'fld_eng' => 'Year',
			'fld_type' => 'INT',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '11'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10825,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '1',
			'fld_name' => 'jan',
			'fld_eng' => 'Jan',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10826,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '2',
			'fld_name' => 'feb',
			'fld_eng' => 'Feb',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10827,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '3',
			'fld_name' => 'mar',
			'fld_eng' => 'Mar',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10828,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '4',
			'fld_name' => 'apr',
			'fld_eng' => 'Apr',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10829,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '5',
			'fld_name' => 'may',
			'fld_eng' => 'May',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10830,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '6',
			'fld_name' => 'jun',
			'fld_eng' => 'Jun',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10831,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '7',
			'fld_name' => 'jul',
			'fld_eng' => 'Jul',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10832,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '8',
			'fld_name' => 'aug',
			'fld_eng' => 'Aug',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10833,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '9',
			'fld_name' => 'sep',
			'fld_eng' => 'Sep',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10834,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '10',
			'fld_name' => 'oct',
			'fld_eng' => 'Oct',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10835,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '11',
			'fld_name' => 'nov',
			'fld_eng' => 'Nov',
			'fld_data_length' => '255'
		]);
		DB::table('sl_fields')->insert([
			'fld_id' => 10836,
			'fld_database' => '1',
			'fld_table' => '78',
			'fld_ord' => '12',
			'fld_name' => 'dec',
			'fld_eng' => 'Dec',
			'fld_type' => 'DOUBLE',
			'fld_data_type' => 'Numeric',
			'fld_data_length' => '0'
		]);

	DB::table('sl_definitions')->insert([
			'def_id' => 2,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-main-bg',
			'def_description' => '#FFF'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 3,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-main-text',
			'def_description' => '#333'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 4,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-main-link',
			'def_description' => '#416CBD'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 5,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-main-grey',
			'def_description' => '#999'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 6,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-main-faint',
			'def_description' => '#EDF8FF'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 7,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-main-faintr',
			'def_description' => '#F9FCFF'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 8,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-main-on',
			'def_description' => '#2B3493'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 9,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-info-on',
			'def_description' => '#5BC0DE'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 10,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-danger-on',
			'def_description' => '#EC2327'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 11,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-success-on',
			'def_description' => '#006D36'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 12,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-warn-on',
			'def_description' => '#F0AD4E'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 1,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'font-main',
			'def_description' => 'Helvetica,Arial,sans-serif'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 17,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-nav-text',
			'def_description' => '#888'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 16,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-nav-bg',
			'def_description' => '#000'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 14,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-field-bg',
			'def_description' => '#FFF'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 15,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-form-text',
			'def_description' => '#333'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 13,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-line-hr',
			'def_description' => '#999'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 41,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'twitter'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 43,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'show-logo-title',
			'def_description' => '0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 44,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'users-create-db',
			'def_description' => '0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 45,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'user-name-req',
			'def_description' => '0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 46,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'has-partners',
			'def_description' => '0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 47,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'has-volunteers',
			'def_description' => '0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 48,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'has-avatars',
			'def_description' => '/buckystats/uploads/avatar-shell.jpg'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 49,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'has-canada',
			'def_description' => '0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 50,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'parent-company',
			'def_description' => 'Rockhopper Software Designs'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 51,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'parent-website',
			'def_description' => 'https://rockhopsoft.com'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 52,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'login-instruct'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 54,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'app-license',
			'def_description' => 'Creative Commons Attribution-ShareAlike License'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 55,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'app-license-url',
			'def_description' => 'http://creativecommons.org/licenses/by-sa/3.0/'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 56,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'app-license-img',
			'def_description' => '/survloop/uploads/creative-commons-by-sa-88x31.png'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 57,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'app-license-snc',
			'def_description' => '2021'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 53,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'signup-instruct'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 19,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'site-name',
			'def_description' => 'Bucky Stats'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 33,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'spinner-code',
			'def_description' => '<div><img src="/buckystats/uploads/buckystats-loading.gif" class="spinningDome"></div>'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 18,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'app-url',
			'def_description' => 'http://buckystats.local'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 20,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'cust-abbr',
			'def_description' => 'BuckyStats'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 21,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'cust-vend',
			'def_description' => 'RockHopSoft'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 22,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'cust-package',
			'def_description' => 'rockhopsoft/buckystats'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 23,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'logo-url',
			'def_description' => '/'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 24,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'app-root-path',
			'def_description' => '/code/buckystats'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 26,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'meta-desc',
			'def_description' => 'Tracking some data points of a world whose organization is far too dominated by earlier grunches of giants. Inspired by Buckminster Fuller\'s ideas of immense data dashboards used to inform world leaders. If our governments are truly representative, then we all need powerful access to actionable data for evidence-based decisions.'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 32,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'shortcut-icon',
			'def_description' => '/buckystats/uploads/buckystats-ico.png'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 31,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'logo-img-sm',
			'def_description' => '/buckystats/uploads/buckystats.jpg'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 30,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'logo-img-md',
			'def_description' => '/buckystats/uploads/buckystats.jpg'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 28,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'meta-img',
			'def_description' => '/buckystats/uploads/meta-image.jpg'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 25,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'meta-title',
			'def_description' => 'Bucky Stats - Data Graphs for Co-Pilots of Spaceship Earth'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 27,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'meta-keywords',
			'def_description' => 'Bucky Stats, Morgan Lesko, Wiki World Order, Rockhopper Software Designs, Buckminster Fuller, datasets, statistics, charts, graphs, public health, military, wars, prisons, war on drugs, United States, spaceship earth'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 29,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'logo-img-lrg',
			'def_description' => '/buckystats/uploads/buckystats.jpg'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 58,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'css-extra-files'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 59,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'header-code',
			'def_description' => '<!-- Anything -->'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 60,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'sys-cust-js',
			'def_description' => 'function graphFormSpinner() {
  if (document.getElementById("hidivGraphCustomize")) {
    document.getElementById("hidivGraphCustomize").innerHTML=\'<div id="spinnerDomeWrap"><div class="pull-left"><img src="/buckystats/uploads/buckystats-loading.gif" id="spinningDomeGraph" class="opac90"></div><div class="pull-left opac90"><div class="spinningDomeText"><i>Updating Graph...</i></div></div></div>\';
    animateSpinBG();
  }
}
function animateSpinBG() {
  setTimeout("animateSpinBGmove(0, 0)", 100);
}
function animateSpinBGmove(cnt) {
  if (document.getElementById("spinnerDomeWrap") && cnt < 800) {
    cnt++;
    var newY=(-1)*cnt;
    var newX=(-1)*(Math.round(cnt/5));
    document.getElementById("spinnerDomeWrap").style.backgroundPosition=""+newX+"px "+newY+"px";
    setTimeout("animateSpinBGmove("+cnt+")", 33);
  }
}'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 61,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'sys-cust-ajax',
			'def_description' => 'function printCopyConfirmation(text) {
  console.log("printCopyConfirmation("+text);
  if (document.getElementById("copyConfirmation")) {
    document.getElementById("copyConfirmation").innerHTML=text;
    $("#copyConfirmation").fadeIn(150);
    setTimeout(function() { $("#copyConfirmation").fadeOut(3000); }, 3000);
  }
}
$(document).on("click", "#copyBtnGraphLinkHtml", function() {
  copyInputClipboard("copyGraphLinkHtml");
  printCopyConfirmation("Link Copied To Clipboard");
});
$(document).on("click", "#copyBtnGraphEmbedHtml", function() {
  copyInputClipboard("copyGraphEmbedHtml");
  printCopyConfirmation("Embed HTML Copied To Clipboard");
});'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 62,
			'def_database' => '1',
			'def_set' => 'User Roles',
			'def_subset' => 'administrator',
			'def_value' => 'Administrator',
			'def_description' => 'Highest system administrative privileges, can add, remove, and change permissions of other users'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 63,
			'def_database' => '1',
			'def_set' => 'User Roles',
			'def_subset' => 'databaser',
			'def_order' => '1',
			'def_value' => 'Database Designer',
			'def_description' => 'Permissions to make edits in the database designing tools'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 64,
			'def_database' => '1',
			'def_set' => 'User Roles',
			'def_subset' => 'staff',
			'def_order' => '2',
			'def_value' => 'Staff/Analyst',
			'def_description' => 'Full staff priveleges, can view but not edit technical specs'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 65,
			'def_database' => '1',
			'def_set' => 'User Roles',
			'def_subset' => 'partner',
			'def_order' => '3',
			'def_value' => 'Partner Member',
			'def_description' => 'Basic permission to pages and tools just for partners'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 66,
			'def_database' => '1',
			'def_set' => 'User Roles',
			'def_subset' => 'volunteer',
			'def_order' => '4',
			'def_value' => 'Volunteer',
			'def_description' => 'Basic permission to pages and tools just for volunteers'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 67,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-nav-logo',
			'def_description' => '#FFF'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 68,
			'def_database' => '1',
			'def_set' => 'Style CSS',
			'def_subset' => 'main',
			'def_description' => 'body { overflow-x: auto; }
#topNavSearchBtn, #loginLnk, #signupLnk { display: none; }
#footerLinks {
  text-align: center;
  background: #fff;
  padding: 30px;
  color: #333;
  border-top: 1px #33ff06 solid;
}
#footerNav a:link, #footerNav a:visited, #footerNav a:active, #footerNav a:hover {
  display: block;
  padding-top: 5px;
  padding-bottom: 5px;
  margin-bottom: 3px;
}
.spinningDome {
  max-width: 150px;
  -moz-border-radius: 75px; border-radius: 75px;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
#popGraphStateID, #popGraphGroupsID, #popGraphTimescaleID {
    padding-right: 40px;
    background: #FFF url(/survloop/uploads/caret-down.png) 97% center no-repeat !important;
}
#spinnerDomeWrap {
  width: 100%;
  color: #fff;
  padding: 5px;
  height: 100%;
  min-height: 270px;
  background: #000 url(/buckystats/uploads/bg-1.jpg);
  background-position: 0px 0px;
  overflow: visible;
}
#spinningDomeGraph {
  height: 200px;
  max-height: 200px;
  margin-left: 30px;
  margin-top: 5px;
  -moz-border-radius: 40px; border-radius: 40px;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 24px 25px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
.spinningDomeText, .spinningDomeText2 {
  color: #fff;
  font-size: 16px;
  background: #000;
  padding: 10px 30px;
  margin-left: 30px;
  margin-top: 5px;
  -moz-border-radius: 20px; border-radius: 20px;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 24px 25px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
.spinningDomeText2 {
  font-size: 22px;
  font-weight: bold;
}
.embedGraph, .embedGraphBig {
  display: block;
  width: 100%;
  height: 400px;
  min-height: 400px;
}
.embedGraphBig {
  height: 650px;
  min-height: 650px;
}
.embedGraphSpin {
  display: block;
  width: 100%;
  height: 339px;
  text-align: center;
  padding-top: 150px;
  border: 1px #999 dashed;
}
#hidivGraphShare, #hidivGraphCustomize {
  width: 100%;
  overflow: visible;
  border: 1px #999 solid;
  -moz-border-radius: 5px; border-radius: 5px;
}
#hidivGraphCustomize {
  min-height: 100px;
}
#copyConfirmation {
  display: none;
  padding: 5px;
  border: 1px #999 dashed;
  -moz-border-radius: 5px; border-radius: 5px;
}

@media screen and (max-width: 768px) {

#spinnerDomeWrap {
  min-height: 200px;
}
#spinningDomeGraph {
  height: 140px;
  max-height: 140px;
  margin-left: 10px;
  -moz-border-radius: 20px; border-radius: 20px;
}
.spinningDomeText {
  padding: 5px 10px;
}
.spinningDomeText2 {
  font-size: 18px;
}

}'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 69,
			'def_database' => '1',
			'def_set' => 'Style CSS',
			'def_subset' => 'email'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 70,
			'def_database' => '1',
			'def_set' => 'Tree Settings',
			'def_subset' => 'tree-0-protip',
			'def_description' => 'All our data are belong!'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 71,
			'def_database' => '1',
			'def_set' => 'Tree Settings',
			'def_subset' => 'tree-0-protipimg'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 72,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'has-usernames',
			'def_description' => '0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 73,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'req-mfa-users',
			'def_description' => '0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 74,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'req-mfa-volunteers',
			'def_description' => '0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 75,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'req-mfa-partners',
			'def_description' => '0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 76,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'req-mfa-staff',
			'def_description' => '1'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 77,
			'def_database' => '1',
			'def_set' => 'System Settings',
			'def_subset' => 'req-mfa-admin',
			'def_description' => '1'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 78,
			'def_database' => '1',
			'def_set' => 'Blurbs',
			'def_subset' => 'Footer',
			'def_order' => '3',
			'def_description' => '<div id="footerLinks"><center><div class="container">

<div class="row mB30">
    <div id="footerNav" class="col-md-8 pT30 taL">
      <a href="/">Bucky Stats Home: All Data Lines and Report Links</a>
      <a href="/one/US/years">One Graph with Multiple Jurisdictions and Data Lines</a>
      <a href="/all-states/US/years">One Graph for Each Jurisdiction</a>
      <a href="/all-lines/US/years">One Graph for Each Data Line</a>
      <a href="/covid-response-all-states-daily">Daily COVID Government Responses</a>
      <a href="/covid-govt-response">2020 Overall COVID Government Responses</a>
      <a href="/about">About & Donate</a>
      <div class="mT15">
      <a href="https://github.com/rockhopsoft/buckystats" target="_blank"><div class="fL mR10" style="font-size: 42px;"><i class="fa fa-github" aria-hidden="true"></i></div> <div class="fL mR10">View this work in progress <nobr>on GitHub</nobr></div></a>
      <div class="fC"></div>
      </div>
    </div>
    <div class="col-md-4 pT30 taL">
      <a href="/about" target="_blank">
        <div class="slGrey">
        <h5 class="m0"><a href="/">Bucky Stats</a></h5>was built by Morgan Lesko,<br />where his two core projects overlap:
        </div>
      </a>
      <a href="https://rockhopsoft.com" target="_blank"
        ><img src="/buckystats/uploads/rockhopsoft-logo-sm.png"
          style="height: 50px;" alt="Rockhopper Software Designs logo"></a>
      <div class="slGrey pL5 mTn3">and</div>
      <a href="/about" target="_blank"><div class="w100">
        <div class="fL pR15">
          <img src="/buckystats/uploads/profile-picture-burst-sm.png"
            style="height: 34px;" alt="Wiki World Order logo">
        </div>
        <div class="fL pR15 slBlueDark" style="font-size: 24px;">Wiki World Order</div>
        <div class="fC"></div>
      </div></a>
      <div class="w100 mT5">
        <a href="http://creativecommons.org/licenses/by-sa/3.0/" target="_blank"
          ><span class="slGrey"><nobr>2021 <i class="fa fa-creative-commons mL3 mR3" aria-hidden="true"></i></nobr>
          <nobr>Creative Commons</nobr></span></a>
      </div>
    </div>
</div>

</div></center></div>'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 124,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-6',
			'def_description' => '#d8856b'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 134,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-16',
			'def_description' => '#d6d6d6'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 133,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-15',
			'def_description' => '#f0cce0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 132,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-14',
			'def_description' => '#e4c5b7'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 131,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-13',
			'def_description' => '#ddc1db'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 130,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-12',
			'def_description' => '#f5d9be'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 129,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-11',
			'def_description' => '#c4dbef'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 128,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-10',
			'def_description' => '#dfe8b8'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 127,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-9',
			'def_description' => '#f6bdba'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 126,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-8',
			'def_description' => '#858585'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 125,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-7',
			'def_description' => '#e095c0'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 123,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-5',
			'def_description' => '#af7db9'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 122,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-4',
			'def_description' => '#fcb56d'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 121,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-3',
			'def_description' => '#6aabdc'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 120,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-2',
			'def_description' => '#89cb7d'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 119,
			'def_database' => '1',
			'def_set' => 'Style Settings',
			'def_subset' => 'color-graph-1',
			'def_description' => '#f67172'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 135,
			'def_database' => '1',
			'def_subset' => 'Contact Reasons',
			'def_value' => 'General Feedback'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 136,
			'def_database' => '1',
			'def_subset' => 'Contact Reasons',
			'def_order' => '1',
			'def_value' => 'Website Problems'
		]);
		DB::table('sl_definitions')->insert([
			'def_id' => 137,
			'def_database' => '1',
			'def_subset' => 'Contact Reasons',
			'def_order' => '2',
			'def_value' => 'Networking Opportunities'
		]);


	DB::table('sl_tree')->insert([
			'tree_id' => 67,
			'tree_database' => '1',
			'tree_user' => '0',
			'tree_type' => 'Page',
			'tree_name' => 'Dashboard',
			'tree_slug' => 'dashboard',
			'tree_root' => '161',
			'tree_opts' => '21'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 68,
			'tree_database' => '1',
			'tree_user' => '0',
			'tree_type' => 'Page',
			'tree_name' => 'Bucky Stats — Data Graphs for Co-Pilots of Spaceship Earth',
			'tree_slug' => 'home',
			'tree_root' => '163',
			'tree_first_page' => '163',
			'tree_last_page' => '163',
			'tree_opts' => '7'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 69,
			'tree_database' => '1',
			'tree_user' => '0',
			'tree_type' => 'Page',
			'tree_name' => 'Admin Search',
			'tree_slug' => 'search',
			'tree_root' => '165',
			'tree_opts' => '93'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 70,
			'tree_database' => '1',
			'tree_user' => '0',
			'tree_type' => 'Page',
			'tree_name' => 'Search',
			'tree_slug' => 'search',
			'tree_root' => '167',
			'tree_opts' => '31'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 71,
			'tree_database' => '1',
			'tree_user' => '0',
			'tree_type' => 'Page',
			'tree_name' => 'Staff Dashboard',
			'tree_slug' => 'staff-dashboard',
			'tree_root' => '169',
			'tree_opts' => '301'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 72,
			'tree_database' => '1',
			'tree_user' => '0',
			'tree_type' => 'Page',
			'tree_name' => 'Partner Dashboard',
			'tree_slug' => 'partner-dashboard',
			'tree_root' => '171',
			'tree_opts' => '287'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 73,
			'tree_database' => '1',
			'tree_user' => '0',
			'tree_type' => 'Page',
			'tree_name' => 'Volunteer Dashboard',
			'tree_slug' => 'volunteer-dashboard',
			'tree_root' => '173',
			'tree_opts' => '119'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 77,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'My Profile',
			'tree_slug' => 'my-profile',
			'tree_root' => '181',
			'tree_opts' => '23'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 76,
			'tree_database' => '1',
			'tree_user' => '0',
			'tree_type' => 'Page',
			'tree_name' => 'Volunteer Search',
			'tree_slug' => 'volunteer-search',
			'tree_root' => '179',
			'tree_opts' => '527'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 75,
			'tree_database' => '1',
			'tree_user' => '0',
			'tree_type' => 'Page',
			'tree_name' => 'Partner Search',
			'tree_slug' => 'partner-search',
			'tree_root' => '177',
			'tree_opts' => '1271'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 74,
			'tree_database' => '1',
			'tree_user' => '0',
			'tree_type' => 'Page',
			'tree_name' => 'Staff Search',
			'tree_slug' => 'staff-search',
			'tree_root' => '175',
			'tree_opts' => '1333'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Survey',
			'tree_name' => 'Add A Dataset',
			'tree_desc' => 'All of the datasets collected by this website.',
			'tree_slug' => 'add-dataset',
			'tree_root' => '1096',
			'tree_first_page' => '1097',
			'tree_last_page' => '1097',
			'tree_core_table' => '55',
			'tree_opts' => '3'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1508,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'Population Datasets',
			'tree_slug' => 'population-datasets',
			'tree_root' => '3077',
			'tree_first_page' => '3077',
			'tree_last_page' => '3077',
			'tree_opts' => '39'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1509,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'United States: One Jurisdiction At A Time',
			'tree_slug' => 'us-one',
			'tree_root' => '3088',
			'tree_first_page' => '3088',
			'tree_last_page' => '3088',
			'tree_core_table' => '55',
			'tree_opts' => '13'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1510,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'United States: Compare Multiple Jurisdictions',
			'tree_slug' => 'us-multi',
			'tree_root' => '3094',
			'tree_first_page' => '3094',
			'tree_last_page' => '3094',
			'tree_opts' => '13'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1511,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'Contact Form',
			'tree_slug' => 'contact',
			'tree_root' => '3105',
			'tree_first_page' => '3105',
			'tree_last_page' => '3105',
			'tree_opts' => '19'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1512,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'About',
			'tree_slug' => 'about',
			'tree_root' => '3112',
			'tree_first_page' => '3112',
			'tree_last_page' => '3112'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1513,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'One Graph For Each Data Line',
			'tree_slug' => 'graph-all-data-lines',
			'tree_root' => '3121',
			'tree_first_page' => '3121',
			'tree_last_page' => '3121',
			'tree_opts' => '13'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1514,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'COVID-19 Government Response Data',
			'tree_slug' => 'covid-govt-response',
			'tree_root' => '3130',
			'tree_first_page' => '3130',
			'tree_last_page' => '3130',
			'tree_opts' => '13'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1515,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'COVID-19 Government Response Weekly Data for All States',
			'tree_slug' => 'covid-response-all-states-weekly',
			'tree_root' => '3133',
			'tree_first_page' => '3133',
			'tree_last_page' => '3133',
			'tree_opts' => '13'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1516,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'Maryland Executive Branch Information Request',
			'tree_slug' => 'maryland-exec-information-request',
			'tree_root' => '3136',
			'tree_first_page' => '3136',
			'tree_last_page' => '3136'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1517,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'COVID-19 Government Response Daily Data for All States',
			'tree_slug' => 'covid-response-all-states-daily',
			'tree_root' => '3139',
			'tree_first_page' => '3139',
			'tree_last_page' => '3139',
			'tree_opts' => '13'
		]);
		DB::table('sl_tree')->insert([
			'tree_id' => 1518,
			'tree_database' => '1',
			'tree_user' => '1',
			'tree_type' => 'Page',
			'tree_name' => 'United States: Graph All 50 States',
			'tree_slug' => 'us-all',
			'tree_root' => '3142',
			'tree_first_page' => '3142',
			'tree_last_page' => '3142',
			'tree_opts' => '13'
		]);









	DB::table('sl_data_links')->insert([
			'data_link_id' => 1,
			'data_link_tree' => '1',
			'data_link_table' => '56'
		]);
		DB::table('sl_data_links')->insert([
			'data_link_id' => 2,
			'data_link_tree' => '1',
			'data_link_table' => '59'
		]);
		DB::table('sl_data_links')->insert([
			'data_link_id' => 3,
			'data_link_tree' => '1',
			'data_link_table' => '61'
		]);

	DB::table('sl_images')->insert([
			'img_id' => 1,
			'img_database_id' => '1',
			'img_user_id' => '1',
			'img_file_loc' => 'profile-picture-burst.png',
			'img_full_filename' => '/buckystats/uploads/profile-picture-burst.png',
			'img_node_id' => '-3',
			'img_type' => 'png',
			'img_file_size' => '399648',
			'img_width' => '512',
			'img_height' => '512'
		]);
		DB::table('sl_images')->insert([
			'img_id' => 2,
			'img_database_id' => '1',
			'img_user_id' => '1',
			'img_file_loc' => 'science-society.jpeg',
			'img_full_filename' => '/buckystats/uploads/science-society.jpeg',
			'img_node_id' => '-3',
			'img_type' => 'jpg',
			'img_file_size' => '38818',
			'img_width' => '571',
			'img_height' => '468'
		]);
		DB::table('sl_images')->insert([
			'img_id' => 3,
			'img_database_id' => '1',
			'img_user_id' => '1',
			'img_file_loc' => 'morgan-professional.jpg',
			'img_full_filename' => '/buckystats/uploads/morgan-professional.jpg',
			'img_node_id' => '-3',
			'img_type' => 'jpg',
			'img_file_size' => '1282033',
			'img_width' => '1500',
			'img_height' => '2000'
		]);


 } }