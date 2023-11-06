
<div>
    <a wire:click="toggle_like">
        @if($post->likedbyUser(auth()->user()))
            <i class="bx bxs-heart text-red-600 hover:text-gray-500 text-3xl"></i>
        @else
            <i class="bx bx-heart hover:text-gray-500 text-3xl"></i>
        @endif
    </a>
</div>

