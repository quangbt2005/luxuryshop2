<?php /* Smarty version 2.6.20, created on 2011-09-29 08:28:45
         compiled from home/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'TitleBox', 'home/index.tpl', 2, false),array('function', 'number_format', 'home/index.tpl', 13, false),)), $this); ?>
  <div class="wrapper" style="width: 715px; margin-left: 1px;"><!-- New product -->
    <?php echo smarty_title_box(array('title' => "&nbsp;Sản phẩm mới nhất"), $this);?>

    <?php $_from = $this->_tpl_vars['NewProducts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
    <div class="product">
      <div style="background-color: black;" class="image_and_name_and_intro">
        <div class="image" style="background-color: black;"><a title="<?php echo $this->_tpl_vars['product']['products_name']; ?>
" href="/sanpham/<?php echo $this->_tpl_vars['product']['products_id']; ?>
/chitiet"><img src="/images/products/<?php echo $this->_tpl_vars['product']['products_image']; ?>
" height="180" border="0" alt="<?php echo $this->_tpl_vars['product']['products_name']; ?>
"></a></div>
        <div class="name_and_intro" style="background-color: black;">
          <div class="product_name"><?php echo $this->_tpl_vars['product']['products_name']; ?>
</div>
          <div class="product_intro" style="background-color: black"><?php echo $this->_tpl_vars['product']['products_intro']; ?>
</div>
        </div>
      </div>
      <div class="price_and_button">
        <div class="product_price"><strong><?php echo smarty_number_format(array('number' => $this->_tpl_vars['product']['products_price']), $this);?>
</strong></div>
        <div class="product_detail_button"><a href="/sanpham/<?php echo $this->_tpl_vars['product']['products_id']; ?>
/chitiet"><img src="/images/btn_detail.gif" border="0" alt="Chi tiết sản phẩm"></a></div>
      </div>
    </div>
    <?php endforeach; endif; unset($_from); ?>
  </div>