<?php


class errorMessage{
    protected  $errors = [];

    public function set($name, $message){
        $this->errors[$name] = $message;
    }

    public function show($name){
        return $this->errors[$name];
    }
    
    public function is_exist($name){
        return isset($this->errors[$name]);
    }

    public function count_error(){
        return count($this->errors);
    }
}

