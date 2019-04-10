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
            $body = ""; $active = true; $classTable="";
            
            if ($item->active != 1){ $classTable = 'class="bg-lightorange bg-orange-hover"'; $active = false;}

            $modals = '';
            $body = '
            <tr '.$classTable.'>
            <td>'.$item->fiador.'</td>
            <td><center>'.$item->afianzadora.'</center></td>
            <td>'.$item->contrato.'</td>
            <td><center>'.$item->fecha_emision.'</center></td>
            <td>
            
            <div class="split-button">
                <button class="button" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'block\'"><span class="mif-eye"></span> Detalles</button>
                <button class="split dropdown-toggle"></button>
                <ul class="d-menu" data-role="dropdown">                    
                    ';
            if ($active)
            {
                $body .= '
                    <li><a href="#" onclick="document.getElementById(\'comment'.$item->id.'\').style.display=\'block\'"><span class="mif-comment"></span> Comentarios</a></li>
                    <li><a href="#" onclick="document.getElementById(\'editar'.$item->id.'\').style.display=\'block\'"><span class="mif-pencil"></span> Editar</a></li>
                    <li class="divider"></li>';

                $modals .= '
                <!--Editar Comentarios-->
                    <div id="comment'.$item->id.'" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                        <div class="dialog-title"><strong>COMENTARIOS, CONTRATO: '.$item->contrato.'</strong></div>
                        <div class="dialog-content">
                            <form action="'.base_url().'all/fianzas_update_comment" method="post">
                                <textarea id="text" name="text" style="overflow-y:scroll;" data-clear-button="false" data-auto-size="false" rows="12" data-role="textarea" data-prepend="<span class='.'mif-leanpub'.'></span>" data-on-change="comentarios('.$item->id.', arguments[0])">'.$item->comentarios.'</textarea>
                                <textarea id="comentarios'.$item->id.'" name="comentarios'.$item->id.'" style="display:none;">'.$item->comentarios.'</textarea>
                                
                                <input type="hidden" id="contrato" name="contrato" value="'.$item->contrato.'" />
                                <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                                <input type="hidden" id="id" name="id" value="'.$item->id.'">
                        </div>
                        <div class="dialog-actions">
                            <button type="submit" class="button success js-dialog-close"><span class="mif-checkmark"></span> Guardar</button>
                            </form>
                            <button class="button info" onclick="document.getElementById(\'comment'.$item->id.'\').style.display=\'none\'"><span class="mif-cross"></span> Cerrar</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!--Actualizar-->    
                    <div id="editar'.$item->id.'" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
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
                            <button class="button" onclick="document.getElementById(\'editar'.$item->id.'\').style.display=\'none\'"><span class="mif-cross"></span> Cerrar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                ';
                if (empty($item->pdf_contrato_obra))
                {
                    $body .= '<li><a href="#" onclick="document.getElementById(\'add_docs'.$item->id.'\').style.display=\'block\'"><span class="mif-folder-plus fg-red"></span> <span class="fg-red">Subir documentos solicitud</span></a></li>';

                    $modals .='
                    <!--Subir documentos-->            
                    <div id="add_docs'.$item->id.'" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
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
                                <button class="button warning" onclick="document.getElementById(\'add_docs'.$item->id.'\').style.display=\'none\'"><span class="mif-cross"></span> cancelar</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    ';
                }else
                {
                    $body .= '
                        <li><a href="#" onclick="document.getElementById(\'_pdf_contrato_obra'.$item->id.'\').style.display=\'block\'"><span class="mif-file-pdf"></span> Contrato de obra</a></li>
                        <li><a href="#" onclick="document.getElementById(\'pdf_constancia_situacion_fiscal'.$item->id.'\').style.display=\'block\'"><span class="mif-file-pdf"></span> Constancia fiscal</a></li>
                        <li><a href="#" onclick="document.getElementById(\'pdf_estados_financiero'.$item->id.'\').style.display=\'block\'"><span class="mif-file-pdf"></span> Estado financiero</a></li>
                        <li><a href="#" onclick="document.getElementById(\'pdf_comprobante_domicilio'.$item->id.'\').style.display=\'block\'"><span class="mif-file-pdf"></span> Comprobante de domicilio</a></li>
                        <li><a href="#" onclick="document.getElementById(\'pdf_ife_representante_legal'.$item->id.'\').style.display=\'block\'"><span class="mif-file-pdf"></span> Representante legal</a></li>
                        <li><a href="#" onclick="document.getElementById(\'pdf_curp'.$item->id.'\').style.display=\'block\'"><span class="mif-file-pdf"></span> Curp</a></li>';


                    $modals .= '
                        <!--Visualizar _pdf_contrato_obra-->            
                        <div id="_pdf_contrato_obra'.$item->id.'" class="w3-modal">
                        <div class="w3-modal-content">
                            <div class="w3-container">
                            <div class="dialog-title"><strong>CONTRATO DE OBRA: | CONTRATO: '.$item->contrato.'</strong></div>
                                <div class="dialog-content">
                                <div class="content" style="height: 700px;">
                                    <iframe src="'.$item->pdf_contrato_obra.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                                </div>
                                </div>
                                <div class="dialog-actions">
                                    <button class="button warning" onclick="document.getElementById(\'_pdf_contrato_obra'.$item->id.'\').style.display=\'none\'"><span class="mif-checkmark"></span> Cerrar</button>
                                </div>
                            </div>
                        </div>
                        </div>

                        <!--Visualizar pdf_constancia_situacion_fiscal-->            
                        <div id="pdf_constancia_situacion_fiscal'.$item->id.'" class="w3-modal">
                        <div class="w3-modal-content">
                            <div class="w3-container">
                            <div class="dialog-title"><strong>CONTRATO DE OBRA: | CONTRATO: '.$item->contrato.'</strong></div>
                                <div class="dialog-content">
                                <div class="content" style="height: 700px;">
                                    <iframe src="'.$item->pdf_constancia_situacion_fiscal.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                                </div>
                                </div>
                                <div class="dialog-actions">
                                    <button class="button warning" onclick="document.getElementById(\'pdf_constancia_situacion_fiscal'.$item->id.'\').style.display=\'none\'"><span class="mif-checkmark"></span> Cerrar</button>
                                </div>
                            </div>
                        </div>
                        </div>

                        <!--Visualizar pdf_estados_financiero-->            
                        <div id="pdf_estados_financiero'.$item->id.'" class="w3-modal">
                        <div class="w3-modal-content">
                            <div class="w3-container">
                            <div class="dialog-title"><strong>CONTRATO DE OBRA: | CONTRATO: '.$item->contrato.'</strong></div>
                                <div class="dialog-content">
                                <div class="content" style="height: 700px;">
                                    <iframe src="'.$item->pdf_estados_financiero.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                                </div>
                                </div>
                                <div class="dialog-actions">
                                    <button class="button warning" onclick="document.getElementById(\'pdf_estados_financiero'.$item->id.'\').style.display=\'none\'"><span class="mif-checkmark"></span> Cerrar</button>
                                </div>
                            </div>
                        </div>
                        </div>


                        <!--Visualizar pdf_comprobante_domicilio-->            
                        <div id="pdf_comprobante_domicilio'.$item->id.'" class="w3-modal">
                        <div class="w3-modal-content">
                            <div class="w3-container">
                            <div class="dialog-title"><strong>CONTRATO DE OBRA: | CONTRATO: '.$item->contrato.'</strong></div>
                                <div class="dialog-content">
                                <div class="content" style="height: 700px;">
                                    <iframe src="'.$item->pdf_comprobante_domicilio.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                                </div>
                                </div>
                                <div class="dialog-actions">
                                    <button class="button warning" onclick="document.getElementById(\'pdf_comprobante_domicilio'.$item->id.'\').style.display=\'none\'"><span class="mif-checkmark"></span> Cerrar</button>
                                </div>
                            </div>
                        </div>
                        </div>


                        <!--Visualizar pdf_ife_representante_legal-->            
                        <div id="pdf_ife_representante_legal'.$item->id.'" class="w3-modal">
                        <div class="w3-modal-content">
                            <div class="w3-container">
                            <div class="dialog-title"><strong>CONTRATO DE OBRA: | CONTRATO: '.$item->contrato.'</strong></div>
                                <div class="dialog-content">
                                <div class="content" style="height: 700px;">
                                    <iframe src="'.$item->pdf_ife_representante_legal.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                                </div>
                                </div>
                                <div class="dialog-actions">
                                    <button class="button warning" onclick="document.getElementById(\'pdf_ife_representante_legal'.$item->id.'\').style.display=\'none\'"><span class="mif-checkmark"></span> Cerrar</button>
                                </div>
                            </div>
                        </div>
                        </div>


                        <!--Visualizar pdf_curp-->            
                        <div id="pdf_curp'.$item->id.'" class="w3-modal">
                        <div class="w3-modal-content">
                            <div class="w3-container">
                            <div class="dialog-title"><strong>CONTRATO DE OBRA: | CONTRATO: '.$item->contrato.'</strong></div>
                                <div class="dialog-content">
                                <div class="content" style="height: 700px;">
                                    <iframe src="'.$item->pdf_curp.'" style="min-width:100%; min-height:100%;" frameborder="0"></iframe>
                                </div>
                                </div>
                                <div class="dialog-actions">
                                    <button class="button warning" onclick="document.getElementById(\'pdf_curp'.$item->id.'\').style.display=\'none\'"><span class="mif-checkmark"></span> Cerrar</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    ';
                }
            }
            else
            {
                $body .= '
                <li><a href="#" onclick="document.getElementById(\'active'.$item->id.'\').style.display=\'block\'"><span class="mif-checkmark"></span> Activar</a></li>';
                
                $modals .= '
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
                </div>';
            }    
            $body .='
                    <li class="divider"></li>
                ';

            if ($active)
            {
                $body .= '
                <li><a href="#" onclick="document.getElementById(\'bloqued'.$item->id.'\').style.display=\'block\'"><span class="mif-blocked"></span> Cancelar</a></li>
                <li><a href="#" onclick="document.getElementById(\'delete'.$item->id.'\').style.display=\'block\'"><span class="mif-cross"></span> Anular</a></li>';
                
                $modals .= '
                <!--Cancelar-->
                <div id="bloqued'.$item->id.'" class="w3-modal">
                <div class="w3-modal-content">
                    <div class="w3-container">
                    <div class="dialog-title"><strong>Cancelar contrato: '.$item->contrato.'?, Puede activarlo nuevamente despues.</strong></div>
                        <div class="dialog-content">
                            <form action="'.base_url().'all/fianzas_update_active_no" method="post">
                            <input type="hidden" id="contrato" name="contrato" value="'.$item->contrato.'" />
                            <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                            <input type="hidden" id="id" name="id" value="'.$item->id.'">
                        </div>
                        <div class="dialog-actions">
                            <button type="submit" class="button warning js-dialog-close"><span class="mif-checkmark"></span> Cancelar</button>
                            </form>
                            <button class="button success" onclick="document.getElementById(\'bloqued'.$item->id.'\').style.display=\'none\'"><span class="mif-cross"></span> Cerrar</button>
                        </div>
                    </div>
                </div>
                </div>';
            }else {
                $body .='
                    <li><a href="#" onclick="document.getElementById(\'delete'.$item->id.'\').style.display=\'block\'"><span class="mif-cross"></span> Anular</a></li>
                ';
            }
            
            $body .='
            </ul>
            </div>
            </td>
            
            </tr>';
            
            $modals .= 
            '
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
                                    <strong>FECHA DE EMISION:</strong> '.$item->fecha_emision.'
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>FOLIO DE FACTURA:</strong> '.$item->folio_factura.'
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>MONTO DE FACTURA:</strong> $ '.$item->monto_factura.' MXN
                                </div>
                                <div class="pl-6 pb-2">
                                    <strong>FECHA DE PAGO:</strong> '.$item->fecha_pago.'
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
                </div>';

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