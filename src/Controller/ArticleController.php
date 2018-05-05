<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticleController { 

	/**
	 * @Route("/")
	 */

	public function homepage(){

		return new Response('Hello welkome home !');

	}

	/**
	* @Route("/news/{slug}")
	*/
	public function show($slug)
	{
		//sprintf — Retourne une chaîne formatée
		// return new Response(sprintf('Future page to show the article: "%s"', $slug));
		return new Response('Future page to show the article:'. $slug);
	}
}