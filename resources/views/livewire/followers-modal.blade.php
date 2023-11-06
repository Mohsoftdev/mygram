<div>
<div class="flex flex-row">

<div class="flex w-full p-2 bg-gray-100 border-b-2 mb-2">
    <h1 class="text-3x text-center grow">
        {{__('Followers')}}
    </h1>
    <button wire:click="$dispatch('closeModal')"><i class="bx bx-x text-xl"></i></button>
</div>

</div>
<ul class="overflow-y-auto">
    @forelse($this->followers_list as $followers)
        <li class="w-full mb-2 flex items-center py-1 px-2">
            <a href="/$followers->username" class="flex flex-row items-center grow">
                <img src="{{str($followers->image)->startsWith('http') ? $followers->image : asset('/storage/' . $followers->image)}}"
                alt="{{$followers->username}}" class="h-8 w-8 rounded-full me-2">
                <div class="font-bold text-gray-500">
                    {{$followers->username}}
                </div>
            </a>
        </li>
    @empty
        <li class="mx-auto text-center text-xl text-gray-500 p-4">
            {{__('This user has no followers yet')}}
        </li>
    @endforelse
</ul>
</div>
