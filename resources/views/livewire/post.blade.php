
<div class="card">
    <div class="card-header">
        <div class="flex items-center">
            <img src="{{str($post->user->image)->startsWith('http') ? $post->user->image : asset('/storage/' . $post->user->image)}}"
 class="me-5 h-9 w-9 rounded-full">
            <div>
                <a href="{{ $post->user->username }}" class="font-bold">{{ $post->user->username }}</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <img src="{{asset('storage/'.$post->image)}}" alt="" class="w-full h-[400px] overflow-hidden">

        <div class="p-3 flex flex-row">
            <livewire:like :post="$post"/>
            <a href="/p/{{$post->slug}}" class="grow ms-2" onclick="document.getElementById('comment_body').focus()"><i
                            class="bx bx-comment text-3xl hover:text-gray-400 cursor-pointer ltr:mr-3 rtl:ml-3"></i></a>
        </div>
        <livewire:likedBy :post="$post" />


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
