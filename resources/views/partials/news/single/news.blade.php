@php(setPostViews(get_the_ID()))

<section class="wrap-article single-news">
  <header class="header-article">

    <div class="title-inforamtion">
      <h1 class="title_line line_green">
        <span>{{the_title()}}</span>
      </h1>
    </div>
  </header>

  @php(the_post())
  @if(get_the_content())
    <article class="article text_style clearfix">
      @if(has_post_thumbnail())
        @php (the_post_thumbnail('news', ['class' => 'img-responsive thumbnail-single']))
      @endif
      {{ the_content()  }}
       <div class="inforamtion">
        <span class="time">
          <span class="tx">{{ get_the_date('d.m.Y') }}&#160;&#160;{{ get_the_date('h:m') }}</span>
        </span>
        <span class="comment">
          <i class="fa fa-comments-o" aria-hidden="true"></i>
          <span class="tx">{{ get_comments_number() }}</span>
        </span>
        <span class="view">
          <i class="fa fa-eye" aria-hidden="true"></i>
          <span class="tx">{{ getPostViews(get_the_ID()) }}</span>
        </span>
       </div>
    </article>
  @endif

</section>