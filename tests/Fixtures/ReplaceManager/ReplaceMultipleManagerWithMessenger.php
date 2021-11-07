<?php

namespace Sulu\Rectore\Fixtures\ReplaceManager;

use Sulu\Bundle\ContactBundle\Contact\ContactManagerInterface;
use Sulu\Bundle\MediaBundle\Media\Manager\MediaManagerInterface;

class ReplaceMultipleManagerWithMessenger
{
    /**
     * @var MediaManagerInterface
     */
    private $mediaManager;

    /**
     * @var ContactManagerInterface
     */
    private $contactManager;

    public function __construct(
        MediaManagerInterface $mediaManager,
        ContactManagerInterface $contactManager
    ) {
        $this->mediaManager = $mediaManager;
        $this->contactManager = $contactManager;
    }

    public function saveMediaManager(): void
    {
        $this->mediaManager->save([]);
    }

    public function saveContactManager(): void
    {
        $this->contactManager->save([]);
    }
}
