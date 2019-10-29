<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordinal = 1;

        DB::table('videos')->insert([
            'title' => 'It\'s about confidence',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 1,
            'heading' => 'Confident Laravel - Course Introduction'
        ]);

        DB::table('videos')->insert([
            'title' => 'PHPUnit overview',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 1,
            'heading' => 'Start Testing - PHPUnit overview'
        ]);

        DB::table('videos')->insert([
            'title' => 'HTTP Tests',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 1,
            'heading' => 'Start Testing - HTTP Tests'
        ]);

        DB::table('videos')->insert([
            'title' => 'Customizing the structure',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 1,
            'heading' => 'Start Testing - Customizing the structure'
        ]);

        DB::table('videos')->insert([
            'title' => 'Laravel Dusk',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 1,
            'heading' => 'Start Testing - Laravel Dusk'
        ]);

        DB::table('videos')->insert([
            'title' => 'Generating tests',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 1,
            'heading' => 'Start Testing - Generating tests'
        ]);

        DB::table('videos')->insert([
            'title' => 'Where to start',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 1,
            'heading' => 'Start Testing - Where to start?'
        ]);

        DB::table('videos')->insert([
            'title' => 'Summary',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 1,
            'heading' => 'Start Testing - Summary'
        ]);

        $ordinal = 1;

        DB::table('videos')->insert([
            'title' => 'Writing the first test',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 2,
            'heading' => 'Testing Application Code - Writing the first test'
        ]);

        DB::table('videos')->insert([
            'title' => 'Setting up application data',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 2,
            'heading' => 'Testing Application Code - Setting up application data'
        ]);

        DB::table('videos')->insert([
            'title' => 'Testing multiple paths',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 2,
            'heading' => 'Testing Application Code - Testing multiple paths'
        ]);

        DB::table('videos')->insert([
            'title' => 'Dealing with authentication',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 2,
            'heading' => 'Testing Application Code - Dealing with authentication'
        ]);

        DB::table('videos')->insert([
            'title' => 'Interacting with the database',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 2,
            'heading' => 'Testing Application Code - Interacting with the database'
        ]);

        DB::table('videos')->insert([
            'title' => 'Handling form validation',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 2,
            'heading' => 'Testing Application Code - Handling form validation'
        ]);

        DB::table('videos')->insert([
            'title' => 'Summary',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 2,
            'heading' => 'Testing Application Code - Summary'
        ]);

        $ordinal = 1;

        DB::table('videos')->insert([
            'title' => 'Understanding test doubles',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 3,
            'heading' => 'Testing integrations - Understanding test doubles'
        ]);

        DB::table('videos')->insert([
            'title' => 'Swapping Facades',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 3,
            'heading' => 'Testing integrations - Swapping Facades'
        ]);

        DB::table('videos')->insert([
            'title' => 'Faking shared Facades',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 3,
            'heading' => 'Testing integrations - Faking shared Facades'
        ]);

        DB::table('videos')->insert([
            'title' => 'Mocking your custom classes',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 3,
            'heading' => 'Testing integrations - Mocking your custom classes'
        ]);

        DB::table('videos')->insert([
            'title' => 'Pushing code to the boundary',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 3,
            'heading' => 'Testing integrations - Pushing code to the boundary'
        ]);

        DB::table('videos')->insert([
            'title' => 'Refactoring through tests',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 3,
            'heading' => 'Testing integrations - Refactoring through tests'
        ]);

        DB::table('videos')->insert([
            'title' => 'Using a real integration test',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 3,
            'heading' => 'Testing integrations - Using a real integration test'
        ]);

        DB::table('videos')->insert([
            'title' => 'Summary',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 3,
            'heading' => 'Testing integrations - Summary'
        ]);

        $ordinal = 1;

        DB::table('videos')->insert([
            'title' => 'Unit testing validation',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 4,
            'heading' => 'Testing Additional Classes - Unit testing validation'
        ]);

        DB::table('videos')->insert([
            'title' => 'Running a coverage report',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 4,
            'heading' => 'Testing Additional Classes - Running a coverage report'
        ]);

        DB::table('videos')->insert([
            'title' => 'Testing Console Commands',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 4,
            'heading' => 'Testing Additional Classes - Testing Console Commands'
        ]);

        DB::table('videos')->insert([
            'title' => 'Testing Events',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 4,
            'heading' => 'Testing Additional Classes - Testing Events'
        ]);

        DB::table('videos')->insert([
            'title' => 'Testing Container Bindings',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 4,
            'heading' => 'Testing Additional Classes - Testing Container Bindings'
        ]);

        DB::table('videos')->insert([
            'title' => 'Testing Models',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 4,
            'heading' => 'Testing Additional Classes - Testing Models'
        ]);

        DB::table('videos')->insert([
            'title' => 'Testing Views',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 4,
            'heading' => 'Testing Additional Classes - Testing Views'
        ]);

        DB::table('videos')->insert([
            'title' => 'Summary',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 4,
            'heading' => 'Testing Additional Classes - Summary'
        ]);

        DB::table('videos')->insert([
            'title' => 'Keep Testing',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 4,
            'heading' => 'Confident Laravel - Course Afterward'
        ]);

        $ordinal = 1;

        DB::table('videos')->insert([
            'title' => 'Video 1',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 5,
            'heading' => 'Bonus Video - Video 1'
        ]);

        $ordinal = 1;

        DB::table('videos')->insert([
            'title' => 'August 27, 2019',
            'vimeo_id' => 196220914,
            'ordinal' => $ordinal++,
            'lesson_id' => 6,
            'heading' => 'Group Q&A Calls - August 27, 2019'
        ]);

    }
}
