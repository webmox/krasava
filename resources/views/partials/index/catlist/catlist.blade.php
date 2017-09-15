@if($sub_categories = get_categories( array('taxonomy'=>'forecasts-list','parent'=>$category_id)))
  <div class="wrap_list_cats">
    <div class="owl-carousel list_cats owl-theme">
      @foreach($sub_categories as $value)
        <div class="item">
          <div class="inner_item">
            <div class="item_cat">
              <a href="{{ get_category_link($value->term_id) }}">
                {{ $value->name }}
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endif
