<?php

use Doctrine\ORM\EntityManagerInterface;

/**
 * @param EntityManagerInterface $entityManager
 * @param PaginatorService $paginatorService
 * @param Request $request
 * @return Response
 */

#[Route('/service', name: 'service_index')]
  public function index(
        EntityManagerInterface $entityManager,
        PaginatorService $paginatorService,
        Request $request): Response {


           return $this->render('service/index.html.twig', [
        'services' =>
            $paginatorService->paginate($entityManager->getRepository(Service::class)->findAll(), $request)
    ]);
}
