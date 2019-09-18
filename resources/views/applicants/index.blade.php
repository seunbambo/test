{{-- @extends('layouts.app')

@section('content')
    <h1>Applicants</h1>
    @if(count($applicants) > 4)
        
                <h3 class="alert alert-danger">Application Closed!</h3>
            
            
       
    @else
        <p>No Applicant yet</p>
    @endif
@endsection --}}

@extends('layouts.app')

@section('content')
    <h1>Applicants</h1>
    @if(count($applicants) > 0)
        @foreach($applicants as $applicant)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width: 100%" src="/storage/x_ray/{{$applicant->passport}}">
                    </div>
                    <div class="col-md-8 col-sm-8"></div>
                </div>
            <h3><a href="/applicants/{{$applicant->id}}">{{$applicant->fname}}</a></h3>
           
            </div>
            <hr>
        @endforeach
        {{$applicants->links()}}
    @else
        <p>No applicant yet</p>
    @endif
@endsection