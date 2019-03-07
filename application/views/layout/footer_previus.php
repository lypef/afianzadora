<div class="dialog" data-role="dialog" id="search_fiador">
    <div class="dialog-title">Buscar Afianzador: Razon social | Contacto</strong></div>
    <div class="dialog-content">
        <form action="<?php echo base_url(); ?>all/fiadores_gestionar" method="get">
            <input type="text" id="search" name="search" data-role="input" data-search-button="true" placeholder="Ingrese texto aqui ...">
    </div>
    <div class="dialog-actions">
        <button type="submit" class="button info js-dialog-close">Buscar</button>
        </form>
        <button class="button js-dialog-close">Cerrar</button>
    </div>
</div>

<div class="dialog" data-role="dialog" id="add_fiador">
    <div class="dialog-title"><strong><center>ALTA FIADOR</center></strong></div>
    <div class="dialog-content">
        <form action="<?php echo base_url(); ?>all/fiadores_add" method="post">
            <div class="form-group">
                <label>Razon social</label>
                <input id="razon_social" name="razon_social" type="text" placeholder="Ingrese razon social"/ required>
            </div>

            <div class="form-group">
                <label>Contactos</label>
                <input id="contactos" name="contactos" type="text" placeholder="Contacto, Puede se mas de uno"/ required>
            </div>

            <div class="form-group">
                <label>Correo #1</label>
                <input id="correo1" name="correo1" type="email" placeholder="Correo electronico principal"/ required>
            </div>

            <div class="form-group">
                <label>Telefono</label>
                <input id="telefonos" name="telefonos" type="text" placeholder="Ingrese telefono, puede ser mas de uno"/>
            </div>

            <div class="form-group">
                <label>Correo #2</label>
                <input id="correo2" name="correo2" type="email" placeholder="Correo electronico secundario"/>
            </div>
            <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER['REQUEST_URI']);?>">
    </div>
    <div class="dialog-actions">
        <button type="submit" class="button info"><span class="mif-plus"></span> Agregar</button>
    </form>
    <button class="button js-dialog-close"><span class="mif-cross"></span> Cerrar</button>
    </div>
</div>
            
            
</div>
  <footer class="container-fluid bg-grayWhite p-4">
    <div class="row">
        <div class="cell-md-6">
            <p>
              <span class="no-wrap">ONAPPAFA, A.C.</span>
                <br />
                <span class="no-wrap">Direccion temporal, 234 altos</span><br>
                <span class="no-wrap">Ciudad: Manizales. CP: 23700, Vercruz, mexico.</span><br>
                <span class="no-wrap"><a target="_blank" href="http://www.cyberchoapas.com"> © 2019 | CLTA DESARROLLO & DISTRIBUCION DE SOFTWARE</a>.</span>
            </p>
            <ul class="inline-list h-menu no-hover bg-grayWhite" style="margin-left: -.5rem">
                <li><a target="_blank" href="#">Quienes somos</a></li>
                <li><a target="_blank" href="#">Facebook</a></li>
                <li><a target="_blank" href="#">Mail</a></li>
            </ul>
        </div>
        <div class="cell-md-6">
            <!-- ads-html -->
        </div>
    </div>
</footer>
</div>