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

<form action="<?php echo base_url(); ?>all/fiadores_gestionar" method="get">
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
            <th>RAZON SOCIAL</th>
            <th>CONTACTOS</th>
            <th>TELEFONO</th>
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
            <td>'.$item->razon_social.'</td>
            <td>'.$item->contactos.'</td>
            <td>'.$item->telefonos.'</td>
            <td>
            
            <div class="split-button">
                <button class="button" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'block\'"><span class="mif-eye"></span> Detalles</button>
                <button class="split dropdown-toggle"></button>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="#" onclick="document.getElementById(\'editar'.$item->id.'\').style.display=\'block\'"><span class="mif-pencil"></span> Editar</a></li>
                    <li><a href="#" onclick="document.getElementById(\'delete'.$item->id.'\').style.display=\'block\'"><span class="mif-cross"></span> Eliminar</a></li>
                    <li class="divider"></li>
                    <li><a href="'.base_url().'all/comisiones?id_fiador='.$item->id.'"><span class="mif-dollar"></span> Ver comisiones</a></li>
                    <li class="divider"></li>
                    <li><a href="'.base_url().'all/fianzas_gestionar?fiador='.$item->id.'"><span class="mif-folder-open"></span> Ver fianzas activas</a></li>
                    <li><a href="'.base_url().'all/fianzas_gestionar_cancelaciones?fiador='.$item->id.'"><span class="mif-folder"></span> Ver fianzas canceladas</a></li>
                </ul>
            </div>
            </td>
            
            </tr>

            <div id="view'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 480px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong>'.$item->razon_social.'</strong></div>
                <div class="dialog-content">
                    <strong>CONTACTO:</strong> '.$item->contactos.'
                    <br><strong>TELEFONOS:</strong> '.$item->telefonos.'
                    <center><br><strong>Emails:</strong><br><a target="_BLANK" href="mailto:'.$item->correo1.'" target="_top">'.$item->correo1.'</a><br><a target="_BLANK" href="mailto:'.$item->correo2.'" target="_top">'.$item->correo2.'</a></center>
                </div>
                <div class="dialog-actions">
                    <button class="button info" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'none\'">Ok</button>
                </div>
                </div>
            </div>
            </div>


            
            
            <div id="editar'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 450px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>ACTUALIZAR: '.$item->razon_social.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/fiadores_update" method="post">
                        <div class="form-group">
                            <label>Razon social</label>
                            <input id="razon_social" name="razon_social" type="text" placeholder="Ingrese razon social"/ required value="'.$item->razon_social.'">
                        </div>

                        <div class="form-group">
                            <label>Contactos</label>
                            <input id="contactos" name="contactos" type="text" placeholder="Contacto, Puede se mas de uno"/ required value="'.$item->contactos.'">
                        </div>

                        <div class="form-group">
                            <label>Correo #1</label>
                            <input id="correo1" name="correo1" type="email" placeholder="Correo electronico principal"/ required value="'.$item->correo1.'">
                        </div>

                        <div class="form-group">
                            <label>Telefono</label>
                            <input id="telefonos" name="telefonos" type="text" placeholder="Ingrese telefono, puede ser mas de uno"/ value="'.$item->telefonos.'">
                        </div>

                        <div class="form-group">
                            <label>Correo #2</label>
                            <input id="correo2" name="correo2" type="email" placeholder="Correo electronico secundario"/ value="'.$item->correo2.'">
                        </div>
                        <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                        <input type="hidden" id="id" name="id" value="'.$item->id.'">
                </div>
                <div class="dialog-actions">
                    <button type="submit" class="button warning"><span class="mif-pencil"></span> Actualizar</button>
                    </form>
                    <button class="button" onclick="document.getElementById(\'editar'.$item->id.'\').style.display=\'none\'" ><span class="mif-cross"></span> Cerrar</button>
                </div>
                </div>
            </div>
            </div>

            


            <div id="delete'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 480px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>ELIMINAR: '.$item->razon_social.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/fiadores_delete" method="post">
                        <p>Esta seguro de eliminar el fiador y toda su informacion relacionada ?</p>
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