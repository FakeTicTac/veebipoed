<?php
/* Smarty version 3.1.43, created on 2022-09-11 21:16:49
  from 'D:\ProgramFiles\laragon\www\themes\classic-rocket\modules\generalmodule\views\templates\hook\generalmodule.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_631e26112a6730_09439989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '415917bea9a0b1e7f446dd34bb370616a44cf12f' => 
    array (
      0 => 'D:\\ProgramFiles\\laragon\\www\\themes\\classic-rocket\\modules\\generalmodule\\views\\templates\\hook\\generalmodule.tpl',
      1 => 1662920204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_631e26112a6730_09439989 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='main_block'>
  <h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GENERALMODULE_HEADING']->value, ENT_QUOTES, 'UTF-8');?>
</h4>

  <div class="block_content">
    <p> 
      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GENERALMODULE_CONTENT']->value, ENT_QUOTES, 'UTF-8');?>

    </p>

  </div>
  <div class='color_container' style='--c: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GENERALMODULE_COLOR']->value, ENT_QUOTES, 'UTF-8');?>
'>
    <span>Chosen color: </span>
    <div class='color_block'></div>
  </div>
</div><?php }
}
