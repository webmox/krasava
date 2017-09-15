@extends('partials.app.app')
@section('content')
{{--__________________________________--}}
  <div class="main-container">
    <div class="container container-middle">
      <div class="row">

        <div class="col-lg-9">
          <section class="default_section blc-default">
            <h2 class="title_line line_gray">
              <span>Все прогнозы</span>
            </h2>
            @include('partials.forecasts.archive.forecasts')
            @include('partials.archive.pagination.pagination')
          </section>
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
