@php
    $class ??=null;
    $name ??='';
    $id ??="";
    $label ??= Str::ucfirst($name);
@endphp

<div @class(['checkbox', $class])>
    <br>
    <input type="hidden" name="{{ $name }}"  value="0">
    <input  type="checkbox" value="1" name="{{ $name }}" id="{{ $id }}" class=" @error($name) is-invalid  @enderror"  @checked(old($name,$value ?? true)) role="switch" checked data-toggle="toggle">
    <label class="form-check-label" for="{{ $label }}">{{ $label }}</label>
    @error($name)
    <div class="invalide-feedback">
        {{ $message }}
    </div>
@enderror
</div>