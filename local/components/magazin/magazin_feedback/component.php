<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(isset($arParams['EMAIL']))
{
	$paramEmail = array('EMAIL' => $arParams['EMAIL']);
	$obCache = new CPHPCache();
	if (!$obCache->InitCache(30 * 24 * 60 * 60, serialize($paramEmail), '/feedback_email'))
	{
		if ($obCache->StartDataCache())
		{
			$obSite = new CSite();
			$obSite->Update(SITE_ID, $paramEmail);
	
			$obCache->EndDataCache($paramEmail);
		}
	}
}

?>
<script src='https://www.google.com/recaptcha/api.js?hl=ru'></script>
<?

$this->IncludeComponentTemplate($componentPage);