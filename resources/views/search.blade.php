@extends('partials.app.app')
@section('content')
{{--__________________________________--}}
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                @include('partials.index.search.search')
            </div>

            <!--[ SIDEBAR ]---------------------------------------------------------------------------------------------------->

            <div class="col-lg-3 hidden-md-down">
                @include('partials.index.sidebar.sidebar')
            </div>
        </div>
    </div>
</div>
{{--__________________________________--}}
@endsection
