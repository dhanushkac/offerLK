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
            'email' => array(
                'required' => true,
                'unique' => 'user' //table name
            ),
            'password' => array(
                'required' => true,
                'min' => 6
            ),
            're-password' => array(
                'required' => true,
                'matches' => 'password'
            )
        ));
        if ($validation->passed()) {
            echo 'passed';
            //register user
            $user = new User();
            try{
                $user->create(array(
                     'email' => Input::get('email'),
                     'password' => Hash::make(Input::get('password'))
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
        <input type="email" name="email"  placeholder="Enter your e-mail">
    </div>
    <div>
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Enter password">
    </div>
    <div>
        <label>Re-Password</label><br>
        <input type="password" name="re-password" placeholder="Enter password">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate();?>">
    <input type="submit" value="Register">
</form>