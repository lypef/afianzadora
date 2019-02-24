<?php
    function LoginCheck ()
    {
        $CI = & get_instance();
        
        if (!$CI->session->userdata('session_id'))
        {
            redirect (base_url().'?requiredsession=true');
        }
    }
    
    function LoginCheckBool ()
    {
        $CI = & get_instance();
        
        if (!$CI->session->userdata('session_id'))
        {
            return false;
        }else
        {
            return true;
        }
    }
?>