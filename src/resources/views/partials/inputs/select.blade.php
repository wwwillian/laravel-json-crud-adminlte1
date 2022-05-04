@php($action = $action ?? 'edit')
@php ($enabled = $attribute['frontend']['enabled'] ?? true)
<div
    class="form-group has-feedback {{isset($attribute['frontend']['classes']) && !empty($attribute['frontend']['classes']) ? implode(' ', $attribute['frontend']['classes']): 'col-md-6'}} {{ $errors->has('name') ? 'has-error' : '' }}">
    <label
        for="{{trans($attribute['frontend']['label'])}}">{{trans($attribute['frontend']['label'])}}{{isset($attribute["required"]) && $attribute["required"] == true && $action == "create"? '*' : ''}}</label>
    <select class="form-control" name="{{dot_to_square_brackets($name)}}"
        {{isset($attribute["required"]) && $attribute["required"] == true && $action == "create" ? "required" : ""}}
        autofocus @yield('attributes') {{ !$enabled ? 'disabled=disabled':''}}>
        @if(data_get($attribute, 'frontend.default', null) == null || data_get($model, $name, null) == null)
        <option value="disabled" selected disabled>{{trans(data_get($attribute, 'frontend.placeholder'))}}</option>
        @endif
        @foreach(data_get($attribute, 'frontend.options.values') as $option)
        <option value="{{$option['value']}}" @if(data_get($model, $name, null)==$option['value']) selected @else
            {{ $option['value'] == data_get($attribute, 'frontend.default', null) ? 'selected': '' }} @endif>
            {{data_get($attribute, 'frontend.options.translate', true) ? trans($option['label']) : $option['label']}}
        </option>
        @endforeach
    </select>
    <span class="glyphicon {{data_get($attribute, 'frontend.icon', '')}} form-control-feedback"></span>
    @if ($errors->has($name))
    <span class="help-block">
        <strong>{{ $errors->first($name) }}</strong>
    </span>
    @endif
</div>