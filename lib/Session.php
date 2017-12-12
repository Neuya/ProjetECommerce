<?php

class Session {
    public static function is_user($login) {

        return (!empty($_SESSION['pseudoUtil']) && ($_SESSION['pseudoUtil'] == $login));
    }
    
    public static function is_admin() {
    return (!empty($_SESSION['isAdmin']) && $_SESSION['isAdmin']);
    }

    }


