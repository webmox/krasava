@if (has_nav_menu('primary_navigation'))
  <section class="nav_menu">
    <div class="container">
      {!! wp_nav_menu(array(
        'theme_location' => 'primary_navigation',
        'menu_class' => '',
        'container_class' => 'nav',
        'container' => 'nav',))
      !!}
    </div>
  </section>
@endif