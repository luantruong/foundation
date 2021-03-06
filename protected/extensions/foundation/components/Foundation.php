<?php
/**
 * Foundation class file.
 * @author Alex Urbano <asgaroth.belem@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package foundation.widgets
 */

/**
 * Foundation application component.
 * Used for registering Foundation core functionality.
 */
class Foundation extends CApplicationComponent {

	/**
	 * @var boolean whether to register the Foundation core CSS (foundation.css).
	 * Defaults to true.
	 */
	public $coreCss = true;
	/**
	 * @var boolean whether to register jQuery and the Foundation JavaScript.
	 */
	public $enableJS = true;

	protected $_assetsUrl;

	/**
	 * Initializes the component.
	 */
	public function init() {
		if (!Yii::getPathOfAlias('foundation'))
			Yii::setPathOfAlias('foundation', realpath(dirname(__FILE__) . '/..'));

		if ($this -> coreCss) {
			$this -> registerCss();
		}

		if ($this -> enableJS) {
			$this -> registerJs();
		}
	}


	/**
	 * Registers the Bootstrap CSS.
	 */
	public function registerCss() {
		Yii::app() -> clientScript -> registerCssFile($this -> getAssetsUrl() . '/stylesheets/foundation.css');
	}

	/**
	 * Registers the core JavaScript plugins.
	 * @since 0.9.8
	 */
	protected function registerJs() {
		Yii::app() -> clientScript -> registerCoreScript('jquery');
		Yii::app() -> clientScript -> registerScriptFile($this -> getAssetsUrl() . '/javascripts/modernizr.foundation.js');
		Yii::app() -> clientScript -> registerScriptFile($this -> getAssetsUrl() . '/javascripts/foundation.js');
		Yii::app() -> clientScript -> registerScriptFile($this -> getAssetsUrl() . '/javascripts/app.js');
	}

	/**
	 * Registers a JavaScript file in the assets folder.
	 * @param string $fileName the file name.
	 * @param integer $position the position of the JavaScript file.
	 */
	public function registerScriptFile($fileName, $position = CClientScript::POS_END) {
		Yii::app() -> clientScript -> registerScriptFile($this -> getAssetsUrl() . '/javascripts/' . $fileName, $position);
	}
	
	/**
	 * Registers a CSS file in the assets folder.
	 * @param string $fileName the file name.
	 */
	public function registerCssFile($fileName, $position = CClientScript::POS_END) {
		Yii::app() -> clientScript -> registerCssFile($this -> getAssetsUrl() . '/stylesheets/' . $fileName);
	}

	/**
	 * Returns the URL to the published assets folder.
	 * @return string the URL
	 */
	protected function getAssetsUrl() {
		if ($this -> _assetsUrl == null) {
			$assetsPath = Yii::getPathOfAlias('foundation.lib.foundation');
			$this -> _assetsUrl = Yii::app() -> assetManager -> publish($assetsPath, false, -1, YII_DEBUG);
		}
		return $this -> _assetsUrl;
	}

}
