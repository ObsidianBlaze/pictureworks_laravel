@extends('layouts.main')
@section('content')

    @if(session('successMsg'))
    <div class="alert alert-success" role="alert">

        {{session('successMsg')}}

    </div>
    @endif

@endsection
