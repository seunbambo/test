@extends('layouts.app')

@section('content')
    <h1>Application Form</h1>
    {!! Form::open(['action' => 'ApplicantsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('fname', 'FirstName')}}
            {{Form::text('fname', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('sname', 'Surname')}}
            {{Form::text('sname', '', ['class' => 'form-control', 'placeholder' => 'Surname'])}}
        </div>
        <div class="form-group">
                {{Form::label('phone', 'Phone')}}
                {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Telephone'])}}
        </div>
        <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
        </div>
        <div class="form-group">
                {{Form::label('cover_letter', 'Cover Letter')}}
                {{Form::textarea('cover_letter', '', ['class' => 'form-control', 'placeholder' => 'Cover Letter'])}}
        </div>
        <div class="form-group">
                {{Form::label('passport', 'Passport')}}
                {{Form::file('passport', array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
                {{Form::label('resume', 'Resume')}}
                {{Form::file('resume', array('class' => 'form-control'))}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection