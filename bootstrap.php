<?php

use TightenCo\Jigsaw\Jigsaw;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */

$events->beforeBuild(function (Jigsaw $jigsaw) {

    foreach (decode_all_localization_jsons() as $lang => $translations) {
        $site_localization = $jigsaw->getConfig($lang)?->toArray() ?? [];
        $site_localization += $translations;
        $jigsaw->setConfig($lang, $site_localization);
    };

    // Be aware of the languages added by the dev
    // $site_langs = $jigsaw->getConfig('site_langs');
});

function decode_all_localization_jsons(): array
{
    $localization = [];

    foreach (lang_folders() as $lang_folder) {
        $lang_folder_abs = realpath(__DIR__ . "/lang/$lang_folder");

        $lang_files = folder_content($lang_folder_abs);

        if ($lang_folder === "multi") {
            foreach ($lang_files as $lang_file) {
                if (is_not_json($lang_file))
                    continue;

                $multi_translations = decoded_lang_json(realpath(__DIR__ . "/lang/$lang_folder/$lang_file"));

                foreach ($multi_translations as $lang => $translations) {
                    if (empty($localization[$lang]))
                        $localization[$lang] = $translations;
                    else
                        $localization[$lang] += $translations;
                }
            }
        } else {
            foreach ($lang_files as $lang_file) {
                if (is_not_json($lang_file))
                    continue;

                $lang_translations = decoded_lang_json(realpath(__DIR__ . "/lang/$lang_folder/$lang_file"));

                if (empty($localization[$lang_folder]))
                    $localization[$lang_folder] = $lang_translations;
                else
                    $localization[$lang_folder] += $lang_translations;
            }
        }
    }
    // dump($localization);
    return $localization;
}

function lang_folders(): array
{
    if (!realpath(__DIR__ . '/lang')) {
        trigger_error("No lang folder found", E_USER_NOTICE);
        return [];
    }

    return folder_content(__DIR__ . '/lang');
}

function is_not_json(string $path): bool
{
    return substr($path, -5) !== ".json";
}

function folder_content(string $abs_path): array
{
    $scan_results = scandir($abs_path);
    return array_splice($scan_results, 2);
}

function decoded_lang_json(string $abs_path): array
{
    return json_decode(file_get_contents($abs_path), true);
}
