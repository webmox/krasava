<?php
/* текущий тип поста--*/
$post_type = get_post_type(get_the_ID());
$bg_url = null;


if($post_type == 'bookmakers'){

    $bg_url = get_field('bookmakers-pic', 'option');
    $title_header = get_post_type_object( get_post_type() )->label;
    $descript = get_field('bookmakers-text', 'option');

}
/*если зашил в новости*/
else if($post_type == 'news'){

    $bg_url = get_field('news-pic', 'option');
    $title_header = get_post_type_object( get_post_type() )->label;
    $descript = get_field('news-text', 'option');

}
/*если зашил в таксономию прогнозов*/
else if(is_post_type_archive( $post_types = 'forecasts' )){
    $title_header = get_post_type_object( get_post_type() )->label;
    $descript = get_field('descript_forecasts', 'option');
}

/*если зашил в таксономию прогнозов*/
else if(is_tax('forecasts-list')){


    $cat = get_queried_object();
    $custom_title = get_field('custom_title', $cat->taxonomy.'_' . $cat->term_id);

    /*данные для получения данных из доп поля*/
    $queried_object = get_queried_object();
    $taxonomy = $queried_object->taxonomy;
    $term_id = $queried_object->term_id;

    /*получения данных*/
    $bg_url = get_field('картинка', $taxonomy . '_' . $term_id);
    $title_header = $queried_object->name;
    $descript = $queried_object->description;

}

if(is_single()){

    $cur_term = hey_top_parents('forecasts-list');

    if($cur_term){
        $term = array_shift($cur_term);

        $taxonomy = $term->taxonomy;
        $term_id = $term->term_id;

        $bg_url = get_field('картинка', $taxonomy . '_' . $term_id);
    }
}

$bg_url = $bg_url['url'];

?>

<div class="header_category_descriptin" <?php if($bg_url){ ?> style="background:url('<?php echo $bg_url; ?>') no-repeat  center center; background-size:cover;" <?php } ?>>
    <div class="container clearfix">
        <div class="left_blc">

            <?php if(is_single() and trim($post_type) == 'forecasts'){ ?>
            <div class="forecast_information">

                <?php the_post();?>


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
                    <input type="hidden" value="{{ $js_time }}" id="match_date">
                    @endif
                    <div class="block_timer_start">
                        <div id="countdown1"></div>
                        <div id="note"></div>
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
            <?php }else{ ?>
            <div class="description_block">
                @if($title_header)
                    <h1 class="title_cat title_line line_white">{{ $custom_title ? $custom_title : $title_header }}</h1>
                @endif
                <?php if($descript){ ?>
                    <div class="desc">
                        <?php echo $descript; ?>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <div class="right_blc">
            <div class="banner">
                <a href="#">
                    <img src="@dist('img/banner_sdb.png')" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
@php(wp_reset_query())