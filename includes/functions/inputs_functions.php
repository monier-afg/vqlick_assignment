<?php

    function check_post($data){
        $data = trim($data);
        $data = strip_tags($data);
        $data = stripslashes($data);
        return $data;
    }

?>