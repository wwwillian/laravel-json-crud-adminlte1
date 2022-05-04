@php($model = isset($model) ? $model : null)
@include('jcrud::partials.flash_message')
@switch($action)
    @case('edit')
        @php($routeAction = route($routePrefix . '.update', ['id' => $model->id]))
        @break;
    @case('create')
        @php($routeAction = route($routePrefix . '.store'))
        @break
    @default
        @php($routeAction = route(data_get($views, $action . '.post_route', $action . '.store')))
        @break
@endswitch
<form method="POST" action="{{ $routeAction }}" {{ (isset($personTypes) && $personTypes) ? 'class=person-types-form' : '' }} accept-charset="utf-8" enctype="multipart/form-data">
    @csrf
    @if ($action == 'edit')
        @method('PUT')
    @endif

    <div class="box-header with-border">
        <h3 class="box-title">
            @if($action == 'edit')
                @lang('crud.edit', ['entity' => str_lower(trans('entities.' . snake_case($entity) . '.singular'))])
            @elseif ($action == 'create')
                @lang('crud.create_new', ['entity' => str_lower(trans('entities.' . snake_case($entity) . '.singular'))])
            @endif
        </h3>
        @if($action == 'edit' && Arr::has($views, 'edit.actions'))
            @foreach(data_get($views, 'edit.actions') as $currentAction)
                @if($currentAction['name'] == 'delete')
                    @if(isset($currentAction['role']))
                        @switch($currentAction['role']['type'])
                            @case('all')
                                @if (auth()->user()->hasAllRoles($currentAction['role']['value']))
                                    <a class="btn btn-danger pull-right delete-button">
                                        <i class="far fa-trash-alt"></i>
                                        {{ trans('buttons.delete') }}
                                    </a>
                                @endif
                                @break
                            @case('any')
                                @if (auth()->user()->hasAnyRole($currentAction['role']['value']))
                                    <a class="btn btn-danger pull-right delete-button">
                                        <i class="far fa-trash-alt"></i>
                                        {{ trans('buttons.delete') }}
                                    </a>
                                @endif
                                @break
                            @case('one')
                            @default
                                @if (auth()->user()->hasRole($currentAction['role']['value']))
                                    <a class="btn btn-danger pull-right delete-button">
                                        <i class="far fa-trash-alt"></i>
                                        {{ trans('buttons.delete') }}
                                    </a>
                                @endif
                            @break
                        @endswitch
                    @endif
                    <a class="btn btn-danger pull-right delete-button">
                        <i class="far fa-trash-alt"></i>
                        {{ trans('buttons.delete') }}
                    </a>
                @endif
            @endforeach
            
        @endif
    </div>

    <div class="box-body">
        <div class="row">
            @php($fields = data_get($views, $action . '.fields', array_keys($attributes)))
            @foreach ($fields as $key)
                @if($key == 'role' && auth()->user()->hasRole('manager'))
                    @continue
                @endif
                @include('jcrud::partials.inputs.'.data_get($attributes[$key], 'frontend.type'), [ 'name' => $key, 'attribute' => $attributes[$key], 'model' => $model])
            @endforeach
        </div>
    </div>
    <div class="box-footer">
        <div id="save_actions" class="pull-right">
            <input type="hidden" name="save_action">
            <button type="submit" style="display:none"></button>

             <a href="{{ URL::previous() }}" class="btn btn-primary">
                <i class="fa fa-fw fa-chevron-left"></i>
                {{ trans('buttons.back') }}
            </a>

            <div class="btn-group">
                <button type="submit" class="btn btn-success save-action-button">
                    <i class="fa fa-fw fa-save"></i>
                    <span>{{trans('buttons.save')}}</span>
                </button>
            </div>
        </div>
    </div>
</form>

{{-- We can't have nested forms, so we will have to set the deletion form outside the edit one --}}
@if($action == 'edit')
    @include('jcrud::partials.delete_form', array('route' => $routePrefix, 'id' => $model->id))
@endif
