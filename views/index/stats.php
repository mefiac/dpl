<?php require 'views/header.php'; ?>
    <?php   foreach($this->menu as $part)
        {?>
            <div style="    height: 250px;
    width: 250px;
    float: left;
    display: block;
    ">
                <img src=".<?=$part['pic'] ?>" style="    width: 200px;
    height: 200px;">

             <a  style="
    padding: 19px 40px 39px 6px;"  href="/api/redactIt?redact=0&id=<?=$part['id'] ?>"><?=$part['name'] ?></a> </div>



        <? }?>


<?php require 'views/footer.php'; ?>