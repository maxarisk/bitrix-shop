<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?
use \Bitrix\Sale;

//get orders
$arOrders = array();
$dbRes = \Bitrix\Sale\Order::getList([
    'select' => ['ID', 'PAYED'],
	'filter' => [
	  "STATUS_ID" => "F",
      "PAYED" => "Y",
      "CANCELED" =>"N",
  ],
  'order' => ['ID' => 'ASC']
]);
while ($order = $dbRes->fetch())
{   
	$arOrders[] = $order["ID"];
}

if ($arOrders)
{
	//get products
	$arProducts = array();
	$arProductsIds = array();
	$dbRes = \Bitrix\Sale\Basket::getList([
		'select' => ['*'],
		'filter' => [
			'=ORDER_ID' => $arOrders, 
			'=LID' => \Bitrix\Main\Context::getCurrent()->getSite(),
		]
	]);
	while ($item = $dbRes->fetch())
	{
		if(!$arProductsIds[$item["PRODUCT_ID"]])
		{
			$arProductsIds[$item["PRODUCT_ID"]] = CCatalogSku::GetProductInfo($item["PRODUCT_ID"])['ID'];
		}

		if(intval($item['ORDER_ID']) > 0)
		{
			$arProducts[$arProductsIds[$item["PRODUCT_ID"]]] = intval($item["QUANTITY"]) + intval($arProducts[$arProductsIds[$item["PRODUCT_ID"]]]); 
		}
	}
}

if ($arProducts)
{
	//set orders count
	foreach($arProducts as $id => $count)
	{
		CIBlockElement::SetPropertyValuesEx($id, 2, array("ORDERS_COUNT" => $count));
	}
}
?>

<?
if ($_GET['sort'])
{
	switch ($_GET['sort'])
	{
		case 'price_desc':
			$sort = 1;
			break;
		case 'price_asc':
			$sort = 2;
			break;
		case 'pop_desc':
			$sort = 3;
			break;
		case 'pop_asc':
			$sort = 4;
			break;
		default:
			$sort = 2;
	}
}
else
{
	$sort = 2;
}
?>

<form method="GET" name="sort_form">
	Сортировка: <select name="sort">
		<option value="price_desc" <?= $sort === 1 ? 'selected' : ''?>>
			сначала дорогие
		</option>
		<option value="price_asc" <?= $sort === 2 ? 'selected' : ''?>>
			сначала недорогие
		</option>
		<option value="pop_desc" <?= $sort === 3 ? 'selected' : ''?>>
			сначала популярные
		</option>
		<option value="pop_asc" <?= $sort === 4 ? 'selected' : ''?>>
			сначала непопулярные
		</option>
	</select>
</form>