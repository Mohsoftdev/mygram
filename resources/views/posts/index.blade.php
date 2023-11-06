<x-app-layout>
    <div class="flex flex-row max-w-3xl mx-auto justify-between">
        <!-- left-side -->
        <livewire:posts-list />
        <!-- right-side -->
        <div class="hidden w-[60rem] lg:flex lg:flex-col pt-4 ms-5">
            <div class="flex flex-row py-3">
                <a href="{{auth()->user()->username}}" class="w-12 h-12 rounded-full border-gray-300">
                    <img src="{{str(auth()->user()->image)->startsWith('http') ? auth()->user()->image : asset('/storage/' . auth()->user()->image)}}" class="h-12 w-12 border-2 border-sky-600 rounded-full">
                </a>
                <div class="flex flex-col ms-2">
                    <a href="/{{auth()->user()->username}}" class="font-bold">{{auth()->user()->username}}</a>
                    <a href="/{{auth()->user()->username}}" class="color-gray-600">{{auth()->user()->name}}</a>
                </div>
            </div>
            <div class="">
                <h3 class="font-bold mt-3 text-xl">{{__('Suggested for you:')}}</h3>
                <ul>
                @foreach ($suggested_users as $suggested_user)
                    <li class="flex flex-row  mt-4 w-[20rem]">

                        <a href="/{{$suggested_user->username}}" class="me-3">
                            <img src="{{str($suggested_user->image)->startsWith('http') ? $suggested_user->image : asset('/storage/' . $suggested_user->image)}}"
                                alt="" class="h-9 w-9 border-2 border-red-600 rounded-full">
                        </a>
                        <div class="flex flex-col ms-2 grow">
                            <a href="/{{$suggested_user->username}}" class="flex font-bold justify-content-start">{{$suggested_user->username}}</a>
                            <a href="/{{$suggested_user->username}}" class="color-gray-600">{{$suggested_user->name}}</a>
                        </div>

                        <livewire:follow-button :userId="$suggested_user->id" classes="text-blue-600"/>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


</x-app-layout>
