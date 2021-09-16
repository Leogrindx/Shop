    <form action="/admin_panel/upgrade_itemUpgrade" class="colums" method="post">
    <?php foreach($param as $k => $v):?>
    <?php if('id' == $k || 'info' == $k || 'img' == $k):?>
    <?php else:?>
        <h3><?php echo $k?></h3>
        <div class="colum"><input type="text" name="<?php echo $k?>" value="<?php echo $v?>"></div>
    <?php endif;?>
    <?php endforeach;?>
    <button type="submit" class="btn_filter ug_b">Zmień</button>
    </form>