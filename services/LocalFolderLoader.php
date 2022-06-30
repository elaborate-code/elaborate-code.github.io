<?php

namespace App\Services;

use TightenCo\Jigsaw\Jigsaw;

class LocalFolderLoader
{
    private string $absPath;
    private array $jsonsList;
    private bool $isMulti;
    private string $lang;
    private array $parsedLocalization = [];

    public function __construct(Jigsaw $jigsaw, string $abs_path)
    {
        $this->jigsaw = $jigsaw;
        $this->absPath = str_replace('/', '\\', $abs_path,);

        $temp = explode('\\', $this->absPath);
        $this->lang = end($temp);

        $this->isMulti = $this->lang === "multi";

        $this->jsonsList = $this->listLocalFolderJsons($this->absPath);
        $this->MergeTranslations();
    }

    /**
     * Scans folder content and excludes '.', '..' special files 
     */
    private function listLocalFolderJsons(string $abs_path): array
    {
        $jsons_list = [];

        $scan_results = scandir($abs_path);
        foreach ($scan_results as $json) {
            if ($this->is_not_json($json))
                continue;
            $jsons_list[] = $this->absPath . "\\$json";
        }

        return $jsons_list;
    }

    public function MergeTranslations()
    {
        if ($this->isMulti) {
            foreach ($this->jsonsList as $json) {

                $multi_translations = $this->decoded_json($json);

                foreach ($multi_translations as $lang => $translations) {
                    $this->pushTranslations($translations, $lang);
                }
            }
        } else {
            foreach ($this->jsonsList as $json) {

                $lang_translations = $this->decoded_json($json);

                $this->pushTranslations($lang_translations, $this->lang);
            }
        }
    }

    private function pushTranslations(array $translations, string $lang)
    {
        $site_localization = $this->jigsaw->getConfig($lang)?->toArray() ?? [];
        $site_localization += $translations;
        $this->jigsaw->setConfig($lang, $site_localization);
    }

    /* ---------------------------------------------------------*/
    //          Helpers
    /* ---------------------------------------------------------*/

    private function decoded_json(string $abs_path): array
    {
        return json_decode(file_get_contents($abs_path), true);
    }

    /**
     * Checks the end of file or path and matches it agains '.json'
     */
    private function is_not_json(string $path): bool
    {
        return substr($path, -5) !== ".json";
    }

    /* ---------------------------------------------------------*/
    //          Setters and Getters
    /* ---------------------------------------------------------*/

    public function getJsonsList(): array
    {
        return $this->jsonsList;
    }
}
