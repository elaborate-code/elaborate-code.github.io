<?php

use TightenCo\Jigsaw\Jigsaw;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */

$events->beforeBuild(function (Jigsaw $jigsaw) {

    // Be aware of the languages added by the dev
    $site_langs = $jigsaw->getConfig('site_langs');

    foreach ($site_langs as $site_lang) {

        // set path to lang folder
        $lang_folder = lang_folder_realpath($site_lang);

        $translations = $jigsaw->getConfig($site_lang)?->toArray() ?? [];

        foreach (scandir($lang_folder) as $lang_file) {

            if (is_not_json($lang_file))
                continue;

            // push the loaded translations
            $translations += decoded_lang_json("$lang_folder/$lang_file");
        }

        $jigsaw->setConfig($site_lang, $translations);
    }
});

function lang_folder_realpath(string $lang_code): string
{
    return realpath(__DIR__ . "/lang/$lang_code");
}

function is_not_json(string $path): bool
{
    return substr($path, -5) !== ".json";
}

function decoded_lang_json(string $abs_path): array
{
    return json_decode(file_get_contents($abs_path), true);
}
