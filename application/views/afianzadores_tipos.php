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





<form action="<?php echo base_url(); ?>all/afianzadores_tipos" method="get">
    <div class="input"><input id="search" name="search" type="text" class="" value="<?php if (isset($_GET['search'])) { echo $_GET["search"];}?>"><div class="button-group"><button class="button input-clear-button" tabindex="-1" type="button"><span class="default-icon-cross"></span></button></div><div class="prepend">Ingrese texto para realizar busqueda:</div></div>
</form>
<br>

<div style="background-color:white">
<table class="table striped row-hover">
    <thead>
        <tr>
            <th><center>TIPO FIANZA</center></th>
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
            <td><center>'.$item->nombre.'</center></td>
            <td>
            <center>
                <button class="button info" onclick="Metro.dialog.open(\'#editar'.$item->id.'\')"><span class="mif-pencil"></span> Actualizar</button>
                <button class="button alert" onclick="Metro.dialog.open(\'#delete'.$item->id.'\')"><span class="mif-bin"></span> Eliminar</button>
            </center>
            </td>
            
            </tr>

            
            <div class="dialog" data-role="dialog" id="editar'.$item->id.'">
                <div class="dialog-title"><strong><center>ACTUALIZAR: '.$item->nombre.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/afianzadores_tipo_update" method="post">
                        <div class="form-group">
                            <label>Tipo de fianza</label>
                            <input id="tipo_fianza" name="tipo_fianza" type="text" placeholder="Ingrese tipo de fianza" required value="'.$item->nombre.'"/>
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


            <div class="dialog" data-role="dialog" id="delete'.$item->id.'">
                <div class="dialog-title"><strong><center>ELIMINAR: '.$item->nombre.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/afianzadores_tipo_delete" method="post">
                        <p>Esta seguro de eliminar el tipo de fianza: <strong>'.$item->nombre.'</strong> ?, Esto eliminara tambien todos los contratos asociados a dicho elemento.</p>
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