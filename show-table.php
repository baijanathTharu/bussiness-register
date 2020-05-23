<?php include("./config.php"); ?>
<?php
if($_SERVER['REQUEST_METHOD']== "GET") {
        $sum = $_GET['sum'];
        $y = $_GET['y'];
        $d_id = $_GET['d_id'];
        $m_id = $_GET['m_id'];

        // echo $sum." ".$y." ".$m_id." ".$d_id;
    ?>
<!-- form -->

<table class="container table mb-5" id="hide-container2">

    <thead class="w3-red">
        <h3 class="container p-2 text-white w3-orange mt-4" id="hide-container3">
            Bussiness Details: As On <?php echo $y.'/'.$m_id.'/'.$d_id; ?>
        </h3>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Deal Name</th>
            <th scope="col">Address</th>
            <th scope="col">Quantity</th>
            <th scope="col">Rate</th>
            <th scope="col">Cost</th>
            <th scope="col" colspan="1">Operation</th>

        </tr>
    </thead>
    <tbody class="w3-brown text-white">
        <?php 
        $total = array();
        if(isset($_SERVER['REQUEST_METHOD']) == "GET") {
            if(isset($_GET['sum'])) {
                $sum = $_GET['sum'];
                $sql = "SELECT * FROM `$database`.`bussiness_record` WHERE record_date_id='$sum'";
                $result = mysqli_query($conn, $sql);

                if(!$result) {
                    $err =  "Error: ".mysqli_error($conn);
                } else {
                    $i = 1;
                    while($row = mysqli_fetch_assoc($result)) {
                        $recordName = $row['record_name'];
                        $recordAddress = $row['record_address'];
                        $quantity = $row['quantity'];
                        $rate = $row['rate'];
                        $cost = $row['cost'];
                        $recordId = $row['record_id'];
                        array_push($total, $cost);

                        // here table is populated

                        echo '<tr>
                        <th>'.$i.'</th>
                        <th>'.$recordName.'</th>
                        <th>'.$recordAddress.'</th>
                        <th>'.$quantity.'</th>
                        <th>'.$rate.'</th>
                        <th>'.$cost.'</th>
                        <th><button class="btn btn-danger" onclick="deleteRecord('.$recordId.')">Delete</button></th>
                    </tr>';

                        $i = $i + 1;

                    }
                }
            }
        }
    
    ?>

    </tbody>
    <tfoot class="w3-green text-white">
        <tr>
            <th>Total</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>
                <?php 
                $sum = 0;
                for ($i = 0; $i<count($total); $i++) {
                    $sum = $total[$i] + $sum;
                }
                echo $sum;
                ?>
            </th>
            <th></th>
        </tr>
    </tfoot>
</table>

<?php

}
?>