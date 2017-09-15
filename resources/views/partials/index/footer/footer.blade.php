<footer class="content-info banner">
  <div class="container">
    <div class="main_footer">
      <div class="row">
        <div class="col-md-8">
            <div class="footer_menus">
                <div class="row">
                    <div class="col-sm-3">
                        <?php dynamic_sidebar('footer1')?>
                    </div>
                    <div class="col-sm-3">
                        <?php dynamic_sidebar('footer2')?>
                    </div>
                    <div class="col-sm-3">
                        <?php dynamic_sidebar('footer3')?>
                    </div>
                    <div class="col-sm-3">
                        <?php dynamic_sidebar('footer4')?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="right_footer">
                <a href="@php(bloginfo('url'))" class="logo">krasava<span>bet</span></a>
                <ul class="social">
                    @if ($social = get_field('social', 'option'))
                        @foreach ($social as $value)
                            <li><a href="{{  $value['ссылка'] }}" target="_blank"><i class="fa {{  $value['иконка'] }}" aria-hidden="true"></i></a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
      </div>
    </div>
      <div class="copyright">
          <p>&copy; Copyright 2017, <a href="@php(bloginfo('url'))">krasavabet.com</a></p>
      </div>
  </div>
</footer>
