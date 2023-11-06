<div>
<div class="flex flex-row">

<div class="flex w-full p-2 bg-gray-100 border-b-2 mb-2">
    <h1 class="text-3x text-center grow">
        {{__('Following')}}
    </h1>
    <button wire:click="$dispatch('closeModal')"><i class="bx bx-x text-xl"></i></button>
</div>

</div>
<ul class="overflow-y-auto">
    @forelse($this->following_list as $following)
        <li class="w-full mb-2 flex items-center py-1 px-2">
            <a href="/$following->username" class="flex flex-row items-center grow">
                <img src="{{str($following->image)->startsWith('http') ? $following->image : asset('/storage/' . $following->image)}}"
                alt="{{$following->username}}" class="h-8 w-8 rounded-full me-2">
                <div class="font-bold text-gray-500">
                    {{$following->username}}
                </div>
            </a>
            @auth
                <button class="border border-gray-500 px-2 py-1 rounded" wire:click="unfollow({{ $following->id }})">
                    {{__('unfollow')}}
                </button>
            @endauth
        </li>
    @empty
        <li class="mx-auto text-center text-xl text-gray-500 p-4">
            {{__('This user is not following anyone yet')}}
        </li>
    @endforelse
</ul>


</div>
