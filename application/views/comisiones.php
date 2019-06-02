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

<form action="<?php echo base_url(); ?>all/afianzadoras" method="get">
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
            <th><center>NOMBRE</center></th>
            <th>RAZON SOCIAL</th>
            <th><center>TELEFONO</center></th>
            <th>EMAIL</th>
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
            <td><center>'.$item->nombre.'</center></td>
            <td>'.$item->razon_social.'</td>
            <td><center>'.$item->telefono.'</center></td>
            <td><a target="_BLANK" href="mailto:'.$item->email.'" target="_top">'.$item->email.'</a></td>
            <td>
            
            <div class="split-button">
                <button class="button" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'block\'"><span class="mif-eye"></span> Detalles</button>
                <button class="split dropdown-toggle"></button>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="#" onclick="document.getElementById(\'editar'.$item->id.'\').style.display=\'block\'"><span class="mif-pencil"></span> Editar</a></li>
                    <li><a href="#" onclick="document.getElementById(\'delete'.$item->id.'\').style.display=\'block\'"><span class="mif-cross"></span> Eliminar</a></li>
                    <li class="divider"></li>
                    <li><a href="'.base_url().'all/fianzas_gestionar?afianzadora='.$item->id.'"><span class="mif-folder-open"></span> Ver contratos activos</a></li>
                    <li><a href="'.base_url().'all/fianzas_gestionar_cancelaciones?afianzadora='.$item->id.'"><span class="mif-folder"></span> Ver contratos cancelados</a></li>
                </ul>
            </div>
            </td>
            
            </tr>

            <div id="view'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 480px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong>'.$item->nombre.'</strong></div>
                <div class="dialog-content">
                    <strong>RAZON SOCIAL:</strong><br>'.$item->razon_social.'
                    <br><br><strong>DIRECCION FISCAL:</strong><br>'.$item->direccion.'
                    <br><br><strong>TELEFONO:</strong><br>'.$item->telefono.'
                    <center><br><strong>EMAIL:</strong><br><a target="_BLANK" href="mailto:'.$item->email.'" target="_top">'.$item->email.'</a></center>
                </div>
                <div class="dialog-actions">
                    <button class="button info" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'none\'">Ok</button>
                </div>
                </div>
            </div>
            </div>


            
            <div id="editar'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 480px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>ACTUALIZAR: '.$item->nombre.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/afianzadoras_update" method="post">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="nombre" name="nombre" type="text" placeholder="Ingrese nombre" required value="'.$item->nombre.'" />
                        </div>

                        <div class="form-group">
                            <label>Razon social</label>
                            <input id="razon_social" name="razon_social" type="text" placeholder="Razon social" required value="'.$item->razon_social.'"/>
                        </div>

                        <div class="form-group">
                            <label>Direccion fiscal</label>
                            <input id="direccion" name="direccion" type="text" placeholder="Direccion fiscal" value="'.$item->direccion.'"/>
                        </div>

                        <div class="form-group">
                            <label>Telefono</label>
                            <input id="telefono" name="telefono" type="text" placeholder="Ingrese numero de telefono" value="'.$item->telefono.'" />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" name="email" type="email" placeholder="Correo electronico" value="'.$item->email.' " />
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

            <div id="delete'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content" style="width: 480px; !important">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>ELIMINAR: '.$item->nombre.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/afianzadoras_delete" method="post">
                        <p>Esta seguro de eliminar la afianzadora: <strong>'.$item->nombre.'</strong> y todas la informacion relacionada ?</p>
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