@php
    $class ??= null;
    $name ??= "";
    $value ??='';
    $label  ??= Str::ucfirst($name);
    $multiple ??=false;
@endphp
<div @class(["form-group"])>
    <label for="{{ $name }}">{{ $label }}</label>
   
        <input 
        type="file" 
        id="{{ $name }}" 
        name="{{ $name.($multiple == true ? '[]' : '' ) }}" 
        class="form-control {{$class }} @error($name) is-invalid  @enderror"
        @if ($multiple) multiple @endif
         >
    
    @error($name)
        <div class="invalide-feedback">
            {{ $message }}
        </div>
    @enderror
</div>