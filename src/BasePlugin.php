<?php namespace BasePlugin;

use Premmerce\SDK\V2\FileManager\FileManager;
use BasePlugin\Admin\Admin;
use BasePlugin\Frontend\Frontend;
use BasePlugin\Ajax\Ajax;
use BasePlugin\Rest\Rest;
use BasePlugin\Internal\Internal;
use Inpsyde\WpContext;

/**
 * Class BasePlugin
 *
 * @package BasePlugin
 */
class BasePlugin {

	/**
	 * @var FileManager
	 */
	private $fileManager;

	/**
	 * BasePlugin constructor.
	 *
     * @param string $mainFile
	 */
    public function __construct($mainFile) {
        $this->fileManager = new FileManager($mainFile);

        $this->context = WpContext::determine();

        add_action('plugins_loaded', [ $this, 'loadTextDomain' ]);

	}

	/**
	 * Run plugin part
	 */
	public function run() {
        $GLOBALS['BasePluginFileManager'] = $this->fileManager;

        include_once $this->fileManager->getPluginDirectory() . 'src/Functions/functions.php';

        new Internal( $this->fileManager );

        if ( $this->context->isBackoffice() ) {
            new Admin( $this->fileManager );
        } elseif ( $this->context->isFrontoffice() ) {
            new Frontend( $this->fileManager );
        } elseif ( $this->context->isAjax() ) {
            new Ajax( $this->fileManager );
        } elseif ( $this->context->isRest() ) {
            new Rest( $this->fileManager );
        }

	}

    /**
     * Load plugin translations
     */
    public function loadTextDomain()
    {
        $name = $this->fileManager->getPluginName();
        load_plugin_textdomain('base-plugin', false, $name . '/languages/');
    }

	/**
	 * Fired when the plugin is activated
	 */
	public function activate() {
		// TODO: Implement activate() method.
	}

	/**
	 * Fired when the plugin is deactivated
	 */
	public function deactivate() {
		// TODO: Implement deactivate() method.
	}

	/**
	 * Fired during plugin uninstall
	 */
	public static function uninstall() {
		// TODO: Implement uninstall() method.
	}
}