@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <h3>Applicants</h3>
                    @if(count($applicants) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>First Name</th>
                                <th>Surname</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Cover Letter</th>
                                <th>Passport</th>
                                <th>Resume</th>
                            </tr>
                            @foreach($applicants as $applicant)
                                <tr>
                                <td>{{$applicant->fname}}</td>
                                <td>{{$applicant->sname}}</td>
                                <td>{{$applicant->phone}}</td>
                                <td>{{$applicant->email}}</td>
                                <td>{{$applicant->cover_letter}}</td>
                                <td>{{$applicant->passport}}</td>
                                <td>{{$applicant->resume}}</td>
                                
                                    
                                </tr>
                            @endforeach
                        </table>
                    @else
                         <p>You have no applicant yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
