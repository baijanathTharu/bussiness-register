<?php include("./header.php"); ?>
<div class="container" id="display-message">
    <?php 
    if(isset($err)) {
        echo $err;
    }
    if(isset($succ)) {
        echo $succ;
    }
    
    ?>
</div>
<div class="container w3-white border border-rm" id="calendar"></div>
<div class="container w3-white border border-rm" id="hide-container">

</div>


<?php include("./footer.php") ?>