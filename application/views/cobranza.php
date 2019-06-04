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
            <td><center>'.$item->fecha_pago.'</center></td>
            
            <td>
                <div class="split-button">
                    <button class="button" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'block\'"><span class="mif-eye"></span> Detalles</button>
                    <button class="split dropdown-toggle"></button>
                    <ul class="d-menu" data-role="dropdown"> 
                        <li><a href="#" onclick="document.getElementById(\'edit'.$item->id.'\').style.display=\'block\'"><span class="mif-notification"></span> Recordatorio</a></li>
                        <li><a href="#" onclick="document.getElementById(\'delete'.$item->id.'\').style.display=\'block\'"><span class="mif-dollar"></span> Pagado</a></li>
                    </ul>
                </div>
            </td>
            </tr>

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
                            <strong>FECHA DE PAGO:</strong> '.$item->fecha_pago.'
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