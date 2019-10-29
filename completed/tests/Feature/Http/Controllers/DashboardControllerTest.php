<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use App\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_retrieves_the_last_watched_video()
    {
        $video = factory(Video::class)->create();
        $user = factory(User::class)->create([
            'last_viewed_video_id' => $video->id
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('videos.show');
        $response->assertViewHas('now_playing', $video);
    }

    /**
     * @test
     */
    public function it_defaults_last_video_for_a_new_user()
    {
        $video = factory(Video::class)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('videos.show');
        $response->assertViewHas('now_playing', $video);

        $user->refresh();
        $this->assertEquals($video->id, $user->last_viewed_video_id);
    }


}
