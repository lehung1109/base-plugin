<?php namespace BasePlugin\Frontend;

use Premmerce\SDK\V2\FileManager\FileManager;

/**
 * Class Frontend
 *
 * @package BasePlugin\Frontend
 */
class Frontend {


	/**
	 * @var FileManager
	 */
	private $fileManager;

	public function __construct( FileManager $fileManager ) {
		$this->fileManager = $fileManager;
	}

}