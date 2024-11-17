<?php

class Session{
    //set session
    public static function set($key,$value){
        $_SESSION[$key]=$value;
    }
//
    public static function has($key){
       return isset($_SESSION[$key]);
    }
    public static function get($key){
        return Session::has($key)? $_SESSION[$key] : false;
     }

   public static function remove($key){
        if(Session::has($key)){
            unset($_SESSION[$key]);
        }
     }
     public static function removeAll($key){
       session_destroy();
     }
     public static function flash($key){
        $value=Session::get($key);
        Session::remove($key);
        return $value ;
      }
      public static function getAll($key){
       
        return $_SESSION;
      }
}
