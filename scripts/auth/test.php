<?php
include('session.php');
require_once ( 'D:\fh\Web\Projekt\scripts\data\user.php');
// The submit button was clicked
  $_SESSION['gender'] = "male";
  $_SESSION['firstname'] = 'Erik';
  $_SESSION['lastname'] = 'Dittrich';
  $_SESSION['email'] = 'erikdittrich11@gmail.com';
  $_SESSION['username'] = 'erik';
  $_SESSION['password'] = '12345678';
  $_SESSION['SignUP'] = false;
  $User = new User($_SESSION['username'],$_SESSION['password'],$_SESSION['firstname'],$_SESSION['lastname'],$_SESSION['email']);
  ?>