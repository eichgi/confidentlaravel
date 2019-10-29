<div class="lg:block lg:h-full lg:flex lg:flex-col lg:justify-between hidden">
    <nav class="md:flex lg:block lg:overflow-y-auto">

        @foreach($lessons as $lesson)
            @php
                $current_lesson = $videos[$lesson->id]->contains('id', $now_playing->id);
            @endphp
            <details @if($current_lesson)open="open"@endif>
                <summary
                        @if($videos[$lesson->id]->pluck('id')->diff($watched)->isEmpty())
                        class="relative border-l-2 border-green-300 outline-none px-4 pl-3 py-3 transition-fast relative block text-gray-300 font-medium"
                        @elseif($current_lesson)
                        class="relative border-l-2 border-yellow-500 outline-none px-4 pl-3 py-3 transition-fast relative block text-gray-300 font-medium"
                        @else
                        class="relative outline-none px-4 py-3 transition-fast relative block hover:translate-r-2px hover:text-gray-300 text-gray-500 font-medium"
                        @endif
                >{{ $lesson->name }} @cannot('access', $lesson)<span class="absolute right-0 top-0 block rounded-full bg-yellow-400 text-yellow-900 uppercase px-2 py-1 mr-3 mt-3 text-tiny font-bold">{{ Gate::allows('video-course') ? 'Upgrade' : 'Buy' }}</span>@endif</summary>

                <div class="bg-gray-900">
                    @foreach($videos[$lesson->id] as $video)
                        @can('access', $lesson)
                        <a href="{{ route('videos.show', $video->id) }}"
                            @if($video->id === $now_playing->id)
                           class="border-l-2 border-yellow-500 block px-6 py-2 text-sm font-semibold bg-gray-700 text-white"
                            @elseif($watched->contains($video->id))
                           class="border-l-2 border-green-300 block px-6 pl-5 py-2 text-sm font-semibold text-gray-700 hover:text-gray-500"
                            @else
                           class="border-l-2 border-gray-700 block px-6 py-2 text-sm font-semibold text-gray-500 hover:text-white"
                            @endif
                        >{{ $video->title }}</a>
                        @else
                        <span class="border-l-2 border-gray-700 block px-6 py-2 text-sm font-semibold text-gray-700">{{ $video->title }}</span>
                        @endif
                    @endforeach
                </div>
            </details>
        @endforeach
    </nav>

    @if (Gate::allows('upgrade'))
    <div class="bg-gray-900 px-4 py-4 sm:text-right">
        <button class="block w-full sm:w-auto sm:inline-block bg-teal-200 hover:bg-teal-300 font-semibold text-green-900 px-4 py-2 rounded-lg lg:block lg:w-full">{{ Gate::allows('video-course') ? 'Upgrade' : 'Purchase' }} Package</button>
    </div>
    @endif
</div>