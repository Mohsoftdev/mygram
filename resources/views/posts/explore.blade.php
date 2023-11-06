<x-app-layout>
    <div class="grid grid-cols-3 gap-0 md:gap-4 mt-5 px-3 pb-5 mb-5">
        @foreach($posts as $post)
            <div>
                <a href="/p/{{$post->slug}}" class="">
                    <img src="{{asset('storage/'.$post->image)}}" alt="{{$post->description}}" class="w-full aspect-square object-cover">
                </a>
            </div>
        @endforeach
    </div>
    <div class="mt-5">
        {{ $posts->links() }}
    </div>
</x-app-layout>
