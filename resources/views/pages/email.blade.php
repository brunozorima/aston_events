@extends('layouts.app')
@section('content')
    <h1>{!!$name!!} {!!$surname!!}</h1>
    <h1>{!!$email!!}</h1>
    <p>{!!$message!!}</p>
@endsection