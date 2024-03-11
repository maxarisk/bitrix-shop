<?
require_once __DIR__ . '/autoload.php';
define("RE_SITE_KEY","6LdRCJQpAAAAAAsHpu-IBInepIQt_Y0J_rnQeFxt");
define("RE_SEC_KEY","6LdRCJQpAAAAALjQjnvLRuGaJYF0Zo50GoZwFqio");

AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "checkGoogleCaptcha");

function checkGoogleCaptcha()
{
	global $APPLICATION;

	if ($_REQUEST['g-recaptcha-response'])
	{

		$recaptcha = new \ReCaptcha\ReCaptcha(RE_SEC_KEY);
		$resp = $recaptcha->verify($_REQUEST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
		if (!$resp->isSuccess())
		{
			$APPLICATION->throwException("Вы не прошли проверку подтверждения личности");
			return false;
		}
	}
	else
	{
		$APPLICATION->throwException("Вы не прошли проверку подтверждения личности");
		return false;
	}
}