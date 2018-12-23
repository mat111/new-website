<?php

namespace App\Manager;


use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;

class UserManager
{
    /**
     * @var EntityManager $em
     */
    private $em;

    /**
     * @var UserRepository $repository
     */
    private $repository;

    /**
     * UserManager constructor.
     * @param EntityManager $em
     * @param UserRepository $repository
     */
    public function __construct(EntityManager $em, UserRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return \App\Entity\User|null
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @param User $user
     * @return User
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function persist(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

    /**
     * @param User $user
     * @return null
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function remove(User $user)
    {
        $this->em->remove($user);
        $this->em->flush();

        return null;
    }
}