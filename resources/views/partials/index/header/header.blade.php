
<div class="formasearch-block">
  <div class="container">
    <form class="search_form" action="/" method="GET">
      <input class="serchBox" name="s" placeholder="Найти ..." onfocus="placeholder='Найти ...';" onblur="placeholder='Найти ...';" required="">
      {{--<input class="searchsubmit btn_read" type="submit" id="searchsubmit" value="найти"/>--}}
    </form>
  </div>
</div>
<div class="hover_div"></div>

<div class="header_mobile_block">
  <div class="container clearfix">

    <div class="wrap_btns_header ">
      <a href="{{ get_post_type_archive_link('bookmakers') }}" >Рейтинг БК</a>
      <a href="{{ get_post_type_archive_link('news') }}">Новости</a>
    </div>
    <ul class="social">
      @if ($social = get_field('social', 'option'))
        @foreach ($social as $value)
          <li><a href="{{  $value['ссылка'] }}" target="_blank"><i class="fa {{  $value['иконка'] }}" aria-hidden="true"></i></a></li>
        @endforeach
      @endif
    </ul>
  </div>
</div>

<header class="header clearfix">
  <div class="container">
    <!--[ LOGO ]-->

      <a href="@php(bloginfo('url'))" class="logo">krasava<span>bet</span></a>

      <div class="wrap_btns_header ">
        <a href="{{ get_post_type_archive_link('bookmakers') }}" >Рейтинг БК</a>
        <a href="{{ get_post_type_archive_link('news') }}">Новости</a>
      </div>

      <ul class="social">
        @if ($social = get_field('social', 'option'))
          @foreach ($social as $value)
            <li><a href="{{  $value['ссылка'] }}" target="_blank"><i class="fa {{  $value['иконка'] }}" aria-hidden="true"></i></a></li>
          @endforeach
        @endif
        <li>
          <a href="#" class="btn_search">
            <i class="fa fa-search" aria-hidden="true"></i>
          </a>
        </li>
      </ul>

  </div>
</header>

@include('partials.index.menu.menu')
@include('partials.index.mob_menu.mobmenu')

<?php if(is_home()){ ?>

  @include('partials.index.slider.slider')

<?php }else{ ?>

  @php(wp_reset_query())
  @include('partials.archive.breadcrumbs.breadcrumbs')
  @include('partials.archive.archiveinfo.archiveinfo')

<?php } ?>



