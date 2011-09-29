<?php /* Smarty version 2.6.20, created on 2011-09-29 08:25:36
         compiled from products/detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'number_format', 'products/detail.tpl', 13, false),)), $this); ?>
<?php if ($this->_tpl_vars['product']['products_id'] != ''): ?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #a8dcdf">
    <tr>
      <td style="padding: 10px 0 10px 10px;width:120px">
        <table cellpadding="0" cellspacing="0" border="0">
          <tr><td align="left"><img src="/images/products/<?php echo $this->_tpl_vars['product']['products_image']; ?>
" width="290" border="0" vspace="0" hspace="0" style="padding:0;margin:0;float:left;" alt="<?php echo $this->_tpl_vars['product']['products_name']; ?>
"></td></tr>
        </table>
      </td>
      <td valign="top" style="padding: 0;width: 450px;" align="left">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="left">
          <tr><td style="padding-top: 5px;height:38px;color:red" valign="top" align="left"><strong><?php echo $this->_tpl_vars['product']['products_name']; ?>
</strong></td></tr>
          <tr><td style="padding: 5px 3px 5px 5px;height:130px;" valign="top" align="left"><?php echo $this->_tpl_vars['product']['products_intro']; ?>
</td></tr>
          <tr><td style="padding: 5px 3px 5px 5px;color: #00ff00;" valign="top" align="left"><strong><?php echo smarty_number_format(array('number' => $this->_tpl_vars['product']['products_price']), $this);?>
</strong></td></tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="padding: 15px;" align="left"><div style="padding: 20px;border: 1px solid #cccccc;background-color: #456581;text-align: left"><?php echo $this->_tpl_vars['product']['products_description']; ?>
</div></td>
    </tr>
</table>
<?php else: ?>
<p class="f20 fb">Không tìm thấy sản phẩm !</p>
<p><img src="/images/cry.gif"></p><br><br><br><br><br><br>
<div class="container t-right"><p><a href="/"><img border="0" width="110" title=" Quay lại " alt="Quay lại" src="/images/languages/vietnam/buttons/button_back.gif"></a></p></div>
<?php endif; ?>
<br /><br />
<span class="bigtitle">Sản phẩm cùng danh mục</span>
<div id="makeMeScrollable">
  <div class="scrollingHotSpotLeft"></div>
  <div class="scrollingHotSpotRight"></div>
  <div class="scrollWrapper">
    <div class="scrollableArea">
      <?php $_from = $this->_tpl_vars['OtherProductsList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['other']):
?>
      <a href="/sanpham/<?php echo $this->_tpl_vars['other']['products_id']; ?>
/chitiet" title="<?php echo $this->_tpl_vars['other']['products_name']; ?>
 <?php echo smarty_number_format(array('number' => $this->_tpl_vars['other']['products_price']), $this);?>
VND"><img src="/product_thumb.php?f=<?php echo $this->_tpl_vars['other']['products_image']; ?>
&w=auto&h=120&ma=150&cx=150&cy=150" width="150" height="150" border="0"></a>
      <?php endforeach; endif; unset($_from); ?>
    </div>
  </div>
</div>