<?php
/**
 * FounTabs class file.
 * @author Alex Urbano <asgaroth.belem@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package foundation.widgets.menu
 */
Yii::import('foundation.widgets.menu.FounBaseMenu');

/**
 * Foundation menu widget.
 * Used for rendering of foundation menus with support dropdown sub-menus.
 * @since 0.9.8
 */
class FounTabs extends FounBaseMenu {

	/**
	 * To demonstrate how mobile navigation can work, adding a class of 'mobile' to a tab group will switch them (at small resolutions) to full width nav bars.
	 */
	public $mobile = false;

	/**
	 * @var string the menu type.
	 * Any combination of 'contained', 'nice', 'vertical', 'hide-on-phones'. Defaults to null meaning normal tabs.
	 */
	public $type;

	/**
	 * Initializes the widget.
	 */
	public function init() {
		$route = $this -> controller -> getRoute();
		$this -> items = $this -> normalizeItems($this -> items, $route);

		$cssClass = 'tabs';
		if ($this->type !== null) {
			$cssClass .= " " . $this -> type;
		}

		if (isset($this -> htmlOptions['class'])) {
			$this -> htmlOptions['class'] .= ' ' . $cssClass;
		} else {
			$this -> htmlOptions['class'] = $cssClass;
		}

	}

	/**
	 * Renders the items in this menu.
	 * @param array $items the menu items
	 */
	public function renderItems($items) {
		foreach ($items as $item) {
			if (!is_array($item)) {
				echo '<dd class="divider"></dd>';
			} else {
				if (!isset($item['itemOptions'])) {
					$item['itemOptions'] = array();
				}

				$cssClass = "";
				if ($item['active'] || (isset($item['items']) && $this -> isChildActive($item['items']))) {
					$cssClass = 'active';
				}

				if (isset($item['linkOptions']['class'])){
					$item['linkOptions']['class'] .= ' ' . $cssClass;
				}else{
					$item['linkOptions']['class'] = $cssClass;
				}

				echo CHtml::openTag('dd', $item['itemOptions']);
				$menu = $this -> renderItem($item);

				if (isset($this -> itemTemplate) || isset($item['template'])) {
					$template = isset($item['template']) ? $item['template'] : $this -> itemTemplate;
					echo strtr($template, array('{menu}' => $menu));
				} else
					echo $menu;

				echo '</dd>';
			}
		}
	}

	/**
	 * Normalizes the items in this menu.
	 * @param array $items the items to be normalized
	 * @param string $route the route of the current request
	 * @return array the normalized menu items
	 */
	protected function normalizeItems($items, $route) {
		foreach ($items as $i => $item) {
			if (isset($item['visible']) && !$item['visible']) {
				unset($items[$i]);
				continue;
			}

			if (!isset($item['label']))
				$item['label'] = '';

			if (isset($item['encodeLabel']) && $item['encodeLabel'])
				$items[$i]['label'] = CHtml::encode($item['label']);

			if (($this -> encodeLabel && !isset($item['encodeLabel'])) || (isset($item['encodeLabel']) && $item['encodeLabel'] !== false))
				$items[$i]['label'] = CHtml::encode($item['label']);

			if (!empty($item['items']) && is_array($item['items'])) {
				$items[$i]['items'] = $this -> normalizeItems($item['items'], $route);

				if (empty($items[$i]['items']))
					unset($items[$i]['items']);
			}

			if (!isset($item['active']))
				$items[$i]['active'] = $this -> isItemActive($item, $route);
		}

		return array_values($items);
	}

	/**
	 * Returns whether a child item is active.
	 * @param array $items the items to check
	 * @return boolean the result
	 */
	protected function isChildActive($items) {
		foreach ($items as $item)
			if (isset($item['active']) && $item['active'] === true)
				return true;

		return false;
	}

}