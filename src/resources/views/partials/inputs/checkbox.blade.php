@php ($action ?? 'edit')
<div
    class="form-group has-feedback {{isset($attribute['frontend']['classes']) && !empty($attribute['frontend']['classes']) ? implode(' ', $attribute['frontend']['classes']): 'col-md-6'}} {{ $errors->has('name') ? 'has-error' : '' }}">
    <label
        for="{{trans($attribute['frontend']['label'])}}">{{trans($attribute['frontend']['label'])}}{{isset($attribute["required"]) && $attribute["required"] == true  && $action == 'create' ? '*' : ''}}</label>
    <div class="checkbox icheck">
        <input type="checkbox" @if(data_get($model, $name, null) !=null) {{data_get($model, $name) ? 'checked': ''}}
            @else {{data_get($attribute, 'frontend.default', false) ? 'checked': ''}} @endif
            {{data_get($attribute, 'frontend.default', false) ? 'checked': ''}}
            name="{{dot_to_square_brackets($name)}}">
    </div>
</div>