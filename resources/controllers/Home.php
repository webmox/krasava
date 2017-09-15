<?php

namespace App;

use Sober\Controller\Controller;

class Home extends Controller
{
	public function Home()
	{
		return get_bloginfo('name');
	}
}
