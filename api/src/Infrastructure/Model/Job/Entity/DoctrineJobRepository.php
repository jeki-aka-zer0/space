<?php

declare(strict_types=1);

namespace Api\Infrastructure\Model\Job\Entity;

use Api\Model\Job\Entity\Job\Job;
use Api\Model\Job\Entity\Job\JobRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

final class DoctrineJobRepository implements JobRepository
{
    /**
     * @var EntityRepository
     */
    private $repo;
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repo = $em->getRepository(Job::class);
        $this->em = $em;
    }

    public function add(Job $job): void
    {
        $this->em->persist($job);
    }

    public function clear(): void
    {
        $jobs = $this->repo->findAll();
        array_map(function (Job $job): void {
            $this->em->remove($job);
        }, $jobs);
    }
}
