@php
  $args = array(
    'post_type'      => 'bookmakers',
    'posts_per_page' => $posts_per_page ? $posts_per_page : 6,
    'order'          => 'DESC',
    'orderby'        => 'date',
    'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
  );
  $query = new WP_Query( $args );
  $no_img = get_field('no_img', 'option');
  $no_img = $no_img['sizes']['bk_pic'];


@endphp


@if($query->have_posts())
<div class="bookmakers_list">
  @while($query->have_posts()) @php($query->the_post())
  <div class="bookmaker_item">
    <div class="bookmaker_header">
        <div class="name_th">Название</div>
        <div class="has_bonuses_th">Бонусы</div>
        <div class="raiting_th">Рейтинг</div>
        <div class="info_th">Обсуждение</div>
        <div class="btn_blc_th">Перейти</div>
    </div>
    <div class="bookmaker_main">
      <div class="name">
        <div class="thumbnail">
          @if(has_post_thumbnail())
            {{ the_post_thumbnail('cat_pic', ['class' => 'thumbnail']) }}
          @else
            <img src="{{ $no_img }}" alt="no-img">
          @endif
        </div>
      </div>
      <div class="has_bonuses">
        @php
          $has_bonuses = get_field('has_bonuses');
        @endphp
        @if($has_bonuses)
          <span class="bonuse_yes"><img src="@dist('img/Bonus.png')" alt=""></span>
        @else
          <span class="bonuse_not"> <div class="minus"></div></span>
        @endif
      </div>
      <div class="raiting">{{ get_field('рейтинг') }}</div>
      <div class="info">
        <div class="inforamtion">
          <span class="comment">
            <i class="fa fa-comments-o" aria-hidden="true"></i>
            <span class="tx">{{ get_comments_number() }}</span>
          </span>
           <span class="view">
            <i class="fa fa-eye" aria-hidden="true"></i>
            <span class="tx">{{ getPostViews(get_the_ID()) }}</span>
          </span>
        </div>
      </div>
      <div class="btn_blc">
        <a href="{{ get_the_permalink() }}" class="btn_default btn_green"><span>Обзор</span></a>
      </div>
    </div>
  </div>
  @endwhile
</div>
@endif

@php(wp_reset_query())
