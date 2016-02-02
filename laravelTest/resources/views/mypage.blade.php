@extends('master')

@section('main_content')
    @foreach($customers as $customer)
        <p>{{ $customer->name }}</p>
    @endforeach

    @if(true)
        {{ 'hello' }}
    @endif
@stop
