<div class="comments_wrap">
	<?php if ( comments_open() ) { ?>
        <h4 class="title_count_comments">
			<?php
			plural_form(
				get_comments_number(),
				array( null ),
				array( 'комментарий', 'комментария', 'комментариев' )
			);
			?>
        </h4>
        <ol class="commentlist">
			<?php
			function theme_comment( $comment, $args, $depth ){
			$GLOBALS['comment'] = $comment; ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
                <div class="comment_inner clearfix" id="comment-<?php comment_ID(); ?>">
                    <div class="comment-author vcard">
                        <span class="defautl_ava">
                            <?php echo get_avatar( $comment, 67 ); ?>
                        </span>
                    </div>
                    <div class="comment_text_wrap">
						<?php printf( __( '<span class="name_author fn">%s</span>' ), get_comment_author_link() ) ?>
                        <div class="text_comment">
							<?php comment_text() ?>
                        </div>
                        <div class="clearfix"></div>
						<?php if ( $comment->comment_approved == '0' ) : ?>
                            <em class="msgs_waiting"><?php _e( 'Your comment is awaiting moderation.' ) ?></em>
						<?php endif; ?>
                        <div class="comment_bottom_info clearfix">
                            <div class="reply">
								<?php comment_reply_link( array_merge( $args, array( 'depth'     => $depth,
								                                                     'max_depth' => $args['max_depth']
								) ) ) ?>
                            </div>
                            <div class="comment-meta commentmetadata " style="float: right;">
                                <span><?php printf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
				<?php }
				$args = array(
					'reply_text' => 'Ответить',
					'callback'   => 'theme_comment'
				);
				wp_list_comments( $args );
				?>
        </ol>

		<?php

		$aria_req = null;

		$fields = array(
			'author' => '<p class="comment-form-author"><input type="text" id="author" name="author" class="author" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="Имя *" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '></p>',
			'email'  => '<p class="comment-form-email"><input type="email" id="email" name="email" class="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="E-mail *" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '></p>',
			//'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label><input type="url" id="url" name="url" class="site" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="www.example.com" maxlength="30" tabindex="3" autocomplete="on"></p>'
		);

		$args = array(
			'comment_notes_after' => '',
			'comment_field'       => '<p class="comment-form-comment"><textarea id="comment" name="comment" class="comment-form" cols="45" rows="8" aria-required="true" placeholder="Оставить комментарий"></textarea></p>',
			'label_submit'        => 'Отправить',
			'fields'              => apply_filters( 'comment_form_default_fields', $fields )
		);
		comment_form( $args );
		?>
	<?php } else { ?>
        <h3>Обсуждения закрыты для данной страницы</h3>
	<?php }
	?>
</div>