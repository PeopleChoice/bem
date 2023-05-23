@php
    $class ??= null;
    $name ??= "";
    $value ??='';
    $label  ??= Str::ucfirst($name);
    $multiple ??=false;
    $placholder ??='';
    $list_item ??=[];

@endphp

<div @class(["form-group",$class])>
    <label for="{{ $name }}">{{ $label }}</label>
 
    <select 
            id="{{ $name }}" 
            name="{{ $name }}" 
            class="form-control 
            @error($name) is-invalid  @enderror"
            @if($multiple == true) multiple @endif
            placeholder="{{ $placholder }}"
        >
        <option value="">{{ $placholder }}</option>
       
        @foreach ($list_item as $item )
               
                <option  value="{{ $item['id'] }}">{{ $item['name'] }}</option>

        @endforeach
    </select>
    
    @error($name)
        <div class="invalide-feedback">
            {{ $message }}
        </div>
    @enderror
</div>