<div>
    @if($this->count > 0)
        <div class="w-5 h-5 p-0 5 bg-red-500 text-white text-center text-sm rounded-full {{$classes}}">
            {{ $this->count }}
        </div>
    @endif
</div>
