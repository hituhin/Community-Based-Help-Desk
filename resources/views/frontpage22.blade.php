@extends('layouts.app-frontend')

@section('content')
    


<div class="row mt-5">
    <div class="col-md-6 align-self-center ">
        <div class="card card-stats">
            <div class="card-body text-center">
                <h2 style="font-style: italic;">"Alone we can do so little; together we can do so much."</h2>
                <P>– Helen Keller</P>
                <p>Thousand of friends to help you do your best work.</p>
            </div>
            <div class="text-center mt-2 mb-5">
                <a href="{{ route('login') }}" class="btn btn-primary"> Get Started </a> 
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="team-tech-image">
            <img src="{{ asset('assets2/img/img/team-image.png') }}" class="rounded img-fluid" alt="Responsive image">            
        </div>
    </div>

</div>  

@endsection