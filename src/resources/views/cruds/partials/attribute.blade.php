<div
    class="property-wrapper mb-xs {{isset($value['frontend']['classes']) && !empty($value['frontend']['classes']) ? implode(' ', $value['frontend']['classes']): 'col-xs-12 col-md-6 col-lg-4'}}">
    <label>{{ trans($value['frontend']['label']) }}:</label>
    <br>
    @if($name == 'password')
    <div {{isset($attrs) ? $attrs: ''}}>************</div>
    @else
    @switch(data_get($value, 'frontend.type'))
    @case('checkbox')
    @include('jcrud::partials.datatables.tags', ['value' => data_get($model, $name), 'attribute' => $value])
    @break
    @case('select')
    @if(Arr::has($model, $name))
    @switch(data_get($value, 'frontend.options.type'))
    @case('enum')
    @if(data_get($value, 'frontend.translate', true))
    <div {{isset($attrs) ? $attrs: ''}}>@lang(data_get($model, $name))</div>
    @else
    <div {{isset($attrs) ? $attrs: ''}}>{{data_get($model, $name)}}</div>
    @endif
    @break
    @case('query')
    @php($query = DB::table(data_get($value, 'frontend.options.table'))->where(data_get($value,
    'frontend.options.columns.value'), data_get($model, $name))->select(data_get($value,
    'frontend.options.columns.name'))->first())
    <div {{isset($attrs) ? "style=${attrs}": ""}} {{!isset($query) ? "class=text-red": ""}}>{!!isset($query) ?
        $query->name : "<b>".trans('labels.none')."</b>"!!}</div>
    @break
    @default
    <div {{isset($attrs) ? $attrs: ''}}>{{data_get($model, $name, '')}}</div>
    @break
    @endswitch
    @endif
    @break
    @case('date')
    <div {{isset($attrs) ? $attrs: ''}}>
        {{is_object(data_get($model, $name)) ? data_get($model, $name)->format(data_get($value, 'frontend.format', 'd/m/Y')) : data_get($model, $name)}}
    </div>
    @break;
    @case('time')
    <div {{isset($attrs) ? $attrs: ''}}>
        {{date_format( date_create_from_format('H:i:s', data_get($model, $name)), data_get($value, 'frontend.format', 'H:i \\h\\s'))}}
    </div>
    @break;
    @case('money')
    @if(!empty(data_get($model, $name, '')))
    <div {{isset($attrs) ? $attrs: ''}}>R$ {{to_currency(data_get($model, $name, ''))}}</div>
    @endif
    @break;
    @case('cep')
    <div {{isset($attrs) ? $attrs: ''}}>{{to_cep(data_get($model, $name, ''))}}</div>
    @break;
    @case('cpf')
    <div {{isset($attrs) ? $attrs: ''}}>{{to_cpf(data_get($model, $name, ''))}}</div>
    @break;
    @case('percent')
    <div {{isset($attrs) ? $attrs: ''}}>{{to_percent(data_get($model, $name, ''))}}</div>
    @break;
    @case('cpfcnpj')
    <div {{isset($attrs) ? $attrs: ''}}>{{to_cpfcnpj(data_get($model, $name, ''))}}</div>
    @break;
    @case('phonenumber')
    <div {{isset($attrs) ? $attrs: ''}}>{{to_phonenumber(data_get($model, $name, ''))}}</div>
    @break;
    @case('richtext')
    <div class="rich-text" {{isset($attrs) ? $attrs: ""}}>{!!data_get($model, $name, '')!!}</div>
    @break
    @default
    <div {{isset($attrs) ? $attrs: ""}}>{{data_get($model, $name, '')}}</div>
    @break
    @endswitch
    @if(is_null(data_get($model, $name, null)))
    <div {{isset($attrs) ? $attrs: ""}} class="text-red"><b>@lang('labels.none')</b></div>
    @endif
    @endif
</div>