@extends('layouts.app-sidebar')
@section('title', 'Admin Dashboard')


@section('contents')      
                    <div class="container-fluid">         

                        <!-- row -->
                        <div class="row">

                            <div class="col-12 mb-5">
                                <!-- card -->
                                <h2 class="txt-greetings">Admin Analytics Report</h2>
                                <div class="btn-group w-lg">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Info <i class="mdi mdi-chevron-down"></i></button>
                                    <div class="dropdown-menu dropdownmenu-info">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div><!-- /btn-group -->
                                <!-- end col -->
                            </div>

                        </div>
            


                        <div class="row">

                            <div class="col-sm-4">
                                <div class="card card-h-100">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="text-muted d-block mb-3 text-truncate">Total Surveys</span>
                                                <h3 class="text-center">
                                                    <span class="counter-value" data-target="">0</span>
                                                </h3>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-sm-4">
                                <div class="card card-h-100">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Feedback Trend</span>
                                                <h3 class="text-center">
                                                    <span class="counter-value" data-target="">0</span>
                                                </h3>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-sm-4">
                                <div class="card card-h-100">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Top Faculty</span>
                                                <h3 class="text-center">
                                                    <span class="counter-value" data-target="">0</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end row-->

                        <div class="row">
                                                        
                                <!-- First Card (Upcoming Birthdays) -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header border-bottom-dashed mx-auto" style="width: 90%;">
                                            <h4 class="card-title">Feedback Sentiment Timeline</h4>

                                        </div>
                                        <div class="card-body">                                       
                                            <div class="table-responsive d-flex justify-content-center" style="max-height: 300px; overflow-y: auto;">
                                                <table class="table align-middle mb-0">
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                
                    </div>
                    <!-- container-fluid -->
                
 


@endsection
