<?php

/**
 * Created by PhpStorm.
 * User: Mes
 * Date: 12.06.2017
 * Time: 13:58
 * https://wp-kama.ru/function/flush_rewrite_rules
 */

/* Сбрасываем правила для произвольного типа записей. */
add_action( 'after_switch_theme', 'bt_flush_rewrite_rules' );

function bt_flush_rewrite_rules() {
    flush_rewrite_rules();
}