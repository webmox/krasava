@extends('partials.app.app')
@section('content')
{{--__________________________________--}}
<div class="main-container">
  <div class="container container-middle">
    <div class="row">

      <div class="col-lg-9">
        <section class="default_section blc-default">
          @include('partials.news.single.news')
          @include('partials.single.comments.comments', [
            'class' => ['']
          ])
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
