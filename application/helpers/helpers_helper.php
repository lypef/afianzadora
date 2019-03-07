<?php
    function UrlActual ($url)
    {
        $url = str_replace("/index.php/","",$url);
        
        $find   = '?';
        $pos = strpos($url, $find);
        if ($pos !== false) 
        {
            $tmp = htmlspecialchars(substr($url, 0, $pos), ENT_QUOTES, 'UTF-8');
            $tmp = base_url() . $tmp;
            return $tmp;
        } else 
        {
            $tmp = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
            $tmp = base_url() . $tmp;
            return $tmp;
        }
    }
    
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