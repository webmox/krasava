
<div class="wrap_mobile_section">
    <div class="container">
        <div class="mobile_section clearfix">

            <a href="@php(bloginfo('url'))" class="logo">krasava<span>bet</span></a>

            <a href="#" class="menu_btn">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>

            <a href="#" class="btn_search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>

            <div class="clearfix"></div>
            @if (has_nav_menu('primary_navigation'))
                <div class="nav_menu_mob">
                    {!! wp_nav_menu(array(
                      'theme_location' => 'primary_navigation',
                      'menu_class' => '',
                      'container_class' => 'nav',
                      'container' => 'nav',))
                    !!}
                </div>
            @endif
        </div>
    </div>
</div>
