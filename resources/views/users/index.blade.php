<x-app-layout>
    <div class="grid grid-cols-4 mt-4">
        <!-- User-Image -->
        <a href="./" class="col-span-1 p-4 order-1">
        <img src="{{$user->image == 'https://ui-avatars.com/api/?name='.urlencode($user->name) ? $user->image : asset('storage/' .$user->image)}}" class="md:h-40 md:w-40 w-13 h-13 object-cover rounded-full ltr:mr-5 rtl:ml-5 border p-1 bg-gradient-to-r from-red-500 via-orange-500 to-yellow-500">
        </a>

        <!-- User-portal -->
        <div class="px-4 col-span-2 items-center md:ml-0 flex flex-col md:flex-row order-2 md:col-span-3 md:mx-auto ">
            <div class="font-bold text-2xl md:text-center mb-1">{{$user->username}}</div>
            @auth
                @if($user->id === auth()->id())
                    <div>
                        <a href="/{{$user->username}}/edit" class="items-center ms-3 w-30 border-2 self-start border-zinc-950 px-2 py-1 items-center rounded-md">
                            {{__('Edit profile')}}
                            <i class="bx bx-pencil"></i>
                        </a>
                    </div>
                @else
                    <livewire:follow-button :userId="$user->id" classes="bg-blue-500 text-white"/>
                @endif
            @endauth
        </div>

        <!-- User-Info -->
        <div class="ext-md mt-8 col-span-3 col-start-2 order-3 md:col-start-2 md:order-4 md:mt-0">
            <p class="font-bold">{{ $user->name }}</p>
            {!! nl2br(e($user->bio)) !!}
        </div>

        <!-- User-stats -->
        <div
            class="col-span-4 my-5 py-2 border-y border-y-neutral-200 order-4 md:order-3 md:border-none md:px-4 md:col-start-2">
            <ul class="text-md flex flex-row justify-around md:justify-start md:space-x-10 md:text-xl">
                <li class="flex flex-col md:flex-row text-center rtl:ml-5 md:px-3 grow">
                    <div class="md:ltr:mr-1 md:rtl:ml-1 font-bold md:font-normal">
                        {{ $user->posts->count() }}
                    </div>
                    <span class='text-neutral-500 md:text-black ms-2 font-bold'>
                        {{ $user->posts->count() > 1 ? __('posts') : __('post') }}
                    </span>
                </li>

                <livewire:follower :userId="$user->id"/>
                <livewire:following :userId="$user->id"/>

            </ul>
        </div>
    </div>

    <!-- User-posts -->
    @if ($user->posts()->count() > 0 and ($user->private_account == false or auth()->id() == $user->id or auth()->user()->is_following($user)))
        <div class="grid grid-cols-3 gap-2 my-5 px-5">
            @foreach ($user->posts as $post)
                <a class="aspect-square block w-full" href="/p/{{ $post->slug }}">
                    <div class="group relative">
                        <img class="w-full aspect-square object-cover" src="{{asset('storage/'.$post->image)}}">
                        @if (auth()->id() === $post->user_id)
                            <div
                                class="absolute top-0 ltr:left-0 rtl:right-0 w-full h-full flex flex-row justify-center items-center group-hover:bg-black/40">
                                <ul class="invisible group-hover:visible flex flex-row w-[150px]">
                                    <li class="flex items-center text-2xl text-white font-bold ltr:mr-2 rtl:ml-2 grow">
                                        <i class='bx bxs-heart ltr:mr-1 rtl:ml-1'></i>
                                            <span>
                                        {{ $post->likes()->count() }}
                                            </span>
                                    </li>
                                    <li class="flex items-center text-2xl text-white font-bold">
                                        <i class='bx bx-comment ltr:mr-1 rtl:ml-1'></i>
                                        <span>
                                        {{ $post->comments()->count() }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="w-full text-center mt-20">
            @if ($user->private_account == true and $user->id != auth()->id())
                {{ __('This Account is Private Follow to see their photos.') }}
            @else
                {{ __('This user does not have any post.') }}
            @endif
        </div>
    @endif
</x-app-layout>
