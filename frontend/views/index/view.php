<?php
/**
 * Date: 2016/8/25
 * Time: 9:36
 */

?>


<a href="javascript:;">点击</a>

<script>
$(function(){

    document.write(_lm.format.money(198999));

    $("a").on("click",function(){

        alert(_lm.valide.email('hahahh@qq.com'));

    })



})


</script>