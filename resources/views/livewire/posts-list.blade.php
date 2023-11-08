<div class="w-[20rem] md:w-[30rem] lg:w-[95rem] mx-auto">
    @forelse ($this->posts as $post)
        <livewire:post :post="$post" :wire:key="'post_'.$post->id"/>
    @empty
        <div class="max-w-2xl gap-8 mx-auto">
            {{__('Start Following People To See Their Posts')}}
        </div>
    @endforelse
</div>

