<!doctype html>
<html @php(language_attributes())>
  @include('partials.index.head.head')
  <body @php(body_class())>
    @php(do_action('get_header'))
    <div class="wrapper">
      <div class="content">
        @include('partials.index.header.header')
        @yield('content')
      </div>
      @php(do_action('get_footer'))
      @include('partials.index.footer.footer')
    </div>
    @php(wp_footer())
  </body>
</html>
