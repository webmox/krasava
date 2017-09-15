@extends('partials.app.app')
@section('content')
{{--__________________________________--}}
  <div class="main-container">
    <div class="container container-middle">
      <div class="row">

        <!--[ MAIN ]--------------------------------------------------------------------------------------------------->

        <div class="col-lg-9">
          <section class="default_section blc-default">
            <h2 class="title_line line_green">
              <span>Рейтинг БК</span>
            </h2>
            @include('partials.bookmakers.archive.bookmakers')
            @include('partials.archive.pagination.pagination')
          </section>
        </div>

        <!--[ SIDEBAR ]------------------------------------------------------------------------------------------------>

        <div class="col-lg-3 hidden-md-down">
          @include('partials.index.sidebar.sidebar')
        </div>

      </div>
    </div>
  </div>
<!--[ SEO ]-------------------------------------------------------------------------------------------------->
@include('partials.index.seotext.seotext')
{{--__________________________________--}}
@endsection
