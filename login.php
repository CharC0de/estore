<?php
include_once "head.php";
$msg = "";
if(isset($_SESSION['uid'])){
    header('location: index.php');
}
if(isset($_GET['error'])){
    if ($_GET['error']==="empty_input"){
        $msg = "Please Input all fields";
    }
    elseif($_GET['error']==="invalid_input"){
        $msg = "Invalid username or Password";
    }
    elseif($_GET['error']==="stmt_failed"){
        $msg = "SQL statement failed";
    }
}
?>

</header>

<div class=" d-flex flex-column justify-content-center align-items-center container" id="mainArea">
        <section class=" border p-4" id="formArea">
            <h1 class="text-center">Login</h1>
        <form action="includes/login.inc.php" method="post" class="mt-2">
            <div class="mb-3">
                <label for="" class="form-label">Username or Email</label>
                <input type="text"
                  class="form-control" name="uid" id="" aria-describedby="helpId" placeholder="">
              </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password"
                  class="form-control" name="pwd" id="" aria-describedby="helpId" placeholder="">
              </div>
            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" name="submit" class="text-bg-success">Login</button>
            </div>
            <div class="text-end">
                <a href="register.php" class=" text-success">Register</a>  
            </div>
            <div class="my-2 text-danger">
                <p>
                    <?php
                    echo $msg;
                    ?>
                </p>
            </div>
        </form>
        </section>
    </div>

<?php
include_once "foot.php"
?>