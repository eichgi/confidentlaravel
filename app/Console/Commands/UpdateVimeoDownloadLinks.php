<?php

namespace App\Console\Commands;

use App\Video;
use Illuminate\Console\Command;
use Vimeo\Laravel\Facades\Vimeo;

class UpdateVimeoDownloadLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'videos:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update video download links';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $videos = Video::all();

        foreach ($videos as $video) {
            $data = Vimeo::request('/videos/' . $video->vimeo_id);

            if (!isset($data['body']['download'])) {
                echo 'Failed to retrieve data for video: ', $video->vimeo_id;
                continue;
            }

            $download_links = collect($data['body']['download']);

            $hd = $download_links->where('quality', 'hd')->sortByDesc('width')->first();
            if ($hd) {
                $video->vimeo_hd_download_url = $hd['link'];
            }

            $sd = $download_links->where('quality', 'sd')->sortByDesc('width')->first();
            if ($sd) {
                $video->vimeo_sd_download_url = $sd['link'];
            }

            $video->save();
        }
    }
}
