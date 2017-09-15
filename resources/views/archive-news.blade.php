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
              <span>Новости</span>
            </h2>
            @include('partials.news.archive.news', [
             'posts_per_page' => 6,
             'pagination' => 1
            ])
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
{{--__________________________________--}}
@endsection
