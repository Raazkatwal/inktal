@extends('frontend.layouts.app')

@section('title')
    {{ __('dashboard') }}
@endsection

@section('main')
    <div class="dashboard-wrapper">
        <div class="container">
            <div class="row">
                <x-website.candidate.sidebar />
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard-right-header">
                            <div class="left-text">
                                <h5>{{ __('hello') }}, {{ auth()->user()->name }}</h5>
                                <p class="m-0 r-c">{{ __('choose one Template') }}
                                </p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="single-feature-box">
                                  <a href="{{route('candidate.resume1')}}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{asset('cvs/images/resume1/1.jpeg')}}" alt="Feature Image" class="img-fluid">
                                </a>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="single-feature-box">
                                    <img src="https://via.placeholder.com/300" alt="Feature Image" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="single-feature-box">
                                    <img src="https://via.placeholder.com/300" alt="Feature Image" class="img-fluid">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-footer text-center body-font-4 text-gray-500">
        <x-website.footer-copyright />
    </div>
@endsection
