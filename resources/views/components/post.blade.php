<div class="card">
    <div class="card-header">
        <div class="flex items-center">
            <img src="{{$post->user->image == 'https://ui-avatars.com/api/?name='.urlencode($post->user->name) ? $post->user->image : asset('storage/' .$post->user->image)}}" alt="" class="me-5 h-9 w-9 rounded-full">
            <div>
                <a href="{{ $post->user->username }}" class="font-bold">{{ $post->user->username }}</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <img src="{{asset('storage/'.$post->image)}}" alt="" class="w-full h-[400px] overflow-hidden">
        <div class="p-4">
            <a href="/p/{{$post->slug}}/likes">
                @if($post->liked(auth()->user()))
                    <i class="bx bxs-heart text-red-600 hover:text-gray-500 text-3xl"></i>
                @else
                    <i class="bx bx-heart hover:text-gray-500 text-3xl"></i>
                @endif
            </a>
        </div>
        <div class="p-3">
            <a href="" class="font-bold">{{$post->user->username}}</a>
            {{$post->description}}
            <!-- Comments -->
            <div class="mt-2">
                @if($post->comments->count() > 0)
                    <a href="/p/{{$post->slug}}" class="text-gray-600">
                        View all {{$post->comments->count()}} comments
                    </a>
                @else
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer">
        <form action="/p/{{$post->slug}}/comment" method="POST" class="flex flex-row items-center">
            @csrf
            <i class="bx bx-message-rounded-dots text-2xl me-2"></i>
            <textarea id="comment_body" name="body" placeholder="{{__('Add a comment ...')}}" autocomplete="off"
             class="grow border-0 resize-none h-100 focus:ring-0 outline-0 bg-none max-h-60 h-6
             p-0 overflow-y-hidden placeholder-gray-400"></textarea>
            <button type="submit"  class="text-blue-900 font-bold">POST</button>
        </form>
    </div>
</div>
