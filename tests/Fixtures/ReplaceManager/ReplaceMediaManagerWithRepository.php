<?php

namespace Sulu\Rectore\Fixtures\ReplaceManager;

use Sulu\Bundle\MediaBundle\Media\Manager\MediaManagerInterface;

class ReplaceMediaManagerWithRepository
{
    /**
     * @var MediaManagerInterface
     */
    private $mediaManager;

    public function __construct(
        MediaManagerInterface $mediaManager
    ) {
        $this->mediaManager = $mediaManager;
    }

    public function getMedia(int $id): void
    {
        $this->mediaManager->get($id);
    }
}
