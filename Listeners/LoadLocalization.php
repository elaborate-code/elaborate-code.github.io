<?php

namespace App\Listeners;

use App\Services\LangFolderLoader;
use TightenCo\Jigsaw\Jigsaw;

class LoadLocalization
{
    public function handle(Jigsaw $jigsaw)
    {
        $this->langFolderLoader = new LangFolderLoader($jigsaw);

        // register helper 
        $jigsaw->setConfig('__', function ($page, $text, $lang) {
            if (isset($page->$lang[$text]))
                return $page->$lang[$text];
            return $text;
        });
    }
}
