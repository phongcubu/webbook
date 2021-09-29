<?php
    if (! function_exists('randString')) {
        function randString($length) {
            $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str ="";
            $size = strlen($chars);
            for($i = 0; $i < $length; $i++)
            {
                $str .= $chars[rand(0, $size-1)];
            }
            return $str;
        }
    }

?>