@foreach($actions as $action)
<div class="btn-group">
    @if(isset($action['role']))
    @switch($action['role']['type'])
    @case('all')
    @if (auth()->user()->hasAllRoles($action['role']['value']))
    @if($action['name'] == 'delete')
    <a name="{{$action['name']}}" onclick="if(confirm('@lang("
        messages.confirm_delete")')){$(this).find('form').submit();}"
        class="btn btn-xs {{$action['style'] ?? 'btn-default'}} {{isset($action['description']) ? 'has-popover' : '' }}"
        @if(isset($action['description']))title="@lang($action['description']['title'])" data-animation="false"
        data-placement="left" data-toggle="popover" data-trigger="hover"
        data-content="@lang($action['description']['message'])" @endif>
        <i class="{{$action['icon']}}"></i>
        <form action="{{ route($action['route'], ['id' => $model->id]) }}" method="post">
            @method('delete')
            @csrf
            <input type="submit" hidden>
        </form>
    </a>
    @else
    <a @if(!isset($action['modal']))href="{{ route($action['route'], ['id' => $model->id]) }}" @else data-toggle="modal"
        data-target="#{{$action['name']}}_{{$id}}" @endif name="{{$action['name']}}"
        class="btn btn-xs {{$action['style'] ?? 'btn-default'}} {{isset($action['description']) ? 'has-popover' : '' }}"
        @if(isset($action['description']))title="@lang($action['description']['title'])" data-toggle="popover"
        data-placement="left" data-animation="false" data-trigger="hover"
        data-content="@lang($action['description']['message'])" @endif>
        <i class="{{$action['icon']}}"></i>
    </a>
    @endif
    @endif
    @break
    @case('any')
    @if (auth()->user()->hasAnyRole($action['role']['value']))
    @if($action['name'] == 'delete')
    <a name="{{$action['name']}}" onclick="if(confirm('@lang("
        messages.confirm_delete")')){$(this).find('form').submit();}"
        class="btn btn-xs {{$action['style'] ?? 'btn-default'}} {{isset($action['description']) ? 'has-popover' : '' }}"
        @if(isset($action['description']))title="@lang($action['description']['title'])" data-toggle="popover"
        data-trigger="hover" data-content="@lang($action['description']['message'])" data-placement="left"
        data-animation="false" @endif>
        <i class="{{$action['icon']}}"></i>
        <form action="{{ route($action['route'], ['id' => $model->id]) }}" method="post">
            @method('delete')
            @csrf
            <input type="submit" hidden>
        </form>
    </a>
    @else
    <a @if(!isset($action['modal']))href="{{ route($action['route'], ['id' => $model->id]) }}" @else data-toggle="modal"
        data-target="#{{$action['name']}}_{{$id}}" @endif name="{{$action['name']}}"
        class="btn btn-xs {{$action['style'] ?? 'btn-default'}} {{isset($action['description']) ? 'has-popover' : '' }}"
        @if(isset($action['description']))title="@lang($action['description']['title'])" data-animation="false"
        data-placement="left" data-toggle="popover" data-trigger="hover"
        data-content="@lang($action['description']['message'])" @endif>
        <i class="{{$action['icon']}}"></i>
    </a>
    @endif
    @endif
    @break
    @case('one')
    @default
    @if (auth()->user()->hasRole($action['role']['value']))
    @if($action['name'] == 'delete')
    <a name="{{$action['name']}}" onclick="if(confirm('@lang("
        messages.confirm_delete")')){$(this).find('form').submit();}"
        class="btn btn-xs {{$action['style'] ?? 'btn-default'}} {{isset($action['description']) ? 'has-popover' : '' }}"
        @if(isset($action['description']))title="@lang($action['description']['title'])" data-toggle="popover"
        data-animation="false" data-trigger="hover" data-placement="left"
        data-content="@lang($action['description']['message'])" @endif>
        <i class="{{$action['icon']}}"></i>
        <form action="{{ route($action['route'], ['id' => $model->id]) }}" method="post">
            @method('delete')
            @csrf
            <input type="submit" hidden>
        </form>
    </a>
    @else
    <a @if(!isset($action['modal']))href="{{ route($action['route'], ['id' => $model->id]) }}" @else data-toggle="modal"
        data-target="#{{$action['name']}}_{{$id}}" @endif name="{{$action['name']}}"
        class="btn btn-xs {{$action['style'] ?? 'btn-default'}} {{isset($action['description']) ? 'has-popover' : '' }}"
        @if(isset($action['description']))title="@lang($action['description']['title'])" data-toggle="popover"
        data-placement="left" data-animation="false" data-trigger="hover"
        data-content="@lang($action['description']['message'])" @endif>
        <i class="{{$action['icon']}}"></i>
    </a>
    @endif
    @endif
    @break
    @endswitch
    @else
    @if($action['name'] == 'delete')
    <a name="{{$action['name']}}" onclick="if(confirm('@lang("
        messages.confirm_delete")')){$(this).find('form').submit();}"
        class="btn btn-xs {{$action['style'] ?? 'btn-default'}} {{isset($action['description']) ? 'has-popover' : '' }}"
        @if(isset($action['description']))title="@lang($action['description']['title'])" data-animation="false"
        data-placement="left" data-toggle="popover" data-trigger="hover"
        data-content="@lang($action['description']['message'])" @endif>
        <i class="{{$action['icon']}}"></i>
        <form action="{{ route($action['route'], ['id' => $model->id]) }}" method="post">
            @method('delete')
            @csrf
        </form>
    </a>
    @else
    <a @if(!isset($action['modal']))href="{{ route($action['route'], ['id' => $model->id]) }}" @else data-toggle="modal"
        data-target="#{{$action['name']}}_{{$id}}" @endif name="{{$action['name']}}"
        class="btn btn-xs {{$action['style'] ?? 'btn-default'}} {{isset($action['description']) ? 'has-popover' : '' }}"
        @if(isset($action['description']))title="@lang($action['description']['title'])" data-toggle="popover"
        data-trigger="hover" data-placement="left" tabindex="0" data-animation="false"
        data-content="@lang($action['description']['message'])" @endif>
        <i class="{{$action['icon']}}"></i>
    </a>
    @endif
    @endif
</div>
@if(isset($action['modal']))
@include($action['modal'], ['action' => $action, 'model' => $model, 'id' => $id, 'modal_id' => $action['name']."_".$id])
@endif
@endforeach
<script>
    $('.has-popover').popover();
    Modal.posInit();
</script>