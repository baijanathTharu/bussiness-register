<?php include("./config.php") ?>
<?php 
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['r_id']) && isset($_GET['opr'])) {
        if($_GET['opr'] == "del") {
          $r_id = $_GET['r_id'];

          $sql = "DELETE FROM `$database`.`bussiness_record` WHERE record_id = '$r_id'";
          $res = mysqli_query($conn, $sql);

          if(!$res) {
            echo '<div class="alert w3-red alert-dismissible fade show p-4" role="alert">
            Error: '.mysqli_error($conn).'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          } else {

            echo '<div class="alert w3-green alert-dismissible fade show p-4" role="alert">
              Success: The selected item has been deleted.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          }
          
        } else {
          echo '<div class="alert w3-pink alert-dismissible fade show p-4" role="alert">
            Success: Edited
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    } 
}
?>