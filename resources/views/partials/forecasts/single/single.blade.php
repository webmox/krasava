@php(setPostViews(get_the_ID()))
<section class="wrap-article single-forecast">
  @php(the_post())
  @if(get_the_content())
    <article class="article text_style clearfix">

      <div class="header_forecasts_top">
          <div class="forecast_information">

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


              <div class="top_info">
                  @if($ivent = get_field('турнир'))
                      {{ $ivent }},
                  @endif
                  @if($team_name_1 or $team_name_2)
                      {{ $team_name_1 }} vs {{$team_name_2}}
                  @endif
              </div>

              <div class="comads_info">
                  <div class="comand_one">
                      <div class="thumb">
                        @if($team_logo_1)
                          <img src="{{ $team_logo_1 }}" alt="team">
                        @else
                            <img src="{{ $img_url_1 }}" alt="team">
                        @endif
                      </div>
                      <div class="comand_tx">{{ $team_1_help ? $team_1_help : $team_1 }}</div>
                  </div>

                  <div class="vs">vs</div>

                  <div class="comand_two">
                      <div class="comand_tx">{{ $team_2_help ? $team_2_help : $team_2 }}</div>
                      <div class="thumb">
                        @if($team_logo_2)
                          <img src="{{ $team_logo_2 }}" alt="team">
                        @else
                            <img src="{{ $img_url_2 }}" alt="team">
                        @endif
                      </div>
                  </div>
              </div>

              <div class="center_information">
                  @if($match_date = get_field('дата_события'))
                      @php
                          date_default_timezone_set("Europe/Moscow");
                          $js_time = strtotime($match_date);
                      @endphp
                  @endif
                  <div class="block_timer_start">
                      <div id="countdown2"></div>
                      <div id="note2"></div>
                  </div>
              </div>

              <div class="bottom_info">
                  @if($stadium = get_field('стадион'))
                      <span>{{ $stadium }}</span>
                  @endif
                  @if($ivent = get_field('турнир'))
                      <span>{{ $ivent }}</span>
                  @endif
                  @if($match_date)
                      <span>{{ date('d.m.y, h:i', strtotime($match_date)) }}</span>
                  @endif
              </div>
          </div>
      </div>

  @php(the_content())

    <div class="title-inforamtion">
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
    </div>
    </article>
  @endif

    @if($cof = get_field('bk_coefficients'))
    <div class="wrap_table_bets">
        <h2 class="title_line line_gray">
            <span>{{ $title }} Коэффициенты БК</span>
        </h2>
        <div class="table_bets">
            @foreach($cof as $key)
                <div class="row_bets">
                    <div class="main_info">
                        <div class="thumb">
                            <?php if ( $key['лого'] == 1 ) { ?>
                              <a target="_blank" href="{{ $key['ссылка'] }}"><img src="@dist('img/1xBet.png')" alt="1xBet"></a>
                            <?php }else if($key['лого'] == 2){ ?>
                              <a target="_blank" href="{{ $key['ссылка'] }}"><img src="@dist('img/marathon_logo_ru.png')" alt="marathon"></a>
                            <?php }else if($key['лого'] == 3){ ?>
                              <a target="_blank" href="{{ $key['ссылка'] }}"><img style="max-width:55px" src="@dist('img/Liga_stavok.png')" alt="Liga stavok"></a>
                            <?php } ?>
                        </div>
                        <div class="info_coef">
                            <div class="p1">
                                <div class="blc_p">
                                    <span>1</span>
                                    <span>{{ $key['bk_win1'] }}</span>
                                </div>
                            </div>
                            <div class="n">
                                <div class="blc_p">
                                    <span>X</span>
                                    <span>{{ $key['draw'] }}</span>
                                </div>
                            </div>
                            <div class="p2">
                                <div class="blc_p">
                                    <span>2</span>
                                    <span>{{ $key['bk_win2'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bcl_buttons">
                        <a target="_blank" href="{{ $key['ссылка'] }}" class="btn_default btn_yellow"><span>Ставка</span></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else

      <?php if($banners = get_field('banners_single', 'option')){ ?>
        <div class="wrap_logos">
          <?php foreach($banners as $item){ ?>
          <a target="_blank" href="<?= $item['link_site'] ?>" class="item_logo circle circle-build animated">
            <?php if($item['img_banner']){ ?>
            <img src="<?=$item['img_banner'] ?>" alt="banner">
            <?php } ?>
          </a>
          <?php } ?>
        </div>
      <?php } ?>

    @endif

</section>