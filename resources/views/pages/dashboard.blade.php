@extends('layouts.app-sidebar')
@section('title', 'Dashboard')


@section('contents')

                    <div class="container-fluid">             
                        
                        <div class="d-flex justify-content-center mt-5">
                            <div class="card w-75 bg-dark border-dark text-light p-5">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <picture>
                                                    
                                                    <img src="{{ asset('assets/images/dcismicon.png')}}" alt="dcism-logo" class="img-fluid rounded profile-stamp">
                                                </picture>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="text-light text-center fw-bolder fs-5">Hey there! &nbsp;<i class="mdi mdi-hand-wave"></i>Welcome to AI Survey System. Your feedback matters.
                                                     Fill out quick surveys, and let our  AI do  the work in making education even better for everyone.</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            <button class="btn btn-dark ">
                                Evaluate
                            </button>
                        </div>

                    </div>
                    <!-- container-fluid -->
                     
@endsection