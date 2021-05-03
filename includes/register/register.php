
<?php
    class account_model extends DbServices{
        public function themtk($user_id,$username,$email,$password,$phone)
        {   
            $arr=array($user_id,$username,$email,$password,$phone);
            
            $sql="INSERT INTO `account`( `user_id`, `username`, `email`,`password`,`phone`) VALUES (?,?,?,?,?)";
            return $this->Insert($sql,$arr);
        }

        public function getall()
        {           
            $sql="select * from account ";
            return $this->exeQuery($sql);
        }
    }
?>
<?php 
if(isset($_POST['Register']))
{
    $username=$_POST['username']; 
  $password=$_POST['password'];
  $email=$_POST['email']; 
  $user_id=$_POST['user_id'];
  $phone=$_POST['phone'];
  $accountdb=new account_model();
  $accountdb->themtk($user_id,$username,$email,$password,$phone);
  echo '<script>';
  echo "alert('dang ky thanh cong')";
  echo '</script>';
}
?><div class="whole-wrap">
	<div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                </div>
                <div class="col-lg-6 col-md-6">
                    <h1 class="title_color">Register</h1>
                    <form  method="POST" action="index.php">
                        <div class="mt-30">
                            <input type="text" name="username" placeholder="User name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'User name'" required class="single-input">
                        </div>
                        
                        <div class="mt-10">
                            <input type="password" name="password" id="password" placeholder="Password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Password'" required class="single-input">
                        </div>

                        <div class="mt-10" style="position: relative;">
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Confirm password'" required class="single-input" onchange="check()">
                                <span id="message" style="position: absolute; right:-30px ; top:-5px; transform: translate(-50%,50%);"></span>
                        </div>
                        <div class="mt-10">
                            <input type="text" name="email" placeholder="Email" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Email'" required class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="text" name="user_id" placeholder="ID" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'ID'" required class="single-input">
                        </div>

                        <div class="mt-10">
                            <input type="text" name="phone_number" placeholder="Phone number" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Phone number'" required class="single-input">
                        </div>

                        <div class="mt-30 row justify-content-center">
                            <input id="comfirm-register-btn" type="submit" value="Register" class="w-25 genric-btn danger radius" />
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php

class DbServices
{
    private $connection = null;
    function __construct()
    {
        if ($this->connection == null) {
            try {
                $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, PDOATTRS);
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
        }
    }
    function query($sql)
    {
        $stm = $this->connection->query($sql);
        $data = $stm->fetchAll();
        return $data;
    }
    function execute($sql, $param = [], $fetchMode = PDO::FETCH_ASSOC)
    {
        if ($this->connection == null) {
            die("Can't connect database.");
        }
        $stm = $this->pdo->prepare($sql);
        if ($stm->execute($param)) {
            return $stm->fetchAll($fetchMode);
        } else {
            print_r($stm->errorInfo());
            die();
        }
    }
}