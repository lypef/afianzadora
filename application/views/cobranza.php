<ul class="pagination alert flex-justify-center">
    <?php
    $search_var = "";
    if (isset($_GET['search'])){
        $search_var = "&search=".$_GET['search'];
    }

    if ($pag > 1)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag - 1 ).$search_var.'" ><span class="mif-arrow-left"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-left"></span></a></li>';
    }
    if ($pags > 1) {
      for ($i=1;$i<=$pags;$i++) {
         if ($pag == $i)
            echo '<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
         else
            echo '<li class="page-item"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.$i.$search_var.'">'.$i.'</a></li>';
      }
    }
    if ($pag < $pags)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag + 1 ).$search_var.'"><span class="mif-arrow-right"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-right"></span></a></li>';
    }
    ?>
</ul>

<form action="<?php echo base_url(); ?>all/cobranza" method="get">
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
            <th>FIADOR</th>
            <th><center>AFIANZADORA</center></th>
            <th><center>POLIZA</center></th>
            <th><center>FECHA DE PAGO</center></th>
            <th><center>OPCIONES</center></th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($data as $item) 
        {
            echo
            '
            <tr>
            <td>'.$item->fiador.'</td>
            <td><center>'.$item->nombre.'</center></td>
            <td><center>'.$item->contrato.'</center></td>
            <td><center>'.GetFormatDate($item->fecha_pago).'</center></td>
            
            <td>
                <div class="split-button">
                    <button class="button" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'block\'"><span class="mif-eye"></span> Detalles</button>
                    <button class="split dropdown-toggle"></button>
                    <ul class="d-menu" data-role="dropdown"> 
                        <li><a href="#" onclick="document.getElementById(\'mail'.$item->id.'\').style.display=\'block\'"><span class="mif-notification"></span> Recordatorio</a></li>
                        <li><a href="#" onclick="document.getElementById(\'pay'.$item->id.'\').style.display=\'block\'"><span class="mif-dollar"></span> Pagado</a></li>
                    </ul>
                </div>
            </td>
            </tr>

            <div id="mail'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 680px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>POLIZA: '.$item->contrato.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/CobranzaNotificaciones" method="post">
                    
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Destinatario</strong></label>
                                <input id="mail_to" name="mail_to" type="text" placeholder="Destinatario separador por ," required value="'.$item->correo1.','.$item->correo2.'" />
                            </div>
                        </div>
                        </p>
                        <div class="form-group">
                            <div class="form-group">
                                <label><strong>Asunto</strong></label>
                                <input id="mail_subject" name="mail_subject" type="text" placeholder="ASUNTO DE CORREO ELECTRONICO" required value="Su pago vence el dia: '.GetFormatDate($item->fecha_pago).'" />
                            </div>
                        </div>
                        </p>
                        <label><strong>Mensaje</strong></label>
                        <textarea id="text" name="text" style="overflow-y:scroll;" data-clear-button="false" data-auto-size="false" rows="6" data-role="textarea" data-prepend="<span class='.'mif-leanpub'.'></span>" data-on-change="comentarios('.$item->id.', arguments[0])">Apreciable: '.$item->fiador.', le recordamos su pago el dia: '.GetFormatDate($item->fecha_pago).', por la cantidad de: $ '.number_format($item->monto_factura, 2, '.', ',').' MXN, correspondiente a la poliza: '.$item->contrato.'</textarea>
                        <textarea id="comentarios'.$item->id.'" name="comentarios'.$item->id.'" style="display:none;">Apreciable: '.$item->fiador.', le recordamos su pago el dia: '.GetFormatDate($item->fecha_pago).', por la cantidad de: $ '.number_format($item->monto_factura, 2, '.', ',').' MXN, correspondiente a la poliza: '.$item->contrato.'</textarea>


                        <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                        <input type="hidden" id="id" name="id" value="'.$item->id.'">
                </div>
                <div class="dialog-actions">
                    <button type="submit" class="button alert"><span class="mif-mail"></span> Enviar</button>
                    </form>
                    <button class="button success" onclick="document.getElementById(\'mail'.$item->id.'\').style.display=\'none\'" ><span class="mif-bin"></span> Cancelar</button>
                </div>
                </div>
            </div>
            </div>
            
            <div id="pay'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 480px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>POLIZA: '.$item->contrato.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/cobranza_pay" method="post">
                        <p>Esta seguro de indicar como pagada esta poliza ?</p>
                        <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                        <input type="hidden" id="id" name="id" value="'.$item->id.'">
                </div>
                <div class="dialog-actions">
                    <button type="submit" class="button alert"><span class="mif-checkmark"></span> SI</button>
                    </form>
                    <button class="button success" onclick="document.getElementById(\'pay'.$item->id.'\').style.display=\'none\'" ><span class="mif-cross"></span> NO</button>
                </div>
                </div>
            </div>
            </div>

            <!-- Visualizar -->
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
                            <strong>FIADOR:</strong> '.$item->fiador.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>AFIANZADORA:</strong> '.$item->nombre.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>POLIZA:</strong> '.$item->contrato.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>FECHA DE PAGO:</strong> '.GetFormatDate($item->fecha_pago).'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>MONTO FACTURA:</strong> $ '.number_format($item->monto_factura, 2, '.', ',').' MXN
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>CONTACTOS:</strong><br>'.$item->contactos.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>TELEFONO:</strong> '.$item->telefonos.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>CORREO 1:</strong> '.$item->correo1.'
                        </div>
                        <div class="pl-6 pb-2">
                            <strong>CORREO 2:</strong> '.$item->correo2.'
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
            <!-- Finaliza Visualizar -->
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