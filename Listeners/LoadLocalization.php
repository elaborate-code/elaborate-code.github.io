<?php

namespace App\Listeners;

use App\Services\LangLoader;
use TightenCo\Jigsaw\Jigsaw;

class LoadLocalization
{

    private $langLoader;

    public function handle(Jigsaw $jigsaw)
    {
        $this->langLoader = new LangLoader($jigsaw);

        foreach ($this->langLoader->getLocalLoadersList() as $lang => $localLoader) {
            $localLoader->MergeTranslations($jigsaw);
        };

        // register helper 
        $jigsaw->setConfig('__', function ($page, $text, $lang) {
            if (isset($page->$lang[$text]))
                return $page->$lang[$text];
            return $text;
        });
    }
}
