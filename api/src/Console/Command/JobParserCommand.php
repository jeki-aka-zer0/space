<?php

declare(strict_types=1);

namespace Api\Console\Command;

use Api\Model\Job\Service\Job\Parser\ParserInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class JobParserCommand extends Command
{
    private $parser;

    public function __construct(ParserInterface $parser)
    {
        parent::__construct();
        $this->parser = $parser;
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
        $this->parser->parseAndSave();
        $output->writeln('<info>Done!</info>');
    }
}
