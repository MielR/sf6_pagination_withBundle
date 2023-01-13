<?php

namespace App\Controller;

use App\Entity\UsersSearch;
use App\Form\UsersSearchType;
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
        UsersRepository    $usersRepository,
        PaginatorInterface $paginator,  // or  EntityManagerInterface $entityManager,
        Request            $request
    ): Response
    {
        // creer une variable $search de la 2eme entite
        // creer un form $form utilisant (la le type UsersSearchType , $search
        // faire une reauete
        // envoyer le form dans la vue
        $search = new UsersSearch();
        $form = $this->createForm(UsersSearchType::class, $search);
        $form->handleRequest($request);


        $usersByQuery = $paginator->paginate(
            $usersRepository->findAllByQuery($search),
            $request->query->getInt('page', 1),
            20
        );


//
        // show $usersPagination to TWIG
        // show form to twig
        return $this->render('pagination/index.html.twig', [
            'users' => $usersByQuery,
            'form' => $form->createView()
        ]);
    }
}





