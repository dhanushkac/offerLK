<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/19/2016
 * Time: 11:48 AM
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
                'required' => true
            ),
            'Password' => array(
                'required' => true
            )
        ));
        if ($validation->passed()) {
            //login user
            $user = new User();
            $login = $user->login(Input::get('Email_address'), Input::get('Password'));
            if($login){
                Redirect::to('index.php');
            }else{
                echo 'Login failed.Credentials does not match.';
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
                            <a class="offer-title" href="#">Sign in
                            </a>
                        </div>
<!--login form...........-->
                        <div class="col-xs-offset-2">
                            <form action="" method="post">
                                <div>
                                    <h3 id="signin"><strong></strong></h3>
                                </div>

                                <div>
                                    <label>Email</label><br>
                                    <input class="form-control" type="email" name="Email_address"  placeholder="Enter your e-mail">
                                </div>
                                <div>
                                    <label>Password</label><br>
                                    <input class="form-control" type="password" name="Password" placeholder="Enter your password">
                                </div>
                                <br>
                                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                                <input class="btn btn-success col-lg-12" type="submit" value="Sign In">
                            </form>
                        </div>

<!--login form end...........-->

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