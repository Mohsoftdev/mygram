<div>
    <ul class="overflow-y-auto">
        @forelse(auth()->user()->pending_list as $pending)
            <li class="w-full mb-2 flex items-center py-1 px-2">
                <a href="/$pending->username" class="flex flex-row items-center grow">
                    <img src="{{str($pending->image)->startsWith('http') ? $pending->image : asset('/storage/' . $pending->image)}}"
                    alt="{{$pending->username}}" class="h-8 w-8 rounded-full me-2">
                    <div class="font-bold text-gray-500">
                        {{$pending->username}}
                    </div>
                </a>
                <div>
                    <button class="bg-blue-500 py-1 px-2 rounded-md text-white w-[5rem]"
                    wire:click="confirm({{ $pending->id }})">{{__('Confirm')}}</button>
                    <button class="bg-red-500 py-1 px-2 rounded-md text-white w-[5rem]"
                    wire:click="delete({{ $pending->id }})">{{__('Delete')}}</button>
                </div>
            </li>
        @empty
            <div class="text-center text-lg text-gray-500">
                {{__('There is no following requests')}}
            </div>
        @endforelse
    </ul>
</div>
