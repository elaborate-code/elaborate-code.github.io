<?php

namespace App\Services;

use TightenCo\Jigsaw\Jigsaw;

class LangFolderLoader
{

    private string $projectRoot;
    private array $localFoldersList;
    private array $localLoadersList = [];

    public function __construct(Jigsaw $jigsaw)
    {
        $this->setProjectRoot();
        $this->localFoldersList = $this->listLocalFolders();

        foreach ($this->localFoldersList as $lang) {
            $this->localLoadersList[$lang] = new LocalFolderLoader($jigsaw, $this->projectRoot . "\\lang\\$lang");
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

        return $this->listFolderContent($this->getRealpath('\\lang'));
    }

    /* ---------------------------------------------------------*/
    //          Helpers
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

    public function getLocalFoldersList(): array
    {
        return $this->localFoldersList;
    }
}
