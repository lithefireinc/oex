@extends('app')
@section('content')
    <!-- Form area -->
    <div class="error-page">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <!-- Widget starts -->
                    <div class="widget">
                        <!-- Widget head -->
                        <div class="widget-head">
                            <i class="fa fa-question-circle"></i> Error
                        </div>

                        <div class="widget-content">
                            <div class="padd error">

                                <h1>404 Error. The requested page could not be found.</h1>
                                <p><a href="{{ url('/') }}">Click Here</a> to go back to the home page. </p>
                                <br />

                            </div>
                            <div class="widget-foot">
                                <!-- Footer goes here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection