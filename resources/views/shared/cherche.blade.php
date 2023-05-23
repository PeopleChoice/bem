@php
    $class ??= null;
    $type ??= "text";
    $class2 ??= null;
    $name ??= "";
    $value ??='';
    $label  ??= Str::ucfirst($name);
    $col ??= "10";
    $row ??= "2";
    $placeholder??="";
@endphp
<div @class(["form-group",$class])>
    {{-- <label for="{{ $name }}">{{ $label }}</label> --}}

    <input 
    type="{{ $type}}" 
    id="{{ $name }}"

    name="{{ $name }}" 
    class="form-control 
    @error($name) is-invalid  @enderror"
    value="" placeholder="{{ $placeholder }}">
    
    @error($name)
        <div class="invalide-feedback">
            {{ $message }}
        </div>
    @enderror
</div>