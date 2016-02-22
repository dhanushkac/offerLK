<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/19/2016
 * Time: 11:54 AM
 */

class User{
    private $_db,
        $_data,
        $_sessionName,
        $_cookieName,
        $_isLoggedIn;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');
        if(!$user){
            if(Session::exists($this->_sessionName)){
                $user = Session::get($this->_sessionName);

                if($this->find($user)){
                    $this->_isLoggedIn = true;
                }else{
                    //logout process
                }
            }
        }else{
            $this->find($user);
        }
    }

    public function create($fields =array()){
        if(!$this->_db->insert('User_detail',$fields)){
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function login($email = null, $password = null){
        $user = $this->find($email);
        if($user){
            if($this->data()->Password === Hash::make($password)){
                Session::put($this->_sessionName,$this->data()->user_id);
                return true;
            }
        }
        return false;
    }

    public function find($user = null){
        if($user){
            $field = (is_numeric($user)) ? 'User_ID': 'Email_address';
            $data = $this->_db->get('user_detail',array($field,'=',$user));
            if($data->count()){
                $this->_data = $data->first();
                return true;
            }
        }
    }

    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }



    public  function data(){
        return $this->_data;
    }

    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }
}