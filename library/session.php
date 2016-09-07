<?php
/**
*Session Class
**/
class session{
 public static function init(){
  session_start();
 }

 public static function set($key, $val){
  $_SESSION[$key] = $val;
 }

 public static function get($key){
  if (isset($_SESSION[$key])) {
   return $_SESSION[$key];
  } else {
   return false;
  }
 }

 public static function checkSession(){    //session sesh hole login page e chole jabe
  self::init();
  if (self::get("login")== false) {
   self::destroy();
   header("Location:login.php");
  }
 }

 public static function checkLogin(){          //login obosthay thakle login page e na giye sorasori index page e jachse
  self::init();
  if (self::get("login")== true) {
   header("Location:index.php");
  }
 }

 public static function destroy(){
  session_destroy();
     echo 'ok';
  header("Location:login.php");
 }
}
?>