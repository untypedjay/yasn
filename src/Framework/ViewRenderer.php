<?php
namespace Framework;

final class ViewRenderer {
	private function __construct() { }

	public static function renderView($view, $data) {
		require(MVC::getViewPath() . "/$view.inc");
	}

	// HELPER FUNCTIONS FOR VIEW RENDERING

	private static function htmlOut($string) {
		echo(nl2br(htmlentities($string)));
	}

	private static function beginActionForm($action, $controller, $params = null, $method = 'get', $cssClass = null) {
		$c = MVC::PARAM_CONTROLLER;
		$a = MVC::PARAM_ACTION;
		$cc = $cssClass !== null ? " class=\"$cssClass\"" : '';
		$form = <<<FORM
<form method="$method" action="?"$cc>
	<input type="hidden" name="$c" value="$controller">
	<input type="hidden" name="$a" value="$action">
FORM;
		echo($form);
		if (is_array($params)) {
			foreach ($params as $name => $value) {
				echo("<input type=\"hidden\" name=\"$name\" value=\"$value\">");
			}
		}
	}

	private static function endActionForm() {
		echo('</form>');
	}

	private static function actionLink($content, $action, $controller, $params = null, $cssClass = null) {
		$cc = $cssClass != null ? " class=\"$cssClass\"" : '';
		$url = MVC::buildActionLink($action, $controller, $params);
		echo("<a href=\"$url\"$cc>");
		self::htmlOut($content);
		echo('</a>');
	}
}