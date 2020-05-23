<?php include("./config.php") ?>
<?php include("./header.php") ?>
<div class="container" id="display-message">
    <?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['btn-add'])) {
        $rName = $_POST['record-name'];
        $rAdd = $_POST['record-address'];
        $quant = $_POST['quantity'];
        $rate = $_POST['rate'];
        $cost = $_POST['cost'];
        $rDateId = $_POST['record-date-id'];

        if(!empty($rName) && !empty($rAdd) && !empty($quant) && !empty($rate) && !empty($cost) && !empty($rDateId)) {
            $sql = "INSERT INTO `$database`.`bussiness_record` (`record_address`,`record_name`,`quantity`,`rate`,`cost`,`record_date_id`) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_stmt_init($conn);
            if(mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssiiii", $rAdd_para, $rName_para, $quant_para, $rate_para, $cost_para, $rDateId_para);
                $rName_para = $rName;
                $rAdd_para= $rAdd;
                $quant_para = $quant;
                $rate_para = $rate;
                $cost_para = $cost;
                $rDateId_para = $rDateId;
                $res = mysqli_stmt_execute($stmt);
    
                if(!$res) {
                    $err = '<div class="alert w3-red alert-dismissible fade show p-4" role="alert">
                    Error: '.mysqli_error($conn).'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                } else {
                    $succ = '<div class="alert w3-pink alert-dismissible fade show p-4" role="alert">
                    Success: Record has been added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }  
            }

           
        } else {
            $err = '<div class="alert w3-red alert-dismissible fade show p-4" role="alert">
            Error: There are one or more empty fields. Please fill all of them before adding!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
 
    }
}
?>
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

<form class="container w3-blue mb-4 text-white" id="hide-form"
    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <div id="deal-details"></div>
    <div class="form-group">
        <label for="exampleInputEmail1">Deal Name</label>
        <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter deal name"
            name="record-name" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter address"
            name="record-address" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Quantity</label>
        <input type="number" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Quantity"
            name="quantity" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Rate</label>
        <input type="number" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Rate"
            name="rate" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Cost</label>
        <input type="number" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Cost"
            name="cost" required>
    </div>
    <input type="hidden" name="record-date-id" id="record-date-id" value="">

    <button type="submit" class="btn w3-red p-2 my-2 w-25" name="btn-add">Add</button>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>

<script src="iCalendar.js"></script>
<script src="js/app.js"></script>
<script>
var hideForm = document.getElementById("hide-form");
hideForm.style.display = "none";
</script>

</body>

</html>