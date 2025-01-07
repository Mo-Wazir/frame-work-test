<?php

namespace \App\Controller;

class PostsController
{
	public function show(int $id): Response
	{
	  $content = " this post $id";

	  return new Response($content);
	}
}