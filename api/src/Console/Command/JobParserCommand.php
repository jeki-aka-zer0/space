<?php

declare(strict_types=1);

namespace Api\Console\Command;

use Api\Model\Flusher;
use Api\Model\Job\Entity\Job\Job;
use Api\Model\Job\Entity\Job\JobRepository;
use Api\Model\Job\Service\Job\Parser\ParserInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class JobParserCommand extends Command
{
    private $parser;
    private $flusher;
    private $jobs;

    public function __construct(ParserInterface $parser, JobRepository $jobs, Flusher $flusher)
    {
        parent::__construct();
        $this->parser = $parser;
        $this->flusher = $flusher;
        $this->jobs = $jobs;
    }

    protected function configure(): void
    {
        $this
            ->setName('jobs:parse')
            ->setDescription('Parse jobs');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<comment>Loading jobs</comment>');

        $jobs = $this->parser->parse();
        $this->removeOld();
        $this->crateNew($jobs);

        $output->writeln('<info>Done!</info>');
    }

    private function removeOld(): void
    {
        $this->jobs->clear();
        $this->flusher->flush();
    }

    private function crateNew(iterable $jobs): void
    {
        array_map(function (Job $job): void {
            $this->jobs->add($job);
        }, (array)$jobs);

        $this->flusher->flush();
    }
}
