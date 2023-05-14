<?php
include_once("head.php");
$msg='';
if(isset($_SESSION['uid'])){
    header('location: index.php');
}
$class='';
if(isset($_GET['error'])){
    if($_GET['error']==="empty_input"){
        $msg='Some field/s are blank';
        $class='text-danger';
    }
    if($_GET['error']==="invalid_uid"){
        $msg='Invalid Username';
        $class='text-danger';
    }
    if($_GET['error']==="invalid_email"){
        $msg='Invalid Email';
        $class='text-danger';
    }
    if($_GET['error']==="pwd_not_match"){
        $msg='passwords do not match';
        $class='text-danger';
    }
    if($_GET['error']==="uid_email_taken"){
        $msg='Username or Email is taken';
        $class='text-danger';
    }
    if($_GET['error']==="stmt_failed"){
        $msg='SQL statement failed';
        $class='text-danger';
    }
    if($_GET['error']==="none"){
        $msg='Register Success';
        $class='text-success';
    }

}
?>
<div class="m-2">
            <a href="login.php" class="headerLink">Login</a>
</div>
</header>



<div class="m-2">
            <a href="login.php" class="headerLink">Login</a>
        </div>
    </header>
    <div class=" d-flex flex-column justify-content-center align-items-center container" id="mainArea">
        <section class=" border p-4" id="formArea">
            <h1 class="text-center">Profile</h1>
            <img src="" alt="">
        <form action="includes/register.inc.php" method="post" class="mt-2">
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text"
                  class="form-control" name="uid" id="" aria-describedby="helpId" placeholder="">
              </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text"
                  class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
              </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password"
                  class="form-control" name="pwd" id="" aria-describedby="helpId" placeholder="">
              </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password"
                  class="form-control" name="confPwd" id="" aria-describedby="helpId" placeholder="">
              </div>
            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" name="submit" class="text-bg-success">Register</button>
            </div>
            <p class="<?php echo $class?>">
                <?php
                echo $msg
                ?>
            </p>    
        </form>
        </section>

<?php
include_once("foot.php")
?>
</header>
