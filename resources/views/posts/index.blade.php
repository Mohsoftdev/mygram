<x-app-layout>
    <div class="flex flex-row max-w-3xl mx-auto">
        <!-- left-side -->
        <div class="w-[30rem] lg:w-[500px]">
        @forelse ($posts as $post)
           <x-post :post="$post"/>
        @empty
            <div class="max-w-2xl gap-8 mx-auto">
                {{__('Start Following People To See Their Posts')}}
            </div>
        @endforelse
        </div>
        <!-- right-side -->
        <div class="flex flex-col w-[60rem] lg:w-[20rem] pt-5 px-4 ms-3">
            <div class="flex flex-row py-3">
                <a href="{{auth()->user()->username}}" class="w-12 h-12 rounded-full border-gray-300">
                    <img src="{{ $post->user->image }}" alt="" class="h-12 w-12 border-2 border-sky-600 rounded-full">
                </a>
                <div class="flex flex-col ms-2">
                    <a href="/{{auth()->user()->username}}" class="font-bold">{{auth()->user()->username}}</a>
                    <a href="/{{auth()->user()->username}}" class="color-gray-600">{{auth()->user()->name}}</a>
                </div>
            </div>
            <div class="flex flex-col">
                <h3 class="font-bold mt-3 text-xl">{{__('Suggested for you:')}}</h3>
                <ul>
                @foreach ($suggested_users as $suggested_user)
                    <div class="flex flex-row items-center mt-4">
                        <a href="{{auth()->user()->username}}" class="me-3">
                            <img src="{{ $suggested_user->image }}" alt="" class="h-9 w-9 border-2 border-red-600 rounded-full">
                        </a>
                        <div class="flex flex-col ms-2">
                            <a href="/{{$suggested_user->username}}" class="flex font-bold justify-content-start">{{$suggested_user->username}}</a>
                            <a href="/{{$suggested_user->username}}" class="color-gray-600">{{$suggested_user->name}}</a>
                        </div>
                    </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
