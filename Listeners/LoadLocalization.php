<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class LoadLocalization
{
    private array $parsedLocalization;
    private array $langFoldersList;
    private string $projectRoot;

    public function __construct()
    {
        $this->setProjectRoor();

        $this->parsedLocalization = [];
        $this->langFoldersList = $this->listLangFolders();
    }

    public function handle(Jigsaw $jigsaw)
    {
        $this->decode_all_localization_jsons();

        foreach ($this->parsedLocalization as $lang => $translations) {
            $site_localization = $jigsaw->getConfig($lang)?->toArray() ?? [];
            $site_localization += $translations;
            $jigsaw->setConfig($lang, $site_localization);
        };

        // register helper 
        $jigsaw->setConfig('__', function ($page, $text, $lang) {
            if (isset($page->$lang[$text]))
                return $page->$lang[$text];
            return $text;
        });
    }

    private function decode_all_localization_jsons(): array
    {
        // Iterate folders 'en', 'fr', 'ar', 'multi' ...
        foreach ($this->langFoldersList as $lang_folder) {

            // Prepare jsons list (supposedly)
            $lang_files = $this->listFolderContent($this->getRealpath("/lang/$lang_folder"));

            if ($lang_folder === "multi") {
                foreach ($lang_files as $lang_file) {
                    // 
                    if ($this->is_not_json($lang_file))
                        continue;

                    $multi_translations = $this->decoded_json($this->getRealpath("/lang/$lang_folder/$lang_file"));

                    foreach ($multi_translations as $lang => $translations) {
                        $this->pushTranslations($translations, $lang);
                    }
                }
            } else {
                foreach ($lang_files as $lang_file) {
                    // 
                    if ($this->is_not_json($lang_file))
                        continue;

                    $lang_translations = $this->decoded_json($this->getRealpath("/lang/$lang_folder/$lang_file"));

                    $this->pushTranslations($lang_translations, $lang_folder);
                }
            }
        }

        return $this->parsedLocalization;
    }

    /**
     * 
     */
    private function listLangFolders(): array
    {
        if (!realpath($this->projectRoot . '/lang')) {
            trigger_error("No lang folder found", E_USER_NOTICE);
            return [];
        }

        return $this->listFolderContent($this->getRealpath('/lang'));
    }

    private function decoded_json(string $abs_path): array
    {
        return json_decode(file_get_contents($abs_path), true);
    }

    /**
     * @return string valid absolute path
     * @throws \Exception if path is invalid
     */
    private function getRealpath(string $rel_path): string
    {
        $realpath = realpath($this->projectRoot . "/$rel_path");

        if (!$realpath)
            throw new \Exception("Invalide relative path. Can't get absolute path from '$rel_path'!", 1);

        return $realpath;
    }

    private function pushTranslations(array $translations, string $lang)
    {
        if (empty($this->parsedLocalization[$lang]))
            $this->parsedLocalization[$lang] = $translations;
        else
            $this->parsedLocalization[$lang] += $translations;
    }

    /* ---------------------------------------------------------*/
    //          Micro methods
    /* ---------------------------------------------------------*/

    /**
     * Scans folder content and excludes '.', '..' special files 
     */
    private function listFolderContent(string $abs_path): array
    {
        $scan_results = scandir($abs_path);
        return array_splice($scan_results, 2);
    }

    /**
     * Checks the end of file or path and matches it agains '.json'
     */
    private function is_not_json(string $path): bool
    {
        return substr($path, -5) !== ".json";
    }

    /**
     * Assume that the vendor folder is in the project root
     */
    private function setProjectRoor(): void
    {
        $reflection = new \ReflectionClass(\Composer\Autoload\ClassLoader::class);
        $this->projectRoot = realpath(dirname($reflection->getFileName(), 3));
    }
}
