<?php
    function LoginCheck ()
    {
        $CI = & get_instance();
        
        if (!$CI->session->userdata('username'))
        {
            redirect (base_url());
        }
    }
    
    function LoginCheckBool ()
    {
        $CI = & get_instance();
        
        if (!$CI->session->userdata('username'))
        {
            return false;
        }else
        {
            return true;
        }
    }
?>