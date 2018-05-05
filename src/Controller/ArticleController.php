<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController { 

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
		// return new Response('Future page to show the article:'. $slug);

		// return $this->render('article/show.html.twig', [
		// 	'title' => ucwords(str_replace('-', ' ', $slug)),
		// ]);
		
		$comments = [
			'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos tenetur dolorum corporis consectetur repudiandae quasi molestias rem iste ut ullam inventore deleniti quisquam, eum maxime quia reprehenderit quis accusamus eaque.',
			'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eum accusantium eaque cum a ipsum accusamus ipsa natus molestiae quis nobis ipsam et obcaecati fugiat iste quod, magni ad non.',
			'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque voluptas labore ea unde incidunt. Facilis assumenda, error placeat commodi, aliquam praesentium quia labore voluptatem quisquam sunt non itaque quasi fuga!'
		];

		//dump the $slug and the controller object 
		// dump($slug, $this); 

		return $this->render('article/show.html.twig', [
			'title' => $slug,
			'comments' => $comments
		]);
	}
}