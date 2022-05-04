@if(Arr::has($attribute, 'frontend.tag'))
    @foreach($attribute['frontend']['tag'] as $tag)
        @if($value == $tag['value'])
            <span class="label label-{{$tag['type']}}">@lang($tag['label'])</span>
        @endif
    @endforeach
@else
    @if($value)
        <span class="label label-success">@lang('tags.yes')</span>
    @else
        <span class="label label-danger">@lang('tags.no')</span>
    @endif
@endif
