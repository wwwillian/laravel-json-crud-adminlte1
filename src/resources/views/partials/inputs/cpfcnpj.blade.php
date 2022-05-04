@php($action = $action ?? 'edit')
<div
    class="form-group has-feedback {{isset($attribute['frontend']['classes']) && !empty($attribute['frontend']['classes']) ? implode(' ', $attribute['frontend']['classes']): 'col-md-6'}} {{ $errors->has('name') ? 'has-error' : '' }}">
    <label
        for="{{trans($attribute['frontend']['label'])}}">{{trans($attribute['frontend']['label'])}}{{isset($attribute["required"]) && $attribute["required"] == true && $action == "create"? '*' : ''}}</label>
    <input type="{{$attribute['frontend']['type']}}" name="{{dot_to_square_brackets($name)}}" class="form-control"
        placeholder="{{trans($attribute['frontend']['placeholder'])}}"
        {{isset($attribute["required"]) && $attribute["required"] == true && $action == "create" ? "required" : ""}}
        autofocus @yield('attributes') @if(isset($model)) value="{{data_get($model, $name)}}" @else
        value="{{isset($attribute['frontend']['default']) ? trans($attribute['frontend']['default']) : ''}}" @endif>
    <span
        class="glyphicon {{isset($attribute['frontend']['icon']) ? $attribute['frontend']['icon'] : ''}} form-control-feedback"></span>
    @if ($errors->has($name))
    <span class="help-block">
        <strong>{{ $errors->first($name) }}</strong>
    </span>
    @endif
</div>