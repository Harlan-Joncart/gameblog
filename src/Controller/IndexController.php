<?php
// src/Controller/IndexController.php
namespace App\Controller;

use App\Repository\JeuxRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    #[Route('/ ', name: 'app_index')]
    public function index(JeuxRepository $jeuxRepository): Response
    {
        $jeuxRepository = $jeuxRepository->findAll();
        return $this->render('default.html.twig', ['jeux' => $jeuxRepository]);
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }
    #[Route('/categories', name: 'app_categories')]
    public function categories(): Response
    {
        return $this->render('categories.html.twig');
    }
    #[Route('/community', name: 'app_community')]
    public function community(): Response
    {
        return $this->render('community.html.twig');
    }
    #[Route('/review', name: 'app_review')]
    public function review(): Response
    {
        return $this->render('review.html.twig');
    }
    #[Route('/singleblog/{id}', name: 'app_game')]
    public function singleblog($id, JeuxRepository $jeuxRepository): Response
    {
        $jeux = $jeuxRepository->find($id);
        return $this->render('single-blog.html.twig', ['jeux' => $jeux]);
    }
}