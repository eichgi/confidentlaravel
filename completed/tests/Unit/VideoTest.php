<?php

namespace Tests\Unit;

use App\Video;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @dataProvider hasDownloadDataProvider
     */
    public function hasDownload($id, $expected)
    {
        $video = factory(Video::class)->make();

        $video->id = $id;
        $this->assertSame($expected, $video->hasDownload());
    }

    /**
     * @test
     */
    public function it_orders_by_ordinal()
    {
        factory(Video::class)->create([
            'ordinal' => 90
        ]);
        factory(Video::class)->create([
            'ordinal' => 1
        ]);
        factory(Video::class)->create([
            'ordinal' => 42
        ]);

        $videos = Video::all();

        $this->assertEquals([1, 42, 90], $videos->pluck('ordinal')->toArray());
    }

    public function hasDownloadDataProvider()
    {
        return [
            [null, false],
            [1, false],
            [8, true],
            [9, true],
        ];
    }
}
