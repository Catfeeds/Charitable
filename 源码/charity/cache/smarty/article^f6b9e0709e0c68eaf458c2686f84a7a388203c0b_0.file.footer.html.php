<?php /* Smarty version 3.1.27, created on 2016-06-14 15:24:12
         compiled from "E:\xampp\htdocs\runda\runda\application\views\common\footer.html" */ ?>
<?php
/*%%SmartyHeaderCode:15062575fb11cd9e102_45048498%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6b9e0709e0c68eaf458c2686f84a7a388203c0b' => 
    array (
      0 => 'E:\\xampp\\htdocs\\runda\\runda\\application\\views\\common\\footer.html',
      1 => 1465887354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15062575fb11cd9e102_45048498',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_575fb11cda0049_11266703',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_575fb11cda0049_11266703')) {
function content_575fb11cda0049_11266703 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15062575fb11cd9e102_45048498';
?>
<div class="bottom">Copyright © 2014-2015 xxx. All Rights Reserved</div>

<?php echo '<script'; ?>
>
    window.onload=function() {
        var Aleft=document.getElementById('left');
        var Aright=document.getElementById('right');

        Aleft.style.minHeight=window.innerHeight-130+"px";
        Aright.style.minHeight=window.innerHeight-130+"px";
        Aright.style.width=window.innerWidth-207+"px";

    };
    window.onresize=function() {
        var Aleft=document.getElementById('left');
        var Aright=document.getElementById('right');

        Aleft.style.minHeight=window.innerHeight-130+"px";
        Aright.style.minHeight=window.innerHeight-130+"px";
        Aright.style.width=window.innerWidth-207+"px";

    };

    $(function(){
        $.getJSON("/ajax/stat/data/", function( response ) {
            if ( response.code != 1 ) { return false;}

            $("#companyName").after(response.data.name);
        });
    });
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>