@php
  setPostViews(get_the_ID());
  $no_img = get_field('no_img', 'option');
  $no_img = $no_img['sizes']['bk_pic'];
@endphp

<div class="bookmaker-single">
  <div class="bookmaker_header">
    <h1 class="title_line line_green">
      <span>{{the_title()}}</span>
    </h1>
  </div>
  <div class="bookmaker_description">
    @if(has_post_thumbnail())
      {{ the_post_thumbnail('bk_pic', ['class' => 'thumbnail']) }}
    @else
      <img src="{{ $no_img }}" alt="no-img">
    @endif
  </div>
  <div class="more_information_bookmaker text_style">

    <h4 style="font-weight: 600; padding-bottom: 15px;">Информация о букмекере</h4>

    <div class="table_style">
		<?php if ($website = get_field( 'адрес_сайта' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Адрес сайта:</div>
        <div class="td_cell">
          <a target="_blank" href="<?php echo $website; ?>">
			  <?php echo $website; ?>
          </a>
        </div>
      </div>
		<?php endif; ?>

		<?php if ($foundations = get_field( 'год_основания' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Год основания:</div>
        <div class="td_cell"><?php echo $foundations; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($country = get_field( 'страна' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Страна:</div>
        <div class="td_cell"><?php echo $country; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($license = get_field( 'лицензия' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Лицензия:</div>
        <div class="td_cell"><?php echo $license; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($contacts = get_field( 'контакты' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Контакты:</div>
        <div class="td_cell"><?php echo $contacts; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($languages = get_field( 'языки' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Языки:</div>
        <div class="td_cell"><?php echo $languages; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($directions = get_field( 'направления' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Направления:</div>
        <div class="td_cell"><?php echo $directions; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($currency = get_field( 'валюты_счетов' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Валюты счетов:</div>
        <div class="td_cell"><?php echo $currency; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($min_depos = get_field( 'минимальный_депозит' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Минимальный депозит:</div>
        <div class="td_cell"><?php echo $min_depos; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($Input_methods = get_field( 'способы_ввода' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Способы ввода:</div>
        <div class="td_cell">
			<?php echo $Input_methods; ?>
        </div>
      </div>
		<?php endif; ?>

		<?php if ($output_methods = get_field( 'способы_вывода' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Способы вывода!!:</div>
        <div class="td_cell">
			<?php echo $output_methods; ?>
        </div>
      </div>
		<?php endif; ?>

		<?php if ($first_deposit_bonus = get_field( 'бонусы_на_первый_депозит' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Бонусы на первый депозит:</div>
        <div class="td_cell"><?php echo $first_deposit_bonus; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($min_rate = get_field( 'минимальная_ставка' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Минимaльная cтавка:</div>
        <div class="td_cell"><?php echo $min_rate; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($max_rate = get_field( 'максимальная_ставка' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Максимальная cтавка:</div>
        <div class="td_cell"><?php echo $max_rate; ?></div>
      </div>
		<?php endif; ?>

		<?php $mob_ver = get_field( 'mob_ver' ) ?>
		<?php if ($mob_ver) : ?>
      <div class="tr_row">
        <div class="td_cell">Мобильная версия:</div>
        <div class="td_cell">Есть</div>
      </div>
		<?php endif; ?>

		<?php if ($live_betting = get_field( 'ставки_live' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Ставки Live:</div>
        <div class="td_cell"><?php echo $live_betting; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($video_matches = get_field( 'видеотрансляция_матчей' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Видеотрансляция матчей:</div>
        <div class="td_cell"><?php echo $video_matches; ?></div>
      </div>
		<?php endif; ?>

		<?php if ($virt_sports = get_field( 'виртуальный_спорт' )) : ?>
      <div class="tr_row">
        <div class="td_cell">Виртуальный спорт:</div>
        <div class="td_cell"><?php echo $virt_sports; ?></div>
      </div>
		<?php endif; ?>

		<?php
      $mob_and = get_field( 'android' );
      $mob_apl = get_field( 'apple' );
		?>

      <div class="tr_row">
        <div class="td_cell">Мобильное приложение:</div>
        <div class="td_cell">
              @if($mob_and == 1)
                  <img src="@dist('img/Google-Play.png')" alt="pic">
              @endif

              @if($mob_apl == 1)
                  <img src="@dist('img/App-Store.png')" alt="pic">
              @endif

              <?php if ($mob_and == 0 && $mob_apl == 0) { ?>
              Нет
              <?php } ?>
        </div>

      </div>
    </div>
  </div>

  <div class="links_bookmakers clearfix p-t-30 p-b-30">
    <a class="btn_default btn_yellow" target="_blank" href="<?php echo get_field( 'адрес_сайта' ); ?>">
      <span>Перейти на сайт</span>
    </a>
  </div>

</div>




