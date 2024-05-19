<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController{
    #[Route("/", name:"home")]
    function index():Response {
        $navItems = ['challenge', 'inscription', 'faq', 'contact'];
        $steps = [
            ['title' => 'Inscription', 'description' => "Rejoignez-nous en quelques clics <br> grâce au formulaire d'inscription"],
            ['title' => 'Code', 'description' => "Relevez les défis créés par nos <br> meilleurs recruteurs"],
            ['title' => 'Récompense', 'description' => "Epatez les recruteurs et tentez <br> de décrocher une offre pour <br> votre job de rêve"]
        ];
        $faqs = [
            ['question' => "Qui peut participer au Coders Challenge ?", 'answer' => "Le Coders Challenge est ouvert à tous les étudiants et passionnés de technologie, quel que soit leur niveau de compétence."],
            ['question' => "Quels types de défis sont proposés lors du Coders Challenge ?", 'answer' => "Nous proposons une variété de défis techniques couvrant différents domaines, tels que le développement web, l'algorithmie et les applications mobiles."],
            ['question' => "Y a-t-il des prix à gagner lors du Coders Challenge ?", 'answer' => "Oui, des prix attractifs sont décernés aux participants les plus performants, notamment des opportunités de stages, des mentorats et des cadeaux technologiques."]
        ];
        $socials = ['Discord', 'Twitter', 'Facebook'];
        return $this->render('home/index.html.twig', [
            'navItems' => $navItems,
            'steps' => $steps,
            'faqs' => $faqs,
            'socials' => $socials
        ]);
    }
}
