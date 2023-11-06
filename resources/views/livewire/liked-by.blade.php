<div class="px-3 mb-3">
    @if($this->likes > 0)

        {{__('liked by')}}
        @if($this->UserIsLiker)

                <strong>
                    {{__('You')}}
                </strong>
        @elseif(($this->isLikedByFollower))
            <strong>
                <a href="/{{$this->FollowerLiker}}">{{$this->FollowerLiker}}</a>
            </strong>
         @else
                <strong>
                    <a href="/{{$this->firstusername}}">{{($this->firstusername)}}</a>
                </strong>
        @endif

    @endif

    @if($this->likes == 2)
        {{__('and')}} <strong>{{__('other')}}</strong>
    @endif
    @if($this->likes > 2)
        {{__('and')}}  <strong>{{$this->likes - 1}}</strong> <strong>{{__('others')}}</strong>
    @endif
</div>
