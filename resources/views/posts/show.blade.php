<x-app-layout>
    <div class="h-screen md:flex md:flex-row border-2 rounded-2xl">
        <!-- left-side -->
        <div class="h-full items-center md:w-7/12 overflow-hidden rounded-l-2xl flex bg-black">
            <img src="{{ asset('storage/'.$post->image) }}" alt="{{$post->description}}" class="h-auto w-full">
        </div>
        <!-- right-side -->
        <div class="flex w-full flex-col bg-white  rounded-r-2xl md:w-5/12">
            <!-- Top -->
            <div class="border-b-2">
                <div class="flex items-center p-5">
                    <img src="{{asset('storage/' .$post->user->image)}}" alt="" class="me-5
                    rounded-full h-10 w-10">
                    <div class="grow">
                        <a href="/{{$post->user->username}}" class="text-bold">{{$post->user->username}}</a>
                    </div>
                    @if($post->user_id === auth()->id())
                        <a href="/p/{{$post->slug}}/edit"><i class="bx bx-message-square-edit text-xl"></i></a>
                        <form action="/p/{{$post->slug}}/delete" method="POST">
                            @csrf
                            <button type="submit">
                                <i class="bx bx-message-square-x text-xl ms-2 text-red-600"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <!-- Middle -->
            <div class="flex flex-col grow overflow-y-auto">
                <div class="flex items-center p-5">
                    <img src="{{asset('storage/' .$post->user->image)}}" class="me-5 h-10 w-10 rounded-full">
                    <div>
                        <a href="{{ $post->user->username }}" class="font-bold">{{ $post->user->username }}</a>
                        {{ $post->description }}
                    </div>
                </div>
                <!-- comments -->
                <div>
                @foreach($post->comments as $comment)
                        <div class="flex items-center px-5 py-1">
                            <img src="{{asset('storage/'.$comment->user->image)}}" alt="" class="h-8 w-8 rounded-full me-5">
                            <div class="me-2">
                                <a href="{{$comment->user->username}}" class="font-bold">{{$comment->user->username}}</a>
                                {{$comment->body}}
                            </div>
                            <div class="mt-1 text-sm font-bold text-gray-400">
                                {{ $comment->created_at->diffForHumans(null, true, true) }}
                            </div>
                        </div>
                @endforeach
                </div>
            </div>

            <!-- Bottom -->
            <div class="border-t p-5">
                <form action="/p/{{ $post->slug }}/comment" method="POST">
                    @csrf
                    <div class="flex flex-row">
            <textarea name="body" id="comment_body" placeholder="{{ __('Add a comment...') }}"
                      class="h-5 grow resize-none overflow-hidden border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0"></textarea>
                        <button type="submit"
                                class="ltr:ml-5 rtl:mr-5 border-none bg-white text-blue-500">{{ __('Post') }}</button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
