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
        if (empty($fiadores))
        {
            $c =& get_instance();
            $fiadores = $c->db->query('SELECT id, razon_social FROM `fiadores` order by razon_social asc')->result();
        }

        $r = null;
        $r = '
        <div class="form-group">
            <label><strong>Fiador</strong></label>
            <select id="fiador" name="fiador" data-role="select" data-on-item-select="select_fiador('.$input.',arguments[0])">
        ';
        
        foreach ($fiadores as $row)
        {
                if ($id_select <= 0)
                {
                    $id_select = $row->id;
                }

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
        if ($input <= 0)
        {
            echo '<script>document.getElementById("fiador_0").value = "'.$id_select.'";</script>';
        }
        return $r;
    }

    function GetFianzaTipoSelect ($afianzadores_tipos ,$id_select, $input)
    {
        if (empty($afianzadores_tipos))
        {
            $c =& get_instance();
            $afianzadores_tipos = $c->db->query('SELECT * FROM afianzadores_tipos order by nombre asc')->result();
        }

        $r = null;
        $r = '
        <div class="form-group">
            <label><strong>Tipo de fianza</strong></label>
            <select id="tipo_fianza" name="tipo_fianza" data-role="select" data-on-item-select="select_tipo_fianza('.$input.',arguments[0])">
        ';
        
        foreach ($afianzadores_tipos as $row)
        {
                if ($id_select <= 0)
                {
                    $id_select = $row->id;
                }
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
        if ($input <= 0)
        {
            echo '<script>document.getElementById("tipo_fianza_0").value = "'.$id_select.'";</script>';
        }
        return $r;
    }

    function GetAfianzadoraSelect ($afianzadora, $id_select, $input)
    {
        if (empty($afianzadora))
        {
            $c =& get_instance();
            $afianzadora = $c->db->query('SELECT id, nombre FROM afianzadoras order by nombre asc')->result();
        }
        
        $r = null;
        $r = '
        <div class="form-group">
            <label ><strong>Afianzadora</strong></label>
            <select id="afianzadora" name="afianzadora" data-role="select" data-on-item-select="select_afianzadora('.$input.',arguments[0])">
            
        ';
        
        foreach ($afianzadora as $row)
        {
                if ($id_select <= 0)
                {
                    $id_select = $row->id;
                }
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
        if ($input <= 0)
        {
            echo '<script>document.getElementById("afianzadora_0").value = "'.$id_select.'";</script>';
        }
        return $r;
    }

    function GetPolizaSelect ($input)
    {
        $id_select = 0;

        $c =& get_instance();
        
        $fianzas = $c->db->query('SELECT id, contrato FROM `fianzas` where id not IN (SELECT fianza FROM `comisiones`) order by contrato asc ')->result();
        
        $r = null;
        $r = '
        <div class="form-group">
            <label ><strong>Poliza</strong></label>
            <select id="afianzadora" name="afianzadora" data-role="select" data-on-item-select="select_comision('.$input.',arguments[0])">
            
        ';
        
        foreach ($fianzas as $row)
        {
            if ($id_select <= 0)
            {
                $id_select = $row->id;
            }
            
            $r .= '
            <option value="'.$row->id.'">'.$row->contrato.'</option>
            ';    
        }
        $r .= '
        </select>
        </div>
        ';
        echo '<script>document.getElementById("comision_0").value = "'.$id_select.'";</script>';
        return $r;
    }
?>