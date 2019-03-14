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

    function GetFiadoresSelect ($fiadores, $id_select, $input)
    {
        $r = null;
        $r = '
        <div class="form-group">
            <label><strong>Fiador</strong></label>
            <select id="fiador" name="fiador" data-role="select" data-on-item-select="select_fiador('.$input.',arguments[0])">
        ';
        
        foreach ($fiadores as $row)
        {
                if ($id_select == $row->id)
                {
                    $r .= '
                        <option value="'.$row->id.'" selected>'.$row->razon_social.'</option>
                    ';
                }else
                {
                    $r .= '
                        <option value="'.$row->id.'">'.$row->razon_social.'</option>
                    ';
                }
        }
        $r .= '
        </select>
        </div>
        ';
        return $r;
    }

    function GetFianzaTipoSelect ($afianzadores_tipos ,$id_select, $input)
    {
        $r = null;
        $r = '
        <div class="form-group">
            <label><strong>Tipo de fianza</strong></label>
            <select id="tipo_fianza" name="tipo_fianza" data-role="select" data-on-item-select="select_tipo_fianza('.$input.',arguments[0])">
        ';
        
        foreach ($afianzadores_tipos as $row)
        {
                if ($id_select == $row->id)
                {
                    $r .= '
                        <option value="'.$row->id.'" selected>'.$row->nombre.'</option>
                    ';
                }else
                {
                    $r .= '
                        <option value="'.$row->id.'">'.$row->nombre.'</option>
                    ';
                }
        }
        $r .= '
        </select>
        </div>
        ';
        return $r;
    }

    function GetAfianzadoraSelect ($afianzadora, $id_select, $input)
    {
        $r = null;
        $r = '
        <div class="form-group">
            <label ><strong>Afianzadora</strong></label>
            <select id="afianzadora" name="afianzadora" data-role="select" data-on-item-select="select_afianzadora('.$input.',arguments[0])">
            
        ';
        
        foreach ($afianzadora as $row)
        {
                if ($id_select == $row->id)
                {
                    $r .= '
                        <option value="'.$row->id.'" selected>'.$row->nombre.'</option>
                    ';
                }else
                {
                    $r .= '
                        <option value="'.$row->id.'">'.$row->nombre.'</option>
                    ';
                }
        }
        $r .= '
        </select>
        </div>
        ';
        return $r;
    }
?>