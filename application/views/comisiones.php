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
            <th>ENDOSO</th>
            <th><center>ASEGURADO</center></th>
            <th><center>PRIMA NETA</center></th>
            <th><center>AGENTE</center></th>
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
            <td>'.$item->contrato.'</td>
            <td>'.$item->endoso.'</td>
            <td><center>'.$item->razon_social.'</center></td>
            
            <td>
                <div class="row">
                    <div class="cell">
                        <div><strong>$</strong></div>
                    </div>

                    <div class="cell" align="right">
                        <div>'.number_format($item->prima_neta, 2, '.', ',').'</div>
                    </div>
                </div>
            </td>
            
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

            <td>
                <div class="split-button">
                    <button class="button" onclick="document.getElementById(\'view'.$item->id.'\').style.display=\'block\'"><span class="mif-eye"></span> Detalles</button>
                    <button class="split dropdown-toggle"></button>
                    <ul class="d-menu" data-role="dropdown"> 
                        <li><a href="#" onclick="document.getElementById(\'editar'.$item->id.'\').style.display=\'block\'"><span class="mif-pencil"></span> Editar</a></li>
                        <li><a href="#" onclick="document.getElementById(\'editar'.$item->id.'\').style.display=\'block\'"><span class="mif-bin"></span> Eliminar</a></li>
                    </ul>
                </div>
            </td>
            </tr>
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