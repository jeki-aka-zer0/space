<?php

declare(strict_types=1);

namespace Api\Model\Text\UseCase\Edit;

use Api\Model\Flusher;
use Api\Model\Text\Entity\Text\TextId;
use Api\Model\Text\Entity\Text\TextRepository;

final class Handler
{
    private $texts;
    private $flusher;

    public function __construct(TextRepository $texts, Flusher $flusher)
    {
        $this->texts = $texts;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): TextId
    {
        $id = new TextId($command->id);
        $text = $this->texts->get($id);

        $text->edit($command->name, $command->content);

        $this->flusher->flush($text);

        return $id;
    }
}
