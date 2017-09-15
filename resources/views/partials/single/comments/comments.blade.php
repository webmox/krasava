<div class="comments_wrap @foreach($class as $className) {{ $className or NULL }} @endforeach">
    <?php comments_template('', true); ?>
</div>

