<?php
/**************************************************************************************************/
/* Created on Dec 4, 2008                                                                         */
/**************************************************************************************************/
require_once( FUNCTIONS_PATH . "orders/orders_db.inc" );
// ---------------------------------------------------------------------------------------------- //
//
// ---------------------------------------------------------------------------------------------- //
if(! Check_Admin_Ajax()) return;

$Orders = LoadMostRecentOrders(100);
$smarty->assign('Orders', $Orders);
$html = $smarty->fetch('admin/orders/getlist.tpl');
echo $html;
?>