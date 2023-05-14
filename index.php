<?php
include_once "head.php";
session_start();
if(!isset($_SESSION['uid'])){
    header('location: login.php');
}

?>
</header>
<div class="container-fluid d-flex">
      <div class="d-flex flex-column align-items-center">
          <img src="assets/images/userPfp/<?php echo $_SESSION['pfp'];?>" class=" rounded-circle" alt="" width="50px" height="50px">
      </div>
      <div class="mx-1">
          <h3 class="mb-2"><?php echo $_SESSION['uid']; ?></h3>
      </div>
</div>



























<?php
include_once "foot.php"; 
?>