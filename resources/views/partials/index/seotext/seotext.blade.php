@php
  $mgCurParent = &get_term(get_queried_object()->term_id, 'forecasts-list');
    if ($mgCurParent->parent == 0) {
        $mgGlobalParent = $cat;
    } else{
        $mgCurCatID = $cat;
        do {
            $mgCurParent = &get_term($mgCurCatID,'forecasts-list');
            $mgCurCatID = $mgCurParent->parent;
            $mgGlobalParent = $mgCurParent->term_id;
        } while ($mgCurParent->parent > 0);
    }
    $parentId = $mgCurParent->term_id;


  if(is_home())$text = get_field('главная',   'option');

  if($parentId == 13) $text = get_field('футбол',    'option');
  if($parentId == 14) $text = get_field('теннис',    'option');
  if($parentId == 15) $text = get_field('баскетбол', 'option');
  if($parentId == 16) $text = get_field('хоккей',    'option');
  if($parentId == 17) $text = get_field('волейбол',  'option');
  if($parentId == 18) $text = get_field('бокс',      'option');
  if($parentId == 19) $text = get_field('ufc',       'option');


@endphp

@if($text)
    <div class="seotext">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!--[ SEO ]-------------------------------------------------------------------------------------------------->
                    <section class="style_text">
                        {!! $text !!}
                    </section>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
@endif