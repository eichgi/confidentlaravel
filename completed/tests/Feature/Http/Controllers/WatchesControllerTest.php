<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use App\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class WatchesControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function store_returns_a_204()
    {
        $user = factory(User::class)->create();
        $video = factory(Video::class)->create();

        $event = Event::fake();

        $response = $this->actingAs($user)
            ->post(route('watches.store'), [
                'user_id' => $user->id,
                'video_id' => $video->id
            ]);

        $response->assertStatus(204);

        $event->assertDispatched('video.watched', function ($event, $arguments) use ($user, $video) {
            $this->assertEquals([$user, $video->id], $arguments, 'The arguments passed to the [' . $event . '] event were unexpected');

            return true;
        });

        $this->assertDatabaseHas('watches', [
            'user_id' => $user->id,
            'video_id' => $video->id
        ]);
    }
}
