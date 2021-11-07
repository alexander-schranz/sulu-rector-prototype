<?php

namespace Fixtures\RenameXDefaultLocalization;

use Sulu\Component\Webspace\Portal;
use Sulu\Component\Localization\Localization;

class RenameXDefaultLocalization
{
    public function renameIsXDefault(Portal $portal): void
    {
        $portal->isXDefault();
    }

    public function renameIsXDefaultFalse(Portal $portal): void
    {
        $portal->isXDefault(false);
    }

    public function renameSetXDefaultLocalization(Portal $portal, Localization $localization): void
    {
        $portal->setXDefaultLocalization($localization);
    }

    public function renameSetXDefaultLocalizationFalse(Portal $portal, Localization $localization): void
    {
        $portal->setXDefaultLocalization($localization, false);
    }

    public function renameGetXDefaultLocalization(Portal $portal): void
    {
        $portal->getXDefaultLocalization();
    }

    public function renameGetXDefaultLocalizationFalse(Portal $portal): void
    {
        $portal->getXDefaultLocalization(false);
    }
}
