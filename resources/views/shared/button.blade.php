@php
    $nom??="";
    $route??="";
    $class??="";
@endphp


<div>
    <a class="{{ $class }}" href="{{ route('{{ $route }}') }}" >{{ $nom }}</a>
</div>