<?php namespace BasePlugin\Rest;

use Premmerce\SDK\V2\FileManager\FileManager;

/**
 * Class Rest
 *
 * @package BasePlugin\Frontend
 */
class Rest {


    /**
     * @var FileManager
     */
    private $fileManager;

    public function __construct( FileManager $fileManager ) {
        $this->fileManager = $fileManager;
    }

}