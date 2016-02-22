<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/20/2016
 * Time: 6:52 PM
 */

require_once 'core/init.php';


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
                     'Password' => Hash::make(Input::get('Password'))
                    //other data
                    ));

                echo 'registration sucessfull';
                Redirect::to('index.php');
            }catch (Exception $e){
                die($e->getMessage());
            }
            //
        } else {
            $str = "";
            foreach ($validate->errors() as $error) {
                $str .= $error;
                $str .= '<br>';
                //            $str .= '\n';
            }
            echo $str;
        }
    }
}
?>
<form action="" method="post">
    <div>
        <h3><strong>Sign up</strong></h3>
    </div>

    <div>
        <label>Email</label><br>
        <input type="email" name="Email_address"  placeholder="Enter your e-mail">
    </div>
    <div>
        <label>Password</label><br>
        <input type="password" name="Password" placeholder="Enter password">
    </div>
    <div>
        <label>Re-Password</label><br>
        <input type="password" name="re-password" >
    </div>
    <div>
        <label>Credit Card Number</label><br>
        <input type="text" name="credit_card_number">
    </div>
    <div>
        <label>First Name</label><br>
        <input type="text" name="First_name">
    </div>
    <div>
        <label>Last name</label><br>
        <input type="text" name="Last_name">
    </div>
    <div>
        <label>Contact Number</label><br>
        <input type="text" name="Contact" >
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate();?>">
    <input type="submit" value="Register">
</form>