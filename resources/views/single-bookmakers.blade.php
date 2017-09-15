@extends('partials.app.app')
@section('content')
{{--__________________________________--}}
  <div class="main-container">
    <div class="container container-middle">
      <div class="row">

        <!--[ MAIN ]--------------------------------------------------------------------------------------------------->

        <div class="col-lg-9">
          <section class="default_section blc-default">
            @include('partials.bookmakers.single.bookmakers')
            @include('partials.single.comments.comments')
          </section>
        </div>

        <!--[ SIDEBAR ]------------------------------------------------------------------------------------------------>

        <div class="col-lg-3 hidden-md-down">
          @include('partials.index.sidebar.sidebar')
        </div>

      </div>
    </div>
  </div>
{{--__________________________________--}}
@endsection
