<form  class="form-contact contact_form" method="POST"
                    id="contactForm" novalidate="novalidate">
                     
                         
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <input class="form-control" name="nombre" id= "nombre" type="text"
                                    placeholder="Nombre y apellido">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="telefono" id="telefono" type="text"
                                    placeholder="telefono">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email"
                                    placeholder="Email">
                            </div>
                            <!-- <div class="form-group">
                                <input class="form-control" name="area" id="area" type="text"
                                    placeholder="area">
                            </div> -->
                            <div class="form-group">                                  
                                  <select id="inputState"  name="area" class="form-control">
                                  <option value="">Selecciona un area</option>
                                  <option value="Soporte">Soporte</option>
                                    <option value="Garantia">Garantia</option>
                                    <option value="Reclamos">Reclamos</option>
                                    <option value="Devolucion del producto">Devolucion del producto</option>
                                 
                                  </select>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <textarea class="form-control different-control w-100" name="comentario" id="comentario"
                                    cols="30" rows="5" placeholder="Escriba aqui.."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                         <button type="submit" name="Enviar" class="button button--active button-contactForm">Enviar</button>                 

                    </div>
                </form>
                <?php
                include("class/classContact.php");            
                ?>