<br>

<div style="background-color:white">
<div class="row">
    <?php
        foreach ($users as $item) 
        {
            $name_tmp = explode(' ', $item->name);
            $modals = '';
            $body = '
            <div class="cell-4">
                <div class="card">
                    <div class="card-header">
                        <div class="avatar">
                            <img src="http://lorempixel.com/68/68/people/">
                        </div>
                        <div class="name">'.$name_tmp[0].' '.$name_tmp[1].'</div>
                        </p>
                    </div>
                    <div class="card-content p-2">
                        </p>
                        <span>NOMBRE COMPLETO<br>'.$item->name.'</span>
                    </div>
                    <div class="card-content p-2">
                        </p>
                        <span>NOMBRE DE USUARIO | USERNAME<br>'.$item->username.'</span>
                    </div>
                    <div class="card-footer">
                        <button onclick="Metro.dialog.open(\'#permisos'.$item->id.'\')" class="flat-button mif-security mif-2x"></button>
                        <button onclick="document.getElementById(\'editar'.$item->id.'\').style.display=\'block\'" class="flat-button mif-pencil mif-2x"></button>    
                        <button onclick="document.getElementById(\'delete'.$item->id.'\').style.display=\'block\'" class="flat-button mif-bin mif-2x"></button>
                    </div>
                </div>
            </div>';

            $modals = '
            <!--Editar-->
            <div id="editar'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>ACTUALIZAR DATOS: '.$item->name.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/manager_users_update" method="post">
                        
                    <div class="form-group">
                        <label>Nombre completo:</label>
                        <input id="name" name="name" type="text" placeholder="Ingrese nombre completo" value="'.$item->name.'" / required>
                    </div>

                    <div class="form-group">
                        <label>Nombre de usuario:</label>
                        <input id="username" name="username" type="text" placeholder="Ingrese nombre de usuario" value="'.$item->username.'" / required>
                    </div>

                    <div class="form-group">
                        <label>ingrese nueva contraseña si desea actualizarla:</label>
                        <input id="password" name="password" type="password" placeholder="Ingrese contraseña" />
                    </div>

                    <div class="form-group">
                        <label>Repita la  nueva contraseña si desea actualizarla:</label>
                        <input id="password_confirm" name="password_confirm" type="password" placeholder="Repita la contraseña" />
                    </div>

                        <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER['REQUEST_URI']).'">
                        <input type="hidden" id="id" name="id" value="'.$item->id.'">
                </div>
                <div class="dialog-actions">
                    <button type="submit" class="button warning"><span class="mif-pencil"></span> Actualizar</button>
                    </form>
                    <button class="button" onclick="document.getElementById(\'editar'.$item->id.'\').style.display=\'none\'"><span class="mif-cross"></span> cancelar</button>
                </div>
                </div>
            </div>
            </div>

            <!--Eliminar-->
            <div id="delete'.$item->id.'" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                <div class="dialog-title"><strong><center>ELIMINAR: '.$item->name.'</center></strong></div>
                <div class="dialog-content">
                    <form action="'.base_url().'all/manager_users_delete" method="post">
                        <p>Esta seguro de eliminar el usuario y toda su informacion relacionada ?</p>
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

            echo $body . $modals;
        }
    ?>
</div>
</div>
<br><br>