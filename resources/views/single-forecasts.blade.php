@extends('partials.app.app')
@section('content')
{{--__________________________________--}}
  <div class="main-container">
    <div class="container container-middle">
      <div class="row">

        <!--[ MAIN ]--------------------------------------------------------------------------------------------------->

        <div class="col-lg-9">
          <section class="default_section blc-default">
            @include('partials.forecasts.single.single')

            <h2 class="title_line line_gray">
              <span>Похожие прогнозы</span>
            </h2>

            <?php

            $cat = get_the_terms(get_the_ID(), 'forecasts-list');

            ?>
            @include('partials.forecasts.index.index', [
              'category_id'    => $cat[0]->term_id,
              'posts_per_page' => 4
            ])
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
