<?php
/**************************************************************************************************/
/* Created on July 2, 2010                                                                        */
/**************************************************************************************************/
require_once( FUNCTIONS_PATH . "categories/categories_db.inc" );
// ---------------------------------------------------------------------------------------------- //
//
// ---------------------------------------------------------------------------------------------- //
function create_html_select_categories($selected_id=0, $clientName='drpProductCategory',
                                       $isIncludeRoot=1)
{
  global $smarty;
  $Cat = List_All_Category();

  $smarty->assign('Categories_List', $Cat);
  $smarty->assign('selected_id', $selected_id);
  $smarty->assign('clientName', $clientName);
  $smarty->assign('isIncludeRoot', $isIncludeRoot);
  $html = $smarty->fetch( 'categories/html_select.tpl' );
  return $html;
}
?>
