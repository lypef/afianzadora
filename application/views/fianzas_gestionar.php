</p>
<ul class="pagination alert flex-justify-center">
    <?php
    $search = "";
    if (isset($_GET['search'])){$search = '&search='.$_GET['search'];}
    
    if ($pag > 1)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag - 1 ).$search.'" ><span class="mif-arrow-left"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-left"></span></a></li>';
    }
    if ($pags > 1) {
      for ($i=1;$i<=$pags;$i++) {
         if ($pag == $i)
            echo '<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
         else
            echo '<li class="page-item"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.$i.$search.'">'.$i.'</a></li>';
      }
    }
    if ($pag < $pags)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag + 1 ).$search.'"><span class="mif-arrow-right"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-right"></span></a></li>';
    }
    ?>
</ul>

<form action="<?php echo base_url(); ?>all/fianzas_gestionar" method="get">
    <div class="input"><input id="search" name="search" type="text" class="" value="<?php if (isset($_GET['search'])) { echo $_GET["search"];}?>"><div class="button-group"><button class="button input-clear-button" tabindex="-1" type="button"><span class="default-icon-cross"></span></button></div><div class="prepend">Ingrese texto para realizar busqueda:</div></div>
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
            echo 
            '
            <tr>
            <td>'.$item->fiador.'</td>
            <td><center>'.$item->afianzadora.'</center></td>
            <td>'.$item->contrato.'</td>
            <td><center>'.$item->fecha_emision.'</center></td>
            <td>
            
            <div class="split-button">
                <button class="button" onclick="Metro.dialog.open(\'#view'.$item->id.'\')"><span class="mif-eye"></span> Detalles</button>
                <button class="split dropdown-toggle"></button>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="#" onclick="Metro.dialog.open(\'#editar'.$item->id.'\')"><span class="mif-pencil"></span> Editar</a></li>
                    <li><a href="#" onclick="Metro.dialog.open(\'#delete'.$item->id.'\')"><span class="mif-cross"></span> Eliminar</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="mif-folder-open"></span> Ver documentos solicitud</a></li>
                </ul>
            </div>
            </td>
            
            </tr>
            
            <div class="dialog" data-role="dialog" id="view'.$item->id.'">
                <div class="dialog-title"><strong>CONTRATO: '.$item->contrato.'</strong></div>
                <div class="dialog-content">
                    <strong>FIADOR:</strong> '.$item->fiador.'
                    <br><strong>CONTRATO:</strong> '.$item->contrato.'
                    <br><strong>TIPO DE FIANZA:</strong> '.$item->tipo_fianza.'
                    <br><strong>AFIANZADORA:</strong> '.$item->afianzadora.'
                    <br><strong>FECHA DE EMISION:</strong> '.$item->fecha_emision.'
                    <br><strong>FOLIO DE FACTURA:</strong> '.$item->folio_factura.'
                    <br><strong>MONTO DE FACTURA:</strong> $ '.$item->monto_factura.' MXN
                    <br><strong>FECHA DE PAGO:</strong> '.$item->fecha_pago.'
                    <br><strong>ESTATUS DE ENTREGA:</strong> '.$item->entrega.'
                </div>
                <div class="dialog-actions">
                    <button class="button info js-dialog-close">Ok</button>
                </div>
            </div>
            
            <!--Actualizar-->            
            <div class="dialog" data-role="dialog" id="editar'.$item->id.'">
                <div class="dialog-title"><strong><center>CONTRATO: '.$item->contrato.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/fianzas_update" method="post">
                        <div class="form-group">
                            <label><strong>Fecha de emision</strong></label>
                            <input data-role="datepicker" data-value="'.date("Y-m-d",strtotime($item->fecha_emision."+ 1 days")).'" data-locale="es-MX" data-on-set="fecha_emision('.$item->id.', arguments[1])" data-distance="1">
                            <input type="hidden" id="fecha_emision'.$item->id.'" name="fecha_emision'.$item->id.'">
                        </div>
                        </p>
                        <div class="row">
                            
                            <div class="cell-6"><div class="form-group">
                                <label><strong>Contrato</strong></label>
                                <input id="contrato" name="contrato" type="text" placeholder="Ingrese numero de contrato" required value="'.$item->contrato.'" />
                            </div>
                            </div>

                            <div class="cell-6">
                            '.GetFianzaTipoSelect($afianzadores_tipos, $item->tipo_fianza_id).'    
                            </div>
                        </div> 
                       </p>
                        '.GetFiadoresSelect($fiadores, $item->fiador_id).'
                        </p>
                        <div class="row">
                            
                            <div class="cell-6">
                            <div class="form-group">
                                    <label><strong>Monto factura $</strong></label>
                                    <input id="monto_factura" name="monto_factura" type="text" placeholder="Ingrese el monto de la factura" required value="'.$item->monto_factura.'" />
                                </div>
                            </div>

                            <div class="cell-6">
                            <div class="form-group">
                                <label><strong>Folio factura</strong></label>
                                <input id="folio_factura" name="folio_factura" type="text" placeholder="Ingrese folio de la factura" required value="'.$item->folio_factura.'" />
                            </div>
                            </div>
                        </div> 
                        </p>
                        <div class="row">
                            
                            <div class="cell-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label><strong>Folio fianza</strong></label>
                                    <input id="folio_fianza" name="folio_fianza" type="text" placeholder="Ingrese folio de la fianza" required value="'.$item->folio_fianza.'" />
                                </div>
                            </div>
                            </div>

                            <div class="cell-6">
                                <div class="form-group">
                                    <label><strong>Estatus</strong></label>
                                    <input id="entrega" name="entrega" type="text" placeholder="Ingrese el monto de la factura" required value="'.$item->entrega.'" />
                                </div>
                            </div>
                        </div> 
                        </p>
                        '.GetAfianzadoraSelect($afianzadora, $item->afianzadora_id).'
                        </p>
                        
                        <div class="form-group">
                            <label><strong>Fecha de pago</strong></label>
                            <input data-role="datepicker" data-value="'.date("Y-m-d",strtotime($item->fecha_pago."+ 1 days")).'" data-locale="es-MX" data-on-set="fecha_pago('.$item->id.', arguments[1])" data-distance="1" style="z-index: 100">
                            <input type="hidden" id="fecha_pago'.$item->id.'" name="fecha_pago'.$item->id.'">
                        </div>
                        <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                        <input type="hidden" id="id" name="id" value="'.$item->id.'">
                </div>
                <div class="dialog-actions">
                    <button type="submit" class="button warning"><span class="mif-pencil"></span> Actualizar</button>
                    </form>
                    <button class="button js-dialog-close"><span class="mif-cross"></span> Cerrar</button>
                </div>
            </div>
            </div>

            <!--Eliminar-->
            <div class="dialog" data-role="dialog" id="delete'.$item->id.'">
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
                    <button class="button success js-dialog-close"><span class="mif-checkmark"></span> NO eliminar</button>
                </div>
            </div>
            ';
        }
        ?>
    </tbody>
</table>
</div>

<script>
    function fecha_emision (id, fecha)
    {
        $("#fecha_emision".concat(id)).val(fecha);
    }

    function fecha_pago (id, fecha)
    {
        $("#fecha_pago".concat(id)).val(fecha);
    }
</script>

<ul class="pagination alert flex-justify-center">
    <?php
    $search = "";
    if (isset($_GET['search'])){$search = '&search='.$_GET['search'];}
    
    if ($pag > 1)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag - 1 ).$search.'" ><span class="mif-arrow-left"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-left"></span></a></li>';
    }
    if ($pags > 1) {
      for ($i=1;$i<=$pags;$i++) {
         if ($pag == $i)
            echo '<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
         else
            echo '<li class="page-item"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.$i.$search.'">'.$i.'</a></li>';
      }
    }
    if ($pag < $pags)
    {
        echo '<li class="page-item service"><a class="page-link" href="'.UrlActual($_SERVER['REQUEST_URI']).'?pagina='.($pag + 1 ).$search.'"><span class="mif-arrow-right"></span></a></li>';
    }else {
        echo '<li class="page-item service"><a class="page-link" ><span class="mif-arrow-right"></span></a></li>';
    }
    ?>
</ul>                                  
