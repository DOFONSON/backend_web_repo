<?php
    setcookie('test', 'Test1', time() + 3600);

    echo $_COOKIE['test'];
