<?php

namespace App\Repository;

use App\Entity\Users;
use App\Entity\UsersSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use function get_class;
use Doctrine\ORM\QueryBuilder;

/**
 * @extends ServiceEntityRepository<Users>
 *
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{


    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Users::class);
    }




    public function findAllByQuery(UsersSearch $search)
    {
       //si une recherche se fait dans la form "firstname" utilisant la 2eme Entite :
        //          * alors CHERHCHER dans l'entite "Users.Firstname" LIKE
        //          * params de LIKE = $search->getFirstname() de la form du 2eme entite

       $query = $this->findAll();

        if ($search->getzipcode()) {
            $query = $this->createQueryBuilder('u')
                ->Where('u.zipcode LIKE :zipcode')
                ->setParameter('zipcode', '%'.$search->getzipcode().'%');
        }

        if ($search->getcity()) {
            $query = $this->createQueryBuilder('u')
                ->andWhere('u.city LIKE :city')
                ->setParameter('city', '%'.$search->getcity().'%');

        }
//        dd($query);
        return $query;
    }








    public function remove(Users $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof Users) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }
        $user->setPassword($newHashedPassword);
        $this->save($user, true);
    }

    public function save(Users $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


}
