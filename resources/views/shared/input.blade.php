@php
    $class ??= null;
    $type ??= "text";
    $class2 ??= null;
    $name ??= "";
    $value ??='';
    $label  ??= Str::ucfirst($name);
    $col ??= "10";
    $row ??= "2";
    $require??=false;
@endphp
<div @class(["form-group",$class])>
    {{-- <label for="{{ $name }}">{{ $label }}</label> --}}
    @if($type != 'hidden')
     @if($require == true )
      <label for="{{ $name }}">{{ $label }} <span style="color:red">*</span></label>
     @else
     <label for="{{ $name }}">{{ $label }}</label>
     @endif
   
    @endif
   
    @if($type == 'textarea')
        <textarea 
        id="{{ $name }}" 
        name="{{ $name }}" 
        class="form-control   @error($name) is-invalid  @enderror"  >{{ old($name,$value) }}</textarea>
    @else
        <input 
        type="{{$type}}" 
        id="{{ $name }}" 
        name="{{ $name }}" 
        class="form-control 
        @error($name) is-invalid  @enderror"
        value="{{ old($name,$value) }}">
        @endif
    @error($name)
        <div class="invalide-feedback">
            {{ $message }}
        </div>
    @enderror
</div>