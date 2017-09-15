<div class="default_section blc-default">
  <div class="formasearch">
    <form class="search_form" action="/" method="GET">
      <input class="serchBox" name="s" placeholder="Найти" onfocus="placeholder='';" onblur="placeholder='Найти';"
             required="">
      <input class="searchsubmit btn_read" type="submit" id="searchsubmit" value="найти"/>
    </form>
  </div>


  @if(have_posts())
    <section class="archive_news">
      @php global $wp_query; @endphp

      <h3 class="m-t-30">
        @php
          plural_form(
            $wp_query->found_posts,
            array('Найдено','Найдено','Найдено'),
            array('совпадение','совпадения','совпадений')
          );
        @endphp
      </h3>
      <div class="list_items">
        @while(have_posts()) @php(the_post())
        <div class="item-news">
          @if(has_post_thumbnail())
            <div class="thumbnail-block">
              <a href="{{ get_the_permalink() }}">
                @php (the_post_thumbnail('news', ['class' => 'img-responsive']))
              </a>
            </div>
          @endif
          <h4 class="title_item">
            <a href="{{ get_the_permalink() }}">
              {{ get_the_title() }}
            </a>
          </h4>
          <div class="description">
            <?php
              $title = get_the_content();
              $title = cut($title, 145);
              echo $title." … ";
            ?>
          </div>
          <div class="info-block clearfix">
            <span class="time">{{ get_the_date('d.m.Y') }}&#160;&#160;{{ get_the_date('h:m') }}</span>
            <span class="comment"><i class="fa fa-comments-o" aria-hidden="true"></i>{{ get_comments_number() }}</span>
            <span class="view"><i class="fa fa-eye" aria-hidden="true"></i>{{ getPostViews(get_the_ID()) }}</span>
          </div>
        </div>
        @endwhile
      </div>
    </section>
    @else
      <div class="resulp_search">
        <div class="result_title">Ваш поиск не дал результатов</div>
      </div>
  @endif
  @php(wp_reset_query())

  @include('partials.archive.pagination.pagination', [
    'query' => $wp_query
  ])
</div>