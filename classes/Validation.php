<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/19/2016
 * Time: 11:54 AM
 */

class Validation {
    private $_passed = false,
            $_errors = array(),
            $_db = null;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function check($source,$items = array()){
        foreach($items as $item => $rules){
            foreach($rules as $rule => $rule_value){
                $value = trim($source[$item]);
                $item = escape($item);
                if($rule === 'required' && empty($value)){
                    $this->addError("{$item} is required.");
                }else if(!empty($value)){
                    switch($rule){
                        case 'min':
                            if(strlen($value)<$rule_value){
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                            break;
                        case 'max':
                            if(strlen($value)>$rule_value){
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                            break;
                        case 'matches':
                            if($value != $source[$rule_value]){
                                $this->addError("{$rule_value} must match {$item}.");
                            }
                            break;
                        case 'unique':
                            //$item will be a field name in the table.. $value is its value
                            $check = $this->_db->get($rule_value,array($item,'=',$value));
                            if($check->count()){
                                $this->addError("{$item} already exists.");
                            }
                            break;
                    }
                }
            }
        }

        if(empty($this->_errors)){
            $this->_passed = true;
        }

        return $this;
    }

    private function addError($error){
        $this->_errors[] = $error;
    }

    public function errors(){
        return $this->_errors;
    }

    public function passed(){
        return $this->_passed;
    }

}