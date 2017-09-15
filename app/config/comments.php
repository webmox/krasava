<?php

// древовидные комментарии
// https://truewp.ru/blog/wordpress/ajax-comments.html
//================================================================================================
function scripts_styles() {
    global $wp_styles;
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'scripts_styles');


// если вы вставляете код не в новый файл, то <?php нужно удалить
function true_add_ajax_comment(){
    global $wpdb;
    $comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;

    $post = get_post($comment_post_ID);

    if ( empty($post->comment_status) ) {
        do_action('comment_id_not_found', $comment_post_ID);
        exit;
    }

    $status = get_post_status($post);

    $status_obj = get_post_status_object($status);

    /*
     * различные проверки комментария
     */
    if ( !comments_open($comment_post_ID) ) {
        do_action('comment_closed', $comment_post_ID);
        wp_die( __('Sorry, comments are closed for this item.') );
    } elseif ( 'trash' == $status ) {
        do_action('comment_on_trash', $comment_post_ID);
        exit;
    } elseif ( !$status_obj->public && !$status_obj->private ) {
        do_action('comment_on_draft', $comment_post_ID);
        exit;
    } elseif ( post_password_required($comment_post_ID) ) {
        do_action('comment_on_password_protected', $comment_post_ID);
        exit;
    } else {
        do_action('pre_comment_on_post', $comment_post_ID);
    }

    $comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
    $comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
    $comment_author_url   = ( isset($_POST['url']) )     ? trim($_POST['url']) : null;
    $comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;

    /*
     * проверяем, залогинен ли пользователь
     */
    $user = wp_get_current_user();
    if ( $user->exists() ) {
        if ( empty( $user->display_name ) )
            $user->display_name=$user->user_login;
        $comment_author       = $wpdb->escape($user->display_name);
        $comment_author_email = $wpdb->escape($user->user_email);
        $comment_author_url   = $wpdb->escape($user->user_url);
        $user_ID = get_current_user_id();
        if ( current_user_can('unfiltered_html') ) {
            if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
                kses_remove_filters(); // start with a clean slate
                kses_init_filters(); // set up the filters
            }
        }
    } else {
        if ( get_option('comment_registration') || 'private' == $status )
            wp_die( 'Вы должны зарегистрироваться или войти, чтобы оставлять комментарии.' );
    }

    $comment_type = '';

    /*
     * проверяем, заполнил ли пользователь все необходимые поля
      */
    if ( get_option('require_name_email') && !$user->exists() ) {
        if ( 6 > strlen($comment_author_email) || '' == $comment_author )
            wp_die( 'Ошибка: заполните необходимые поля (Имя, Email).' );
        elseif ( !is_email($comment_author_email))
            wp_die( 'Ошибка: введенный вами email некорректный.' );
    }

    if ( '' == trim($comment_content) ||  '<p><br></p>' == $comment_content )
        wp_die( 'Вы забыли про комментарий.' );

    /*
     * добавляем новый коммент и сразу же обращаемся к нему
     */
    $comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;
    $commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');
    $comment_id = wp_new_comment( $commentdata );
    $comment = get_comment($comment_id);

    /*
     * выставляем кукисы
     */
    do_action('set_comment_cookies', $comment, $user);

    /*
     * вложенность комментариев
     */
    $comment_depth = 1;
    while($comment_parent){
        $comment_depth++;
        $parent_comment = get_comment($comment_parent);
        $comment_parent = $parent_comment->comment_parent;
    }

    $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $comment_depth;
    /*
     * ниже идет шаблон нового комментария, вы можете настроить его для себя,
     * а можете воспользоваться функцией(которая скорее всего уже есть в теме) для его вывода
     */

    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div class="comment_inner clearfix" id="comment-<?php comment_ID(); ?>">
            <div class="comment-author vcard">
                <span class="defautl_ava">
                    <?php echo get_avatar( $comment, 67 ); ?>
                </span>
            </div>
            <div class="comment_text_wrap">
                <?php printf(__('<span class="name_author fn">%s</span>'), get_comment_author_link()) ?>
                <div class="text_comment">
                    <?php comment_text() ?>
                </div>
                <div class="clearfix"></div>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="msgs_waiting"><?php _e('Your comment is awaiting moderation.') ?></em>
                <?php endif; ?>
                <div class="comment_bottom_info clearfix">
                    <!--<div class="reply">
                        <?php //comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>-->
                    <div class="comment-meta commentmetadata " style="float: right;">
                        <span><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></span>
                    </div>
                </div>
            </div>
    </li>
    <?php
    die();
}

add_action('wp_ajax_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_{значение параметра action}
add_action('wp_ajax_nopriv_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_nopriv_{значение параметра action}