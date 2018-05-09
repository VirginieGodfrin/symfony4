<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;
use Twig\Environment;

class ArticleController extends AbstractController { 

	/**
	 * @Route("/", name="app_homepage")
	 */

	public function homepage(){

		return $this->render('article/homepage.html.twig');

	}

	/**
	* @Route("/news/{slug}", name="article_show")
	*/
	public function show($slug, Environment $twigEnvironement ){
		// sprintf — Retourne une chaîne formatée
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

		// dump the $slug and the controller object 
		// dump($slug, $this); 

		// return $this->render('article/show.html.twig', [
		// 	'title' => $slug,
		// 	'comments' => $comments,
		// 	'slug' => $slug,
		// ]);

		// utilisation du service twig : 
		
		$html = $twigEnvironement->render('article/show.html.twig', [ 
			'title' => $slug,
			'comments' => $comments,
			'slug' => $slug,
		]);
		return new Response($html);

		
	}


	/**
	* @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
	*/
	public function toggleArticleHeart($slug, LoggerInterface $logger)
	{
		// service de log
		$logger->info('All right !');
		// return new Response(json_encode(['hearts' => 5])) 
		return new JsonResponse(['hearts' => rand(5, 100)]);
	}
}