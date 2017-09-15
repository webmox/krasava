@extends('partials.app.app')
@section('content')
{{--__________________________________--}}
  <div class="main-container">
    <div class="container container-middle">
      <div class="row">
        <div class="col-lg-9">

          <section class="default_section blc-default">

            <?php
              $cat = get_queried_object();
              $custom_title = get_field('custom_title', $cat->taxonomy.'_' . $cat->term_id);
            ?>

            <h1 class="title_line line_green">
              <span> <?php echo $custom_title ? $custom_title : $cat->name ?> </span>
            </h1>
            @include('partials.forecasts.index.index', [
              'category_id'    => get_queried_object()->term_id,
              'posts_per_page' => 8,
              'pagination'     => 1
            ])
          </section>

        </div>

        <!--[ SIDEBAR ]------------------------------------------------------------------------------------------------>

        <div class="col-lg-3 hidden-md-down">
          @include('partials.index.sidebar.sidebar')
        </div>

      </div>
    </div>
    <!--[ SEO ]-------------------------------------------------------------------------------------------------->
    @include('partials.index.seotext.seotext')
  </div>
{{--__________________________________--}}
@endsection