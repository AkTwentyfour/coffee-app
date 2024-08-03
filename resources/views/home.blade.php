@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card welcome-card">
                <div class="card-header">
                    <div class="fs-5 fw-bold text-center">Welcome To Barbarian Cafe!</div>
                </div>
                
                <div class="card-body d-flex flex-column justify-content-evenly align-items-center p-5">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <div>
                        This APP is developed and maintained by Anydross, We strive to create innovative and reliable software solutions. For more information about our team and other projects, visit <a href="">anydros.com</a>.<br>
                        <br>
                        Code crafted by Kamal.
                    </div>
                    <div class="text-center mt-auto">
                        <div class="fs-7 mb-2">Supported By</div>
                        <img src="{{ asset('img/anydros-logo.png') }}" height="40">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
