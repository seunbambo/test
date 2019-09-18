@extends('layouts.app')

@section('content')
    <a href="/patients" class="btn btn-default">Go Back</a>
    <h1>{{$patient->name}}</h1>
    <div>
        <b>Address: </b>{{$patient->home_address}} <br>
        <b>Email: </b>{{$patient->email}} <br>
        <b>Telephone: </b>{{$patient->phone}} <br>
        <b>Health Issue: </b>{{$patient->health_issue}} <br>
    </div>
    <hr>
    <small>Created on {{$patient->created_at}} by {{$patient->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $patient->user_id)
            <a href="/patients/{{$patient->id}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open(['action' => ['PatientsController@destroy', $patient->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection