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

        foreach ($this->langLoader->getLocaleLoadersList() as $lang => $localeLoader) {
            $localeLoader->MergeTranslations($jigsaw);
        };

        // register helper 
        $jigsaw->setConfig('__', function ($page, string $text, string|null $lang = null): string {
            $default_lang = $page->default_lang ?? 'en';

            $path = $page->getPath();

            $lang = null;

            if (!$lang) {
                if (!str_contains($path, '/')) {
                    // index page
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
