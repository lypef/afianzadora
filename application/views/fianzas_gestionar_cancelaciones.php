</p>
<ul class="pagination alert flex-justify-center">
    <?php
    $search = "";
    if (isset($_GET['search'])){$search = '&search='.$_GET['search'];}
    
    $afi_fia = '&afianzadora=';
    
    if (isset($_GET['afianzadora'])){
        $afi_fia .= $_GET['afianzadora'];
    }else {$afi_fia .= '0';}

    $afi_fia .= '&fiador=';
    
    if (isset($_GET['fiador'])){
        $afi_fia .= $_GET['fiador'];
    }else {$afi_fia .= '0';}

    if ($pag > 1)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag - 1 ).$search.$afi_fia.'" ><span class="mif-arrow-left"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-left"></span></a></li>';
    }
    if ($pags > 1) {
      for ($i=1;$i<=$pags;$i++) {
         if ($pag == $i)
            echo '<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
         else
            echo '<li class="page-item"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.$i.$search.$afi_fia.'">'.$i.'</a></li>';
      }
    }
    if ($pag < $pags)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag + 1 ).$search.$afi_fia.'"><span class="mif-arrow-right"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-right"></span></a></li>';
    }
    ?>
</ul>

<form action="<?php echo base_url(); ?>all/fianzas_gestionar_cancelaciones" method="get">
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
            <th>CONTRATO</th>
            <th><center>FECHA EMISION</center></th>
            <th>OPCIONES</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($data as $item) 
        {
            $modals = '';
            $body = '
            <tr class="fg-red">
            <td>'.$item->fiador.'</td>
            <td><center>'.$item->afianzadora.'</center></td>
            <td>'.$item->contrato.'</td>
            <td><center>'.GetFormatDate($item->fecha_emision).'</center></td>
            <td>
            
            <div class="split-button">
                <button class="button" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'block\'"><span class="mif-eye"></span> Detalles</button>
                <button class="split dropdown-toggle"></button>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="#" onclick="document.getElementById(\'active'.$item->id.'\').style.display=\'block\'"><span class="mif-checkmark"></span> Activar</a></li>
                    <li><a href="#" onclick="document.getElementById(\'delete'.$item->id.'\').style.display=\'block\'"><span class="mif-cross"></span> Anular</a></li>
                </ul>
            </div>
            </td>
            </tr>
            ';

            $modals .= '
            <!--Visualizar Informacion-->
            <div id="view'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 880px; !important">
                <div class="w3-container">
                <div class="dialog-title text-center"><strong>CONTRATO: '.$item->contrato.'</strong></div>
                <div class="dialog-content">

                <div class="grid">
                    <div class="row">
                        <div class="cell">
                            <div>
                                <strong>INFORMACION:</strong></p>
                                <div class="pl-6 pb-2">
                                    <strong>FIADOR:</strong> '.$item->fiador.'
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>CONTRATO:</strong> '.$item->contrato.'
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>TIPO DE FIANZA:</strong> '.$item->tipo_fianza.'
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>AFIANZADORA:</strong> '.$item->afianzadora.'
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>FECHA DE EMISION:</strong> '.GetFormatDate($item->fecha_emision).'
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>FOLIO DE FACTURA:</strong> '.$item->folio_factura.'
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>MONTO DE FACTURA:</strong> $ '.$item->monto_factura.' MXN
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>FECHA DE PAGO:</strong> '.GetFormatDate($item->fecha_pago).'
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>ESTATUS DE ENTREGA:</strong> '.$item->entrega.'
                                </div>
                            </div>
                        </div>

                        <div class="cell">
                            <div>
                                <strong>COMENTARIOS:</strong></p>
                                <textarea id="text" name="text" style="overflow-y:scroll;" data-clear-button="false" data-auto-size="false" rows="13" data-role="textarea" data-prepend="<span class='.'mif-leanpub'.'></span>">'.$item->comentarios.'</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="dialog-actions">
                    <button class="button info" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'none\'"><span class="mif-checkmark"></span> Ok</button>
                </div>
                </div>
            </div>
            </div>

            <!--Activar-->
            <div id="active'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                <div class="dialog-title"><strong>Activar contrato: '.$item->contrato.'?, Puede desactivarlo nuevamente despues.</strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/fianzas_update_active_si" method="post">
                    <input type="hidden" id="contrato" name="contrato" value="'.$item->contrato.'" />
                    <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                    <input type="hidden" id="id" name="id" value="'.$item->id.'">
                </div>
                <div class="dialog-actions">
                    <button type="submit" class="button warning js-dialog-close"><span class="mif-checkmark"></span> Activar</button>
                    </form>
                    <button class="button success" onclick="document.getElementById(\'active'.$item->id.'\').style.display=\'none\'"><span class="mif-cross"></span> Cancelar</button>
                </div>
                </div>
            </div>
            </div>


            <!--Anular-->
            <div id="delete'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>ELIMINAR CONTRATO: '.$item->contrato.'</center></strong></div>
            <div class="dialog-content">
                <form action="'.base_url().'all/fianzas_delete" method="post">
                    <p>Esta seguro de eliminar el contrato: <strong>'.$item->contrato.'</strong>, de el fiador: <strong>'.$item->fiador.' ?</strong></p>
                    <br>
                    <p><strong><center>Toda informacion relacionada a este contrato se perdera</center></strong></p>
                    <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                    <input type="hidden" id="id" name="id" value="'.$item->id.'">
            </div>
            <div class="dialog-actions">
                <button type="submit" class="button alert"><span class="mif-bin"></span> Eliminar</button>
                </form>
                <button class="button success" onclick="document.getElementById(\'delete'.$item->id.'\').style.display=\'none\'"><span class="mif-checkmark"></span> NO eliminar</button>
            </div>
                </div>
            </div>
            </div>
            ';
            $body .= $modals;
            echo $body;
        }
        ?>
    </tbody>
</table>
</div>
<ul class="pagination alert flex-justify-center">
    <?php
    if ($pag > 1)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag - 1 ).$search.$afi_fia.'" ><span class="mif-arrow-left"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-left"></span></a></li>';
    }
    if ($pags > 1) {
      for ($i=1;$i<=$pags;$i++) {
         if ($pag == $i)
            echo '<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
         else
            echo '<li class="page-item"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.$i.$search.$afi_fia.'">'.$i.'</a></li>';
      }
    }
    if ($pag < $pags)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag + 1 ).$search.$afi_fia.'"><span class="mif-arrow-right"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-right"></span></a></li>';
    }
    ?>
</ul>                                  
