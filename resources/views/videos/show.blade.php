@extends('layouts.dashboard')

@section('content')

        <div class="max-w-4xl sm:mx-auto px-8">
            <figure class="embed-container">
                <iframe id="video-player" data-video-id="{{ $now_playing->id }}" src="https://player.vimeo.com/video/{{ $now_playing->vimeo_id }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </figure>


            <div class="lg:flex mt-8">
                <div class="text-right lg:w-3/12 lg:order-last">
                    <div class="inline-block lg:block">
                        <button data-video-id="{{ $now_playing->id }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-5 h-5 mr-2 icon-check">
                                <circle cx="12" cy="12" r="10" class="primary" />
                                <path class="secondary text-gray-300" d="M10 14.59l6.3-6.3a1 1 0 0 1 1.4 1.42l-7 7a1 1 0 0 1-1.4 0l-3-3a1 1 0 0 1 1.4-1.42l2.3 2.3z" />
                            </svg>
                            <span>Mark Complete</span>
                        </button>
                    </div>

                    @if ($now_playing->hasDownload())
                    <div class="inline-block ml-3 lg:ml-0 lg:pt-3 lg:block">
                        <a href="{{ asset('/code/confident-laravel.zip') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-code fill-current w-6 h-6 mr-1">
                                <path class="secondary" d="M8.7 13.3a1 1 0 0 1-1.4 1.4l-2-2a1 1 0 0 1 0-1.4l2-2a1 1 0 1 1 1.4 1.4L7.42 12l1.3 1.3zm6.6 0l1.29-1.3-1.3-1.3a1 1 0 1 1 1.42-1.4l2 2a1 1 0 0 1 0 1.4l-2 2a1 1 0 0 1-1.42-1.4zm-3.32 3.9a1 1 0 0 1-1.96-.4l2-10a1 1 0 0 1 1.96.4l-2 10z" />
                            </svg>
                            <span>Download Code</span> </a>
                    </div>
                    @endif

                    <div class="inline-block ml-3 lg:ml-0 lg:pt-3 lg:block">
                        <a href="{{ $now_playing->vimeo_sd_download_url }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                            </svg>
                            <span>Download SD</span> </a>
                    </div>

                    <div class="inline-block ml-3 lg:ml-0 lg:pt-3 lg:block">
                        <a href="{{ $now_playing->vimeo_hd_download_url }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                            </svg>
                            <span>Download HD</span> </a>
                    </div>
                </div>

                <div class="lg:w-9/12">
                    <h3 class="text-gray-900 text-xl">{{ $now_playing->heading }}</h3>
                    <p class="text-gray-600">The summary of the video should go here...</p>
                </div>
            </div>
        </div>


@endsection