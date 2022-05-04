<div class="row mt-xs">
    <div class="col-sm-6" style="text-align: left;">
        <label style="font-weight: normal;white-space: nowrap;text-align: left;">@lang('labels.search')<input type="search" class="form-control input-sm datatable-filter" placeholder="@lang('placeholders.search')" style="display: inline-block;min-width:178px;margin-left: 0.5em;"></label>
    </div>
    <div class="col-sm-6 pull-right" style="text-align: right;">
        @include('jcrud::partials.buttons.new', ['route' => $routePrefix.'.create'])
    </div>
</div>
<table class="datatable table table-striped table-bordered dtr-inline" style="width:100% !important;" data-create-route="{{ route($routePrefix .'.create') }}" data-route="{{ route($routePrefix .'.datatables') }}">
    <thead style="background-color: white;">
        <tr role="row">
            @foreach(data_get($views, 'index.fields', array_keys($attributes)) as $name)
            <th data-name="{{ snake_case($name) }}"
                data-data="{{ snake_case($name) }}"
                {{ Arr::has($attributes[$name], 'frontend.raw') && $attributes[$name]['frontend']['raw'] ? 'raw' : '' }}
                {{ Arr::has($attributes[$name], 'frontend.order') ? 'order='.data_get($attributes[$name], 'frontend.order') : '' }}
                {{ (isset($attributes[$name]['searchable']) && !$attributes[$name]['searchable']) ? ' no-searching' : '' }}>
                {{trans($attributes[$name]['frontend']['label'])}}
            </th>
            @endforeach
            <th data-name="action" data-data="action" class="datatables-action no-sorting no-searching" style="min-width:70px">{{ trans('datatables.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $td_skeleton = str_repeat('<td><div class="td-skeleton"></div></td>', count(data_get($views, 'index.fields', array_keys($attributes))) + 1);
            $tr_skeleton = str_repeat("<tr role='row' class='odd' style='height:50px'>${td_skeleton}</tr>", 10);
        @endphp
        {!! $tr_skeleton !!}
    </tbody>
</table>
