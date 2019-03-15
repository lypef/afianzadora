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

<form action="<?php echo base_url(); ?>all/fianzas_gestionar" method="get">
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

        <script>
            function select ()
            {
                console.log(select.val());
            }
        </script>

    <tbody>
    <?php
        foreach ($data as $item) 
        {
            $documentos = "";
            if (empty($item->pdf_contrato_obra))
            {
                $documentos = '<li><a href="#" onclick="Metro.dialog.open(\'#add_docs'.$item->id.'\')"><span class="mif-folder-plus fg-red"></span> <span class="fg-red">Subir documentos solicitud</span></a></li>';
            }else
            {
                $documentos = '
                    <li><a href="#" onclick="Metro.dialog.open(\'#pdf_contrato_obra'.$item->id.'\')"><span class="mif-file-pdf"></span> Contrato de obra</a></li>
                    <li><a href="#" onclick="Metro.dialog.open(\'#pdf_constancia_situacion_fiscal'.$item->id.'\')"><span class="mif-file-pdf"></span> Constancia fiscal</a></li>
                    <li><a href="#" onclick="Metro.dialog.open(\'#pdf_estados_financiero'.$item->id.'\')"><span class="mif-file-pdf"></span> Estado financiero</a></li>
                    <li><a href="#" onclick="Metro.dialog.open(\'#pdf_comprobante_domicilio'.$item->id.'\')"><span class="mif-file-pdf"></span> Comprobante de domicilio</a></li>
                    <li><a href="#" onclick="Metro.dialog.open(\'#pdf_ife_representante_legal'.$item->id.'\')"><span class="mif-file-pdf"></span> Representante legal</a></li>
                    <li><a href="#" onclick="Metro.dialog.open(\'#pdf_curp'.$item->id.'\')"><span class="mif-file-pdf"></span> Curp</a></li>
                ';
            }
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
                    '.$documentos.'
                </ul>
            </div>
            </td>
            
            </tr>
            
            <!--Visualizar pdf_contrato_obra-->            
            <div class="dialog" data-role="dialog" id="pdf_contrato_obra'.$item->id.'" data-width="80%">
                <div class="dialog-title"><strong>CONTRATO DE OBRA: | CONTRATO: '.$item->contrato.'</strong></div>
                <div class="dialog-content">
                <div class="content" style="height: 500px;">
                    <iframe src="'.$item->pdf_contrato_obra.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                </div>
                </div>
                <div class="dialog-actions">
                    <button class="button warning js-dialog-close"><span class="mif-checkmark"></span> Cerrar</button>
                </div>
            </div>

            <!--Visualizar pdf_constancia_situacion_fiscal-->            
            <div class="dialog" data-role="dialog" id="pdf_constancia_situacion_fiscal'.$item->id.'" data-width="80%">
                <div class="dialog-title"><strong>CONSTANCIA DE SITUACION FISCAL: | CONTRATO: '.$item->contrato.'</strong></div>
                <div class="dialog-content">
                <div class="content" style="height: 500px;">
                    <iframe src="'.$item->pdf_constancia_situacion_fiscal.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                </div>
                </div>
                <div class="dialog-actions">
                    <button class="button warning js-dialog-close"><span class="mif-checkmark"></span> Cerrar</button>
                </div>
            </div>

            <!--Visualizar pdf_estados_financiero-->            
            <div class="dialog" data-role="dialog" id="pdf_estados_financiero'.$item->id.'" data-width="80%">
                <div class="dialog-title"><strong>ESTADO FINANCIERO: | CONTRATO: '.$item->contrato.'</strong></div>
                <div class="dialog-content">
                <div class="content" style="height: 500px;">
                    <iframe src="'.$item->pdf_estados_financiero.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                </div>
                </div>
                <div class="dialog-actions">
                    <button class="button warning js-dialog-close"><span class="mif-checkmark"></span> Cerrar</button>
                </div>
            </div>

            <!--Visualizar pdf_comprobante_domicilio-->            
            <div class="dialog" data-role="dialog" id="pdf_comprobante_domicilio'.$item->id.'" data-width="80%">
                <div class="dialog-title"><strong>COMPROBANTE DE DOMICILIO: | CONTRATO: '.$item->contrato.'</strong></div>
                <div class="dialog-content">
                <div class="content" style="height: 500px;">
                    <iframe src="'.$item->pdf_comprobante_domicilio.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                </div>
                </div>
                <div class="dialog-actions">
                    <button class="button warning js-dialog-close"><span class="mif-checkmark"></span> Cerrar</button>
                </div>
            </div>

            <!--Visualizar pdf_ife_representante_legal-->            
            <div class="dialog" data-role="dialog" id="pdf_ife_representante_legal'.$item->id.'" data-width="80%">
                <div class="dialog-title"><strong>IFE, REPRESENTANTE LEGAL: | CONTRATO: '.$item->contrato.'</strong></div>
                <div class="dialog-content">
                <div class="content" style="height: 500px;">
                    <iframe src="'.$item->pdf_ife_representante_legal.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                </div>
                </div>
                <div class="dialog-actions">
                    <button class="button warning js-dialog-close"><span class="mif-checkmark"></span> Cerrar</button>
                </div>
            </div>

            <!--Visualizar pdf_curp-->            
            <div class="dialog" data-role="dialog" id="pdf_curp'.$item->id.'" data-width="80%">
                <div class="dialog-title"><strong>CURP: | CONTRATO: '.$item->contrato.'</strong></div>
                <div class="dialog-content">
                <div class="content" style="height: 500px;">
                    <iframe src="'.$item->pdf_curp.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                </div>
                </div>
                <div class="dialog-actions">
                    <button class="button warning js-dialog-close"><span class="mif-checkmark"></span> Cerrar</button>
                </div>
            </div>

            <!--Subir documentos-->            
            <div class="dialog" data-role="dialog" id="add_docs'.$item->id.'" data-width="80%">
                <div class="dialog-title"><strong>DOCUMENTACION DEL CONTRATO: '.$item->contrato.'</strong></div>
                <div class="dialog-content">
                
                <form action="'.base_url().'all/fianzas_up_docs" method="post" enctype="multipart/form-data">
                <div data-role="accordion" data-one-frame="true" data-show-active="true">
                    <div class="frame active">
                        <div class="heading bg-darkgray bg-gray-hover fg-white">Ingrese PDf - Contrato de obra</div>
                        <div class="content">
                            <div class="p-2">
                                <input type="file" id="pdf_contrato_obra'.$item->id.'" name="pdf_contrato_obra'.$item->id.'" aria-label="File browser example" accept="application/pdf" required>
                            </div>
                        </div>
                    </div>
                    <div class="frame">
                        <div class="heading bg-darkgray bg-gray-hover fg-white">Ingrese PDf - Situacion fiscal</div>
                        <div class="content">
                            <div class="p-2">
                                <input type="file" id="situacion_fiscal'.$item->id.'" name="situacion_fiscal'.$item->id.'" aria-label="File browser example" accept="application/pdf" required>
                            </div>
                        </div>
                    </div>
                    <div class="frame">
                        <div class="heading bg-darkgray bg-gray-hover fg-white">Ingrese PDf - Estados financieros</div>
                        <div class="content">
                            <div class="p-2">
                                <input type="file" id="estados_financieros'.$item->id.'" name="estados_financieros'.$item->id.'" aria-label="File browser example" accept="application/pdf" required>
                            </div>
                        </div>
                    </div>
                    <div class="frame">
                        <div class="heading bg-darkgray bg-gray-hover fg-white">Ingrese PDf - Comprobante de domicilio</div>
                        <div class="content">
                            <div class="p-2">
                            <input type="file" id="comprobante_domicilio'.$item->id.'" name="comprobante_domicilio'.$item->id.'" aria-label="File browser example" accept="application/pdf" required>
                            </div>
                        </div>
                    </div>
                    <div class="frame">
                        <div class="heading bg-darkgray bg-gray-hover fg-white">Ingrese PDf - IFE, Representante legal</div>
                        <div class="content">
                            <div class="p-2">
                                <input type="file" id="ife_r_legal'.$item->id.'" name="ife_r_legal'.$item->id.'" aria-label="File browser example" accept="application/pdf" required>
                            </div>
                        </div>
                    </div>
                    <div class="frame">
                        <div class="heading bg-darkgray bg-gray-hover fg-white">Ingrese PDf - CURP</div>
                        <div class="content">
                            <div class="p-2">
                                <input type="file" id="curp'.$item->id.'" name="curp'.$item->id.'" aria-label="File browser example" accept="application/pdf" required>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="id" name="id" value="'.$item->id.'"> 
                <input type="hidden" id="contrato" name="contrato" value="'.$item->contrato.'"> 
                </div>
                <div class="dialog-actions">
                    <button type="submit" class="button success"><span class="mif-cloud-upload"></span> Subir ficheros</button>
                    </form>
                    <button class="button warning js-dialog-close"><span class="mif-cross"></span> cancelar</button>
                </div>
            </div>
            
            <!--Visualizar Informacion-->
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
            <div class="dialog" data-role="dialog" id="editar'.$item->id.'" data-width="550">
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
                            <input type="hidden" id="tipo_fianza_'.$item->id.'" name="tipo_fianza_'.$item->id.'" value="'.$item->tipo_fianza_id.'">
                            '.GetFianzaTipoSelect($afianzadores_tipos, $item->tipo_fianza_id, $item->id).'
                            </div>
                        </div> 
                       </p>
                       <input type="hidden" id="fiador_'.$item->id.'" name="fiador_'.$item->id.'" value="'.$item->fiador_id.'">
                        '.GetFiadoresSelect($fiadores, $item->fiador_id, $item->id).'
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
                                    <input id="entrega" name="entrega" type="text" placeholder="Estatus" required value="'.$item->entrega.'" />
                                </div>
                            </div>
                        </div> 
                        </p>
                        <input type="hidden" id="afianzadora_'.$item->id.'" name="afianzadora_'.$item->id.'" value="'.$item->afianzadora_id.'">
                        '.GetAfianzadoraSelect($afianzadora, $item->afianzadora_id, $item->id).'
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
