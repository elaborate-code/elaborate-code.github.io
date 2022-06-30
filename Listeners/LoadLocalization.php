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
        $jigsaw->setConfig('__', function ($page, $text, $lang = null) {
            // TODO: define default in config
            $default_lang = 'en';

            $path = $page->getPath();

            $lang = null;

            if (!$lang) {
                // index page
                if (!str_contains($path, '/')) {
                    if (empty($path))
                        $lang = $default_lang;
                    else
                        $lang = $path;
                } else {
                    $lang = explode('/', $path)[1];

                    // TODO: regex match 'xx' and 'xx_YY' lang codes
                    if (!ctype_lower($lang) || strlen($lang) > 2)
                        $lang = $default_lang;
                }
            }

            if (isset($page->$lang[$text]))
                return $page->$lang[$text];

            return $text;
        });
    }
}
