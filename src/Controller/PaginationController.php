<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaginationController extends AbstractController
{

    #[Route('/', name: 'listUsers')]
    public function listUsers(
        UsersRepository         $usersRepository,
        PaginatorInterface      $paginator,  // or  EntityManagerInterface $entityManager,
        Request                 $request
    ): Response  {

        $data = $usersRepository->findAll(); // or  $data = $entityManager->getRepository(Users::class)->findAll();
        $usersPagination = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 20)
        );

        // show $usersPagination to TWIG
        return $this->render('pagination/index.html.twig', [
            'users' => $usersPagination
        ]);
    }
}

