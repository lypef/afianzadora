<ul class="pagination alert flex-justify-center">
    <?php
    if ($pag > 1)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag - 1 ).'" ><span class="mif-arrow-left"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-left"></span></a></li>';
    }
    if ($pags > 1) {
      for ($i=1;$i<=$pags;$i++) {
         if ($pag == $i)
            echo '<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
         else
            echo '<li class="page-item"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.$i.'">'.$i.'</a></li>';
      }
    }
    if ($pag < $pags)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag + 1 ).'"><span class="mif-arrow-right"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-right"></span></a></li>';
    }
    ?>
</ul>

<form action="<?php echo base_url(); ?>all/comisiones" method="get">
    <div class="input">
    <input id="search" name="search" type="text" class="" value="<?php if (isset($_GET['search'])) { echo $_GET["search"];}?>">
    <div class="button-group">
        <button class="button input-clear-button" tabindex="-1" type="button" onclick="clear_focus_seaerch()"><span class="default-icon-cross"></span></button>
    </div>
    <div class="prepend">Ingrese texto para realizar busqueda:</div></div>
</form>

<br>

<div style="background-color:white">
<table class="table striped row-hover">
    <thead>
        <tr>
            <th>POLIZA</th>
            <th><center>ASEGURADO</center></th>
            <th><center>AGENTE</center></th>
            <th><center>PAGO</center></th>
            <th><center>OPCIONES</center></th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($data as $item) 
        {
            $facturar = '';
            if ($item->facturado == 0 && $item->pago_boolean == 1)
            {
                $facturar = 
                '
                    <li><a href="#" onclick="document.getElementById(\'facturar'.$item->id.'\').style.display=\'block\'"><span class="mif-books"></span> Facturar</a></li>
                ';
            }else if ($item->facturado == 1 && $item->pago_boolean == 1)
            {
                $facturar = '';
            }else{
                $facturar = 
                '
                    <li><a href="#" onclick="document.getElementById(\'edit'.$item->id.'\').style.display=\'block\'"><span class="mif-pencil"></span> Editar</a></li>
                    <li><a href="#" onclick="document.getElementById(\'delete'.$item->id.'\').style.display=\'block\'"><span class="mif-cross"></span> Eliminar</a></li>
                    <li><a href="#" onclick="document.getElementById(\'facturar'.$item->id.'\').style.display=\'block\'"><span class="mif-books"></span> Facturar</a></li>
                ';
            }
            $classTable="";
            
            if ($item->pago_boolean != 1){ $classTable = 'class="bg-lightorange bg-orange-hover"';}

            echo 
            '
            <tr '.$classTable.'>
            <td>'.$item->contrato.'</td>
            <td><center>'.$item->razon_social.'</center></td>
            
            <td>
                <div class="row">
                    <div class="cell">
                        <div><strong>$</strong></div>
                    </div>

                    <div class="cell" align="right">
                        <div>'.number_format($item->comision_agente, 2, '.', ',').'</div>
                    </div>
                </div>
            </td>

            <td><center><strong>'.$item->pago.'</strong></center></td>
            
            <td>
                <div class="split-button">
                    <button class="button" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'block\'"><span class="mif-eye"></span> Detalles</button>
                    <button class="split dropdown-toggle"></button>
                    <ul class="d-menu" data-role="dropdown"> 
                        '.$facturar.'
                    </ul>
                </div>
            </td>
            </tr>

            <!-- Visualizar comision -->
            <div id="view'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 550px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>POLIZA: '.$item->contrato.'</center></strong></div>
                <div class="dialog-content">
                <div>
                        <div class="pl-6 pb-2">
                            <strong>FOLIO, BASE DE DATOS:</strong> '.$item->id.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>POLIZA:</strong> '.$item->contrato.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>ASEGURADO:<br></strong> '.$item->razon_social.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>ENDOSO:</strong> '.$item->endoso.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>PRIMA NETA:</strong> $ '.number_format($item->prima_neta, 2, '.', ',').' MXN
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>COMISION AGENTE:</strong> $ '.number_format($item->comision_agente, 2, '.', ',').' MXN
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>ESTATUS PAGO:</strong> '.$item->pago.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>FACTURA EMITIDA:</strong> '.$item->facturado_.'
                        </div>
                    </div>
                </div>



                </div>
                <div class="dialog-actions">
                    <button class="button info" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'none\'" ><span class="mif-checkmark"></span> Ok</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Finaliza Visualizar comision -->
            
            <!-- Editar comision -->
            <div id="edit'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 550px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>POLIZA: '.$item->contrato.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/comision_update" method="post" autocomplete="off">
                        
                    <div class="row">
                        <div class="cell-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>ENDOSO</strong></label>
                                <input id="comision_endoso" name="comision_endoso" type="text" placeholder="ANULACION / ETC / ETC" required value="'.$item->endoso.'" />
                            </div>
                        </div>
                        </div>

                        <div class="cell-6">
                            <div class="form-group">
                                <input type="hidden" id="comision_update'.$item->id.'" name="comision_update'.$item->id.'" value="'.$item->pago_boolean.'">
                                '.GetComisionesPago($item->id, $item->pago_boolean).'
                            </div>
                        </div>
                    </div> 
                    </p>
                    <div class="row">
                        <div class="cell-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>PRIMA NETA</strong></label>
                                <input id="comision_p_neta" name="comision_p_neta" type="text" placeholder="$ 0.00 MXN" required value="'.number_format($item->prima_neta,2,'.','').'" />
                            </div>
                        </div>
                        </div>

                        <div class="cell-6">
                            <div class="form-group">
                                <label><strong>COMISION AGENTE</strong></label>
                                <input id="comision_agente" name="comision_agente" type="text" placeholder="$ 0.00 MXN" required value="'.number_format($item->comision_agente,2,'.','').'" />
                            </div>
                        </div>
                    </div> 

                    <input type="hidden" id="id" name="id" value="'.$item->id.'">
                    <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                </div>
                <div class="dialog-actions">
                    <button type="submit" class="button warning"><span class="mif-plus"></span> Actualizar</button>
                    </form>
                    <button class="button" onclick="document.getElementById(\'edit'.$item->id.'\').style.display=\'none\'" ><span class="mif-cross"></span> cancelar</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Finaliza Editar comision -->

            <div id="facturar'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 480px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>FACTURAR COMISION: '.$item->contrato.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/comision_facturar" method="post">
                        <p>Esta seguro que esta comision ya esta facturada ?, Una comision ya facturado no se puede editar o eliminar.</p>
                        <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                        <input type="hidden" id="id" name="id" value="'.$item->id.'">
                </div>
                <div class="dialog-actions">
                    <button type="submit" class="button warning"><span class="mif-dollar"></span> Facturado</button>
                    </form>
                    <button class="button success" onclick="document.getElementById(\'facturar'.$item->id.'\').style.display=\'none\'" ><span class="mif-checkmark"></span> Cancelar</button>
                </div>
                </div>
            </div>
            </div>
            
            
            <div id="delete'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 480px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>ELIMINAR COMISION: '.$item->contrato.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/comision_delete" method="post">
                        <p>Esta seguro de eliminar esta comision ?, La fianza y el afianzador no seran afectados.</p>
                        <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                        <input type="hidden" id="id" name="id" value="'.$item->id.'">
                </div>
                <div class="dialog-actions">
                    <button type="submit" class="button alert"><span class="mif-bin"></span> Eliminar</button>
                    </form>
                    <button class="button success" onclick="document.getElementById(\'delete'.$item->id.'\').style.display=\'none\'" ><span class="mif-checkmark"></span> NO eliminar</button>
                </div>
                </div>
            </div>
            </div>
            ';
        }
        ?>
    </tbody>
</table>
</div>

<ul class="pagination alert flex-justify-center">
    <?php
    if ($pag > 1)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag - 1 ).'" ><span class="mif-arrow-left"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-left"></span></a></li>';
    }
    if ($pags > 1) {
      for ($i=1;$i<=$pags;$i++) {
         if ($pag == $i)
            echo '<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
         else
            echo '<li class="page-item"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.$i.'">'.$i.'</a></li>';
      }
    }
    if ($pag < $pags)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag + 1 ).'"><span class="mif-arrow-right"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-right"></span></a></li>';
    }
    ?>
</ul>