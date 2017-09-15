<?php

namespace App;

use Sober\Controller\Controller;

class Forecasts extends Controller
{
	public function forecasts($posts_per_page = 5)
	{
		global $post;
		$args = array(
			'post_type'      => 'forecasts',
			'posts_per_page' => $posts_per_page,
			'order'          => 'DESC',
			'offset'         => 0,
		);
		return $post->post_title;
	}
}