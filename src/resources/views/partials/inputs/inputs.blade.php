<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="now-ui-icons {{isset($attribute['frontend']['default']) ? $attribute['frontend']['default'] : 'users_circle-08'}}"></i>
        </span>
    </div>
    <input  type="{{$attribute['frontend']['type']}}" 
            name="{{dot_to_square_brackets($name)}}" 
            class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
            value="{{ old('email') }}" 
            placeholder="{{trans('now_ui_kit.placeholders.email')}}" 
            {{isset($attribute["required"]) && $attribute["required"] == true ? "required" : ""}} 
            autofocus>
    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
