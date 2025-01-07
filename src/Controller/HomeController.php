<?php

namespace App\Controller;

use Mowazir\Framework\Http\Response;


class HomeController
{

	public function index(): Response
	{
		$content = "hi";

		return new Response($content);
	}
}