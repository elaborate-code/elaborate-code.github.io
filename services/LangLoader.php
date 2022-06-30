<?php

namespace App\Services;

use TightenCo\Jigsaw\Jigsaw;

class LangLoader
{

    private string $projectRoot;
    private array $localsList;
    private array $localLoadersList = [];

    public function __construct()
    {
        $this->setProjectRoot(); // TODO turn to function project_root():string
        $this->localsList = $this->listLocalFolders();

        foreach ($this->localsList as $lang) {
            $this->localLoadersList[$lang] = new LocalFolderLoader($this->projectRoot . "\\lang\\$lang", $lang);
        }
    }

    /**
     * 
     */
    private function listLocalFolders(): array
    {
        if (!realpath($this->projectRoot . '\\lang')) {
            trigger_error("No lang folder found", E_USER_NOTICE);
            return [];
        }

        $scan_results = scandir($this->getRealpath('\\lang'));
        // Exclude '.' and '..'
        return array_splice($scan_results, 2);
    }

    /* ---------------------------------------------------------*/
    //          Helpers
    /* ---------------------------------------------------------*/

    /**
     * @return string valid absolute path
     * @throws \Exception if path is invalid
     */
    private function getRealpath(string $rel_path): string
    {
        $realpath = realpath($this->projectRoot . "\\$rel_path");

        if (!$realpath)
            throw new \Exception("Invalide relative path. Can't get absolute path from '$rel_path'!", 1);

        return $realpath;
    }

    /**
     * Assume that the vendor folder is in the project root
     */
    private function setProjectRoot(): void
    {
        $reflection = new \ReflectionClass(\Composer\Autoload\ClassLoader::class);
        $this->projectRoot = realpath(dirname($reflection->getFileName(), 3));
    }

    /* ---------------------------------------------------------*/
    //          Setters and Getters
    /* ---------------------------------------------------------*/

    public function getLocalsList(): array
    {
        return $this->localsList;
    }

    public function getLocalLoadersList()
    {
        return $this->localLoadersList;
    }
}
