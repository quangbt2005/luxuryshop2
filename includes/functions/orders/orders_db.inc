<?php
/**************************************************************************************************/
/* Created on July 01, 2010                                                                       */
/**************************************************************************************************/
function LoadMostRecentOrders($limit=10)
{
  $query  = 'SELECT o.orders_id,o.customers_id,o.customers_name,o.orders_status,ot.value,';
  $query .= 'o.customers_street_address as address,';
  $query .= "DATE_FORMAT(o.date_purchased,'%Y-%m-%d') AS date_purchased,os.orders_status_name ";
  $query .= 'FROM ' . TBL_ORDERS . ' o INNER JOIN ' . TBL_ORDERS_TOTAL . ' ot USING(orders_id) ';
  $query .= 'LEFT JOIN ' . TBL_ORDERS_STATUS . ' os ON(orders_status_id=orders_status) ';
  $query .= "WHERE o.deleted='0'";
  $query .= 'ORDER BY date_purchased DESC LIMIT ' . $limit;

  return P_MySQL_Real_SELECT_GetArrayIndex( $query );
}
// ---------------------------------------------------------------------------------------------- //
function LoadOrder($order_id)
{
  $query  = 'SELECT o.orders_id,o.customers_id,o.customers_name,o.orders_status,ot.value,';
  $query .= 'o.customers_street_address AS address,o.customers_email_address AS email,';
  $query .= 'o.customers_telephone AS phone,o.payment_method AS method,o.note,o.date_purchased,';
  $query .= 'o.orders_status AS status,o.hash,o.YM_Notify ';
  $query .= 'FROM ' . TBL_ORDERS . ' o INNER JOIN ' . TBL_ORDERS_TOTAL . ' ot USING(orders_id) ';
  $query .= 'WHERE o.orders_id=' . $order_id . ' LIMIT 1';

  $Result = P_MySQL_Real_SELECT_GetArrayIndex( $query );
  if( empty( $Result[0] ) == FALSE ) {
      return $Result[0];
  }

  return NULL;
}
// ---------------------------------------------------------------------------------------------- //
function LoadOrderProducts($order_id)
{
  $query  = 'SELECT o.orders_id,op.products_id,op.products_name,op.products_price,op.final_price,';
  $query .= 'op.products_quantity,op.final_price*op.products_quantity as product_total ';
  $query .= 'FROM ' . TBL_ORDERS . ' o INNER JOIN ' . TBL_ORDERS_PRODUCTS . ' op USING(orders_id) ';
  $query .= 'WHERE o.orders_id=' . $order_id . ' ORDER BY op.products_name';

  $Result = P_MySQL_Real_SELECT_GetArrayIndex( $query );

  return $Result;
}
// ---------------------------------------------------------------------------------------------- //
function LoadOrderByHash($hash)
{
  $hash = P_SQL_Quote($hash);

  if(!empty($hash)){
    $query  = 'SELECT o.orders_id,o.customers_id,o.customers_name,o.orders_status,ot.value,';
    $query .= 'o.customers_street_address AS address,o.customers_email_address AS email,';
    $query .= 'o.customers_telephone AS phone,o.payment_method AS method,o.note,o.date_purchased,';
    $query .= 'o.orders_status AS status ';
    $query .= 'FROM ' . TBL_ORDERS . ' o INNER JOIN ' . TBL_ORDERS_TOTAL . ' ot USING(orders_id) ';
    $query .= "WHERE o.hash='" . $hash . "' LIMIT 1";

    $Result = P_MySQL_Real_SELECT_GetArrayIndex( $query );
    if( empty( $Result[0] ) == FALSE ) {
        return $Result[0];
    }
  }
  return NULL;
}
// ---------------------------------------------------------------------------------------------- //
function CountPendingOrders()
{
  $query  = "SELECT COUNT(1) as pending_order FROM " . TBL_ORDERS . " WHERE orders_status='1'";
  $Result = P_MySQL_Real_SELECT( $query );

  return $Result[0];
}
// ---------------------------------------------------------------------------------------------- //
function CountYMPendingOrder()
{
  $query  = "SELECT COUNT(1) as pending_order FROM " . TBL_ORDERS . " WHERE ym_notify='1'";
  $Result = P_MySQL_Real_SELECT( $query );

  return $Result[0];
}
// ---------------------------------------------------------------------------------------------- //
function GetYMReceiver()
{
  $query  = "SELECT configuration_value FROM configuration WHERE configuration_key='YM_RECEIVER'";
  $Result = P_MySQL_Real_SELECT( $query );

  return $Result[0];
}
?>
