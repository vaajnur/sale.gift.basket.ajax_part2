<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

define("STOP_STATISTICS", true);
define("NOT_CHECK_PERMISSIONS", true);

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (CModule::IncludeModule("sale")){

        $arResult = array();

        if($_GET['id'] != '' && $_GET['action'] == 'add'){
            $basketID = Add2BasketByProductID($_GET['id'], 1);

            $arResult['status'] = 'suc';
            $arResult['basketID'] = $basketID;
        }

    }
    else{
        $arResult['status'] = 'err';
        $arResult['text'] = 'Не подключен модуль';
    }
}
else{

    $arResult['status'] = 'err';
    $arResult['text'] = 'Не аякс запрос';
}

echo json_encode($arResult);

die();