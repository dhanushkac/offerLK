<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/20/2016
 * Time: 6:52 PM
 */

require_once 'core/init.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'headerScripts.php'?>
</head>
<body id="page-top" class="index">
<?php require 'navigationBar.php'?>
<div class="main-block">
    <?php

if(Input::exists()){
    if(Token::check(Input::get('token'))) {
        $validate = new Validation();
        $validation = $validate->check($_POST, array(
            'Email_address' => array(
                'required' => true,
                'unique' => 'user_detail' //table name
            ),
            'Password' => array(
                'required' => true,
                'min' => 6
            ),
            're-password' => array(
                'required' => true,
                'matches' => 'Password'
            )
        ));
        if ($validation->passed()) {
            //register user
            $user = new User();
            try{
                $user->create(array(
                     'Email_address' => Input::get('Email_address'),
                     'Password' => Hash::make(Input::get('Password')),
                    'Type' => '',
                    'First_name' => '',
                    'Last_name' => '',
                    'Address_no' => '',
                    'Address_street' => '',
                    'Address_city' => '',
                    'Credit_card_number' => 0,
                    'Contact' => 0
                    //other data
                    ));

                echo 'registration successful';
                Redirect::to('index.php');
            }catch (Exception $e){
                die($e->getMessage());
            }
            //
        } else {
            $str = "";
            foreach ($validate->errors() as $error) {
                $str .= $error;
                $str .= '\n';
            }
            echo '<script type="text/javascript">alert("' . $str . '")</script>';
        }
    }
}
?>
<div class="col-lg-6 middle-content">
    <div class="offers">
        <div class="offer">
            <div class="row offer-row">
                <!-- offer description -->
                <div class="col-lg-10 offer-row-div">
                    <div class="offer-middle col-xs-offset-1">
                        <a class="offer-title" href="#">Sign up
                        </a>
                    </div>
<!--                    -->
                    <div class="col-xs-offset-2">
                    <form action="" method="post">
                        <div>
                            <h3><strong></strong></h3>
                        </div>

                        <div>
                            <label>Email</label><br>
                            <input class="form-control" type="email" name="Email_address"  placeholder="Enter your e-mail">
                        </div>
                        <div>
                            <label>Password</label><br>
                            <input class="form-control" type="password" name="Password" placeholder="Enter password">
                        </div>
                        <div>
                            <label>Re-Password</label><br>
                            <input class="form-control" type="password" name="re-password" >
                        </div>
                        <div>
                            <label>Credit Card Number</label><br>
                            <input class="form-control" type="text" name="Credit_card_number">
                        </div>
                        <div>
                            <label>First Name</label><br>
                            <input class="form-control" type="text" name="First_name">
                        </div>
                        <div>
                            <label>Last name</label><br>
                            <input class="form-control" type="text" name="Last_name">
                        </div>
                        <div>
                            <label>Contact Number</label><br>
                            <input class="form-control" type="text" name="Contact" >
                        </div>
                        <br>
                        <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                        <input class="btn btn-success col-xs-12" type="submit" value="Register">
                    </form>
                    </div>
<!--                    -->
                </div>

            </div>
        </div>
    </div>
</div>


</div>
<?php require 'footer.php'?>
<?php require 'footerScripts.php'?>
</body>
</html>