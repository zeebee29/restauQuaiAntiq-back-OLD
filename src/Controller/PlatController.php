<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class PlatController extends AbstractController
{
    public function __construct(private Security $security)
    {
    }

    public function __invoke()
    {
    }

    #[Route('/plats', name: 'user_plat')]
    public function listPLats(PlatRepository $repository): Response
    {
        $listPlats = $repository->findPlatInCarte(true);
        $json = json_encode($listPlats, JSON_UNESCAPED_UNICODE);
        $response = new JsonResponse($json, 200, [], JSON_UNESCAPED_UNICODE);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
}
