@extends('partials.app.app')
@section('content')
{{--__________________________________--}}
  <div class="main-container">
    <div class="container container-middle">
      <div class="row">
        <div class="col-lg-9">

          <!--[ ФУТБОЛ ]----------------------------------------------------------------------------------------------->

          <section class="default_section">
            @include('partials.index.title.title', [
              'title' => 'футбол',
              'category_id' => 13,
            ])
           @include('partials.forecasts.index.index', [
           'category_id' => 13,
           ])
            @include('partials.index.button.button', [
              'category_id' => 13,
            ])
          </section>

          <!--[ ТЕННИС ]----------------------------------------------------------------------------------------------->

          <section class="default_section">
            @include('partials.index.title.title', [
              'title' => 'теннис',
              'category_id' => 14,
            ])
            @include('partials.forecasts.index.index', [
              'category_id' => 14,
            ])
            @include('partials.index.button.button', [
              'category_id' => 14,
            ])
          </section>

          <!--[ БАСКЕТБОЛ ]-------------------------------------------------------------------------------------------->

          <section class="default_section">
            @include('partials.index.title.title', [
              'title' => 'баскетбол',
              'category_id' => 15,
            ])
            @include('partials.forecasts.index.index', [
              'category_id' => 15,
            ])
            @include('partials.index.button.button', [
              'category_id' => 15,
            ])
          </section>

          <!--[ ХОККЕЙ ]----------------------------------------------------------------------------------------------->

          <section class="default_section">
            @include('partials.index.title.title', [
              'title' => 'хоккей',
              'category_id' => 16,
            ])
            @include('partials.forecasts.index.index', [
              'category_id' => 16,
            ])
            @include('partials.index.button.button', [
              'category_id' => 16,
            ])
          </section>

          <!--[ ВАЛЕЙБОЛ ]--------------------------------------------------------------------------------------------->

          <section class="default_section">
            @include('partials.index.title.title', [
              'title' => 'волейбол',
              'category_id' => 17,
            ])
            @include('partials.forecasts.index.index', [
              'category_id' => 17,
            ])
            @include('partials.index.button.button', [
              'category_id' => 17,
            ])
          </section>

          <!--[ БОКС ]------------------------------------------------------------------------------------------------->

          <section class="default_section">
            @include('partials.index.title.title', [
              'title' => 'боксу',
              'category_id' => 18,
            ])
            @include('partials.forecasts.index.index', [
              'category_id' => 18,
            ])
            @include('partials.index.button.button', [
              'category_id' => 18,
            ])
          </section>

          <!--[ UFC ]-------------------------------------------------------------------------------------------------->

          <section class="default_section blc-default">
            @include('partials.index.title.title', [
              'title' => 'UFC',
              'category_id' => 19,
            ])
            @include('partials.forecasts.index.index', [
              'category_id' => 19,
            ])
            @include('partials.index.button.button', [
              'category_id' => 19,
            ])
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
