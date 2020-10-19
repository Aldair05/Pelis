<div class="container">
        <div>
            <div class="row content-inicio">
                <div class="col-md-6 content-col-1">
                    <h4 class="title">Peliculas y Series</h4>
                    <p class="message"> Lorem ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones</p>
                    <form method="post" action="" class="content-formulario text-center">
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-8 ">
                                    <div class="input-group ">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text estilo-caja"><i class="fa fa-envelope-o" aria-hidden="true"></i></div> 
                                      </div>
                                      <input type="text" class="form-control estilo-caja" id="user" name="user" placeholder="Usuario" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-8 ">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text estilo-caja"><i class="fa fa-key" aria-hidden="true"></i></div>
                                      </div>
                                      <input type="text" class="form-control estilo-caja" id="pass" name="pass" placeholder="Contraseña" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row boton-ingresar justify-content-center">
                                <div class="col-md-8">
                                    <input type="submit" name="" class="btn btn-info btn-block" value="ingresar">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-md-8 info-sin-cuenta">
                                    <p>¿No tienes una cuenta...?<span> Regístrate aquí</span></p>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if(isset($_GET['error'])) { ?> 
                          <div class="container">
                              <p class="error"><?php print $_GET['error']; ?></p>
                          </div>
                    <?php } ?>
                </div>
                <div class="col md-6 content-col-2">
                    <h3 class="title">Bienvenido</h3>
                    <p class="message">Lorem ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones</p>
                    <img src="./public/img/img-bienvenida.svg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div> <!--.container-->
  
  
  