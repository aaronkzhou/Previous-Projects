<?php

session_start();
echo $_COOKIE['PHPSESSID'].'<br/>';
echo $_COOKIE[session_name()].'<br/>';
echo session_id().'<br/>';