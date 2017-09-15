<aside class="SIDEBAR">

  @if($myterms = get_terms( 'forecasts-list', array('parent' => 0, 'orderby' => 'term_id')))
    <div class="widget">
      <div class="owl-carousel carousel_widget list-forecasts owl-theme">
        @foreach($myterms as $cat)
          @php ($icon = get_field('иконка', 'forecasts-list_' . $cat->term_id))

          <div class="item">
            <div class="inner-item">
              <a href="{{ get_term_link($cat->term_id) }}">
                <h4 class="title-widget <?php if($icon['url']){ echo 'has_icon'; } ?>">
                  <?php if($icon['url']){ ?>
                    <img class="title_icon" src="{{ $icon['url'] }}" alt="icon">
                  <?php } ?>
                  {{ $cat->name }}
                </h4>
              </a>
              <div class="inner_widget">
                <ul class="items_elements">
                  @if ($sub_terms = get_terms( 'forecasts-list', array( 'parent' => $cat->term_id )))
                    @foreach($sub_terms as $sub_cat)
                      <li class="item_el">
                        {{--<span class="icon_el"></span>--}}
                        <a href="{{ get_term_link( $sub_cat->term_id ) }}" class="text">
                          {{ $sub_cat->name }}
                        </a>
                      </li>
                    @endforeach
                  @endif
                </ul>
                <div class="wrap_btn">
                  <a href="{{ get_term_link($cat->term_id) }}" class="btn_default btn_red"><span>Все турниры</span></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endif

  <?php

    $bookmakers = new WP_Query(array('post_type'=>'bookmakers', 'posts_per_page'=>5,
          'meta_query' => array(
            array(
                'key'     => 'show_in_sidebar',
                 'value'   => 1,
            )
          )
       ));

    $all_get_bk = $bookmakers->found_posts;
  ?>

  @if($all_get_bk)
  <div class="widget">
    <h4 class="title-widget">Лучшие Б.К</h4>
    <div class="list-bookmakers">
      @while($bookmakers->have_posts()) @php($bookmakers->the_post())
          @php
            $raiting = get_field('рейтинг');
            $no_img = get_field('no_img', 'option');
            $no_img = $no_img['sizes']['bk_logo'];
          @endphp
          <div class="item_el">
            @if(has_post_thumbnail())
            <span class="thumbnail_block">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('bk_logo'); ?></a>
            </span>
            @else
               <span class="thumbnail_block">
                <a href="<?php the_permalink(); ?>"><img src="{{$no_img}}"></a>
              </span>
             @endif
            @if($raiting) <span href="<?php the_permalink(); ?>" class="coef_num">{{$raiting}}</span> @endif
          </div>
      @endwhile
      <div class="wrap_btn">
        <a href="{{ get_post_type_archive_link('bookmakers') }}" class="btn_default btn_red"><span>Рейтинг Б.К</span></a>
      </div>
  </div>
  @endif
</aside>