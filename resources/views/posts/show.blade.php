<x-app-layout>
    <div class="h-[20rem] md:h-screen md:flex md:flex-row border-2 rounded-2xl mx-3">
        <!-- left-side -->
        <div class="h-full items-center md:w-7/12 overflow-hidden md:rounded-l-2xl flex bg-black">
            <img src="{{ asset('storage/'.$post->image) }}" alt="{{$post->description}}" class="h-auto w-full">
        </div>
        <!-- right-side -->
        <div class="flex w-full flex-col bg-white  md:rounded-r-2xl md:w-5/12 border-2">
            <!-- Top -->
            <div class="block border-b-2">
                <div class="flex items-center p-5">
                    <img src="{{str($post->user->image)->startsWith('http') ? $post->user->image : asset('/storage/' . $post->user->image)}}"
                        class="me-5 rounded-full h-10 w-10">
                    <div class="grow">
                        <a href="/{{$post->user->username}}" class="text-bold">{{$post->user->username}}</a>
                    </div>
                    @can('update', $post)
                        <button onclick="Livewire.dispatch('openModal', {component: {component: {component: 'edit-post-modal', arguments: arguments: arguments: {post: {{$post->id}}}} } })">
                            <i class="bx bx-message-square-edit text-xl"></i>
                        </button>
                        <form action="/p/{{$post->slug}}/delete" method="POST">
                            @csrf
                            <button type="submit">
                                <i class="bx bx-message-square-x text-xl ms-2 text-red-600"></i>
                            </button>
                        </form>
                    @endcan
                    @cannot('update', $post)
                       <livewire:follow-button :post="$post" :userId="$post->user->id" classes="text-blue-600"/>
                    @endcannot
                </div>
            </div>
            <!-- Middle -->
            <div class="flex flex-col grow overflow-y-auto">
                <div class="flex items-center p-5">
                    <img src="{{str($post->user->image)->startsWith('http') ? $post->user->image : asset('/storage/' . $post->user->image)}}" class="me-5 rounded-full h-10 w-10">                    <div>
                        <a href="{{ $post->user->username }}" class="font-bold">{{ $post->user->username }}</a>
                        {{ $post->description }}
                    </div>
                </div>
                <!-- comments -->
                <div class="grow">
                @foreach($post->comments as $comment)
                        <div class="flex items-center px-5 py-1">
                        <img src="{{str($comment->user->image)->startsWith('http') ? $comment->user->image : asset('/storage/' . $comment->user->image)}}"
                    class="me-5 rounded-full h-10 w-10">                            <div class="me-2">
                                <a href="{{$comment->user->username}}" class="font-bold">{{$comment->user->username}}</a>
                                {{$comment->body}}
                            </div>
                            <div class="mt-1 text-sm font-bold text-gray-400">
                                {{ $comment->created_at->diffForHumans(null, true, true) }}
                            </div>
                        </div>
                @endforeach
                </div>

                <div class="border-t p-3 flex flex-row">
                    <livewire:like :post="$post" />
                    <a class="grow" onclick="document.getElementById('comment_body').focus()"><i
                            class="bx bx-comment text-3xl hover:text-gray-400 cursor-pointer ltr:mr-3 rtl:ml-3"></i></a>


                </div>
                <livewire:likedby :post="$post" />
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
        <br><br><br>
    </div>
</x-app-layout>
