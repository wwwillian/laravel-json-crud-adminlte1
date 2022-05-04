<form method="POST" action="{{ $action == 'edit' ? route($routes['self'] . '.update', ['id' => $item->getKey()]) : route($routes['self'] . '.index') }}" {{ (isset($personTypes) && $personTypes) ? 'class=person-types-form' : '' }} accept-charset="utf-8" enctype="multipart/form-data">
    @csrf
    @if ($action == 'edit')
        @method('PUT')
    @endif

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            @foreach ($tabs as $tab)
                <li class="{{ $loop->first ? 'active' : '' }}">
                    <a href="#{{ snake_case(trans($tab['name'])) }}" data-toggle="tab">@lang($tab['name'])</a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach ($tabs as $tab)
                <div id="{{ snake_case(trans($tab['name'])) }}" class="tab-pane{{ $loop->first ? ' active' : '' }}">

                    @foreach ($tab['attributes'] as $attribute)
                        @include($inputs[$attribute]->view, array('input' => $inputs[$attribute]))
                    @endforeach

                </div>
            @endforeach
        </div>

        <div class="box-footer">
            <div id="save_actions" class="pull-right">
                <input type="hidden" name="save_action" value="{{ $saveOptions['active']['value'] }}">
                <button type="submit" style="display:none"></button>

                @if($action == 'edit')
                    <a class="btn btn-danger delete-button">
                        <i class="far fa-trash-alt"></i>
                        {{ trans('buttons.delete') }}
                    </a>
                @endif

                <a href="{{ route($routes['self'] . '.index') }}" class="btn btn-default">
                    <i class="fas fa-ban"></i>
                    {{ trans('buttons.cancel') }}
                </a>

                <div class="btn-group">
                    <button type="button" data-value="{{ $saveOptions['active']['value'] }}"" class="btn btn-success save-action-button">
                        <i class="fas fa-save"></i>
                        <span>{{ $saveOptions['active']['label'] }}</span>
                    </button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($saveOptions['options'] as $value => $label)
                            <li>
                                <a data-value="{{ $value }}" class="save-action-button">{{ $label }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</form>

{{-- We can't have nested forms, so we will have to set the deletion form outside the edit one --}}
@if($action == 'edit')
    @include('partials.delete_form', array('route' => $routes['self'], 'id' => $item->getKey()))
@endif
