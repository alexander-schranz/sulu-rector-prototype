<?php

namespace Sulu\Rectore\Fixtures\ReplaceManager;

use Sulu\Bundle\MediaBundle\Media\Manager\MediaManagerInterface;

class ReplaceMediaManagerWithMessenger
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

    public function saveNewMedia($data): void
    {
        $this->mediaManager->save($data);
    }

    public function saveExistMedia(int $id, $data): void
    {
        $this->mediaManager->save($data, $id);
    }
}
