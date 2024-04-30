<?php
  if(!isset($_COOKIE["birthday"])) {
    $birthday = date('Y-m-d', strtotime(trim(fgets(STDIN))));
  } else {
    $birthday = date('Y-m-d', strtotime($_COOKIE["birthday"]));
  }
  $current_date = date('Y-m-d');
  $diff_days = (strtotime($birthday) - strtotime($current_date)) / 86400;
  if($diff_days < 0) {
    setcookie("birthday", date('Y-m-d', strtotime($birthday)), time() + 86400, '/');
    echo "С днём рожденья!";
  } else {
    echo "Дней до дня рожденья: " . abs($diff_days) . " days.";
    setcookie("birthday", date('Y-m-d', strtotime($birthday)), time() + 86400 * 365, '/');
  }



  if (!isset($_COOKIE['test'])) {
    setcookie('test', '', time() -1 '/')
  } else {
    $birthday = new DateTime($_COOKIE['test']);
    $today = new DateTime();
    $diff
  }
?> 

