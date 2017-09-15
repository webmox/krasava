@php
  $args = array(
    'post_type'      => 'news',
    'posts_per_page' => $posts_per_page ? $posts_per_page : 6,
    'order'          => 'DESC',
    'orderby'        => 'date',
    'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
  );
  if(is_single()) {
    $args['post__not_in'] = array(get_the_ID());
  }

  if (is_archive()) {
    $title = 'Новости';
    $description = 160;
  }
  if (is_single()) {
    $title = 'Похожие новости';
    $description = 140;
  }

  $query = new WP_Query( $args );

@endphp

@if($query->have_posts())
  <section class="archive_news">
    <div class="list_items">
      @while($query->have_posts()) @php($query->the_post())
      <div class="item-news">
        @if(has_post_thumbnail())
          <div class="thumbnail-block">
            <a href="{{ get_the_permalink() }}">
              @php (the_post_thumbnail('news', ['class' => 'img-responsive']))
            </a>
          </div>
        @endif

        @php

           $terms = get_the_terms(get_the_ID(), 'news-list');

           if( $terms ){
              $term = array_shift( $terms );
               $id_tax = $term->term_id;
           }

        @endphp

        <div class="title_wrap">
            <div class="title_left">
              <h4 class="title_item">
                <a href="{{ get_the_permalink() }}">
                  {{ get_the_title() }}
                </a>
              </h4>
            </div>
            <div class="title_right">
              <a class="cat_link" href="{{get_category_link($id_tax)}}">{{get_cat_name($id_tax)}}</a>
            </div>
        </div>

        <div class="description">
          @php
            $title = cut(get_the_content(), !has_post_thumbnail() ? 200 : $description);
            echo $title . " … ";
          @endphp
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
@endif
@php(wp_reset_query())