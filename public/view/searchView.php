<?php if($param == true):?>
    <?php foreach ($param as $key => $value):?>
        <form action="/item_details" method="GET">
            <input class="d_none" id="<?php echo $value[1] ?>" type="submit" name="<?php if($value[5] == 'shoes') echo 's'; if($value[5] == 'cloth') echo 'c'?>" value="<?php echo $value[1]?>" /> 
            <label for="<?php echo $value[1] ?>">  
            <div class="item_search">
                <div class="img_search"><img src="../../<?php echo $value[12];?>" alt=""> </div>
                <div class="flex_wrap_search">
                    <div class="info_item_search">
                        <div class="brand_search"><h3 class="name_search"><?php echo $value[2];?></h3></div>
                        <div class="name_search"><p class="name_search"><?php echo $value[3];?></p></div>
                    </div>
                    <div class="price_search"><h3 class="price_search"><?php echo $value[9];?>zł</h3></div>
                </div>
            </div>
            </label> 
        </form >
    <?php endforeach;?>
<?php else:?>
    <h1>Nie znaleziono</h1>
<?php endif;?>