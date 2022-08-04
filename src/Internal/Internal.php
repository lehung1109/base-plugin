<?php namespace BasePlugin\Internal;

use Premmerce\SDK\V2\FileManager\FileManager;

/**
 * Class Internal
 *
 * Core class run on all context
 *
 * @package BasePlugin\Admin
 */
class Internal {

    /**
     * @var FileManager
     */
    private $fileManager;

    /**
     * Admin constructor.
     *
     * Register menu items and handlers
     *
     * @param FileManager $fileManager
     */
    public function __construct( FileManager $fileManager ) {
        $this->fileManager = $fileManager;
    }

}