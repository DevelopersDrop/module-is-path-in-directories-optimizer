<?php

namespace Drop\IsPathInDirectoriesOptimizer\Framework;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Filesystem\Driver\File as FileDriver;

/**
 * Class Validator.
 */
class Validator extends \Magento\Framework\View\Element\Template\File\Validator
{

    protected $fileDriver;

    /**
     * Validator constructor.
     * @param \Magento\Framework\Filesystem $filesystem
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfigInterface
     * @param \Magento\Framework\Component\ComponentRegistrar $componentRegistrar
     * @param null $scope
     * @param \Magento\Framework\Filesystem\Driver\File|null $fileDriver
     */
    public function __construct(
        \Magento\Framework\Filesystem $filesystem,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfigInterface,
        ComponentRegistrar $componentRegistrar,
        $scope = null,
        FileDriver $fileDriver = null
    ) {
        $this->_filesystem = $filesystem;
        $this->_isAllowSymlinks = $scopeConfigInterface->getValue(self::XML_PATH_TEMPLATE_ALLOW_SYMLINK, $scope);
        $this->_themesDir = $componentRegistrar->getPaths(ComponentRegistrar::THEME);
        $this->moduleDirs = $componentRegistrar->getPaths(ComponentRegistrar::MODULE);
        $this->_compiledDir = $this->_filesystem->getDirectoryRead(DirectoryList::TMP_MATERIALIZATION_DIR)
            ->getAbsolutePath();
        $this->fileDriver = $fileDriver ?: \Magento\Framework\App\ObjectManager::getInstance()->get(FileDriver::class);
    }

    /**
     * Checks whether path related to the directory
     *
     * @param string $path
     * @param string|array $directories
     * @return bool
     */

    protected function isPathInDirectories($path, $directories)
    {
        if (!is_array($directories)) {
            $directories = (array)$directories;
        }
        $realPath = $this->fileDriver->getRealPath($path);
        foreach ($directories as $directory) {
            if (0 === strpos($realPath, $directory)) {
                return true;
            }
        }
        return false;
    }

}

