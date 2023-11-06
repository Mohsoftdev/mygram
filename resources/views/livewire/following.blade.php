<div>
    <li class="flex flex-col md:flex-row text-center rtl:ml-5 md:px-3 grow">
        <div class="md:ltr:mr-1 md:rtl:ml-1 font-bold md:font-normal">
            {{ $this->count }}
        </div>
        <button :userId="$userId" onclick="Livewire.dispatch('openModal', { component: 'following-modal', arguments: { userId: {{ $userId }} }})" class='text-neutral-500 md:text-black ms-2 font-bold'>
            {{ $this->count > 1 ? __('followings') : __('following') }}
        </button>
    </li>
</div>
