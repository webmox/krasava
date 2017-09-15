
@if(have_posts())
  @while(have_posts()) @php(the_post())

  <div class="predictions_list">
    <div class="prediction_item">

      @php
        $pic_1 = get_field('команда_1_лого'); //fc_logo
        $pic_2 = get_field('команда_2_лого');
      @endphp

      @php
        $team_1 = get_field('команда_1'); $team_1_help = get_field('команда_1_help');
        $team_2 = get_field('команда_2'); $team_2_help = get_field('команда_2_help');

        $team_1_ico = mb_strtolower(str_replace(" ","_", $team_1));
        $team_2_ico = mb_strtolower(str_replace(" ","_", $team_2));

        $team_logo_1 = get_field('команда_1_лого');
        $team_logo_2 = get_field('команда_2_лого');

        if($team_logo_1) {$team_logo_1 = $team_logo_1['sizes']['fc_logo'];}
        if($team_logo_2) {$team_logo_2 = $team_logo_2['sizes']['fc_logo'];}


        $img_url_1 = get_template_directory_uri()."/assets/images/teams/football/".$team_1_ico.".png";
        $img_url_2 = get_template_directory_uri()."/assets/images/teams/football/".$team_2_ico.".png";

      @endphp

      <div class="one_row">
        <div class="comand_info cell-left">
          <span>

            @if($team_logo_1)
              <img src="{{ $team_logo_1 }}" alt="team">
            @else
                <img src="{{ $img_url_1 }}" alt="team">
            @endif

          </span>
          <span>{{ $team_1_help ? $team_1_help : $team_1 }}</span>
          <span class="coef">{{ get_field('команда_1_коф') }}</span>
        </div>
        @php
          $cat = get_the_terms(get_the_ID(), 'forecasts-list');
          foreach ($cat as $item) {
              if($item->parent === $category_id) {
                  $cat_name  = $item->name;
                  $cat_link  = $item->term_id;
                  $cat_class = 'parent';
              }
          }
        @endphp

        <div class="chemp_info cell-middle">
          @if($cat_class)
            <a href="{{ get_term_link($cat_link) }}">
              {{ $cat_name }}
            </a>
          @endif
        </div>

        <div class="bottons_blc cell-right">
          <span class="time">
              @php
                the_time('H.s | d.m.Y');
              @endphp
          </span>
          <a href="{{ the_permalink() }}" class="btn_default  btn_green"><span>Обзор</span></a>
        </div>
      </div>
      <div class="two_row">
        <div class="comand_info cell-left">
          <span class="thumb">
            @if($team_logo_2)
              <img src="{{ $team_logo_2 }}" alt="team">
            @else
                <img src="{{ $img_url_2 }}" alt="team">
            @endif
          </span>
          <span class="txt_comand">{{ $team_2_help ? $team_2_help : $team_2 }}</span>
          <span class="coef">{{ get_field('команда_2_коф') }}</span>
        </div>
        <div class="timer cell-middle">
          @php
            $ivent = get_field('дата_события');
             $ex_date = explode(" ", $ivent);
          @endphp
          <span>{{ $ex_date[1] }}</span>
          <span>{{ $ex_date[0] }}</span>
        </div>
        <div class="bottons_blc cell-right">
            <span class="info_post">
                <span class="comment">
                  <i class="fa fa-comments-o" aria-hidden="true"></i>
                  <span class="tx">{{ get_comments_number() }}</span>
                </span>
                <span class="view">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                  <span class="tx">{{ getPostViews(get_the_ID()) }}</span>
                </span>
            </span>
          <a href="{{ the_permalink() }}" class="btn_default btn_yellow"><span>Ставка</span></a>
        </div>
      </div>
    </div>
  </div>


  @endwhile
  @php(wp_reset_query())
@endif











