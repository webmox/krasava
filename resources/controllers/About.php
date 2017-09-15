<?php

namespace App;

use Sober\Controller\Controller;

class About extends Controller
{
	public function About()
	{
		return get_bloginfo('name');
	}
}
