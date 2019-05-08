<?php

declare(strict_types=1);

namespace Api\Infrastructure\ReadModel\Project;

use Api\Infrastructure\Model\Status\Status;
use Api\Model\Language\Entity\Language\Code;
use Api\Model\Project\Entity\Entity\Project;
use Api\ReadModel\Project\ProjectsReadRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

final class DoctrineProjectsReadRepository implements ProjectsReadRepository
{
    /**
     * @var EntityRepository
     */
    private $repo;
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repo = $em->getRepository(Project::class);
        $this->em = $em;
    }

    public function allActive(Code $language): array
    {
        return $this->repo->createQueryBuilder('projects')
            ->andWhere('projects.status = :status AND projects.language = :language_code')
            ->setParameters([
                ':status' => Status::ACTIVE,
                ':language_code' => $language->getCode()
            ])
            ->orderBy('projects.sort', 'asc')
            ->getQuery()->getResult();
    }
}
