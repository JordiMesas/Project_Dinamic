<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/inscripcion.css">
    <title>Inscripcion</title>
</head>

<body>

    <header>

        <div class='container'>

            <nav>
                <h1>Torneo de tenis de mesa</h1>
                <ul>
                    <li><a href="../public/index.html">Inicio</a></li>
                    <li><a href="#">Clasificación</a></li>
                    <li><a href="#">Inscripciones</a></li>
                    <li><a href="#">Noticias</a></li>
                    <li><a href="#">Galeria</a></li>
                </ul>
                <div id="hamburguer">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <form action="">
                    <select name="idioma" id="idioma">
                        <option value="idioma">Idioma</option>
                    </select>
                    <input type="submit" value="Enviar" />
                </form>
            </nav>

        </div>

    </header>

    <div id="registrar">

        <form action="../controller/participantesController.php" method="POST">
            <fieldset>
                <legend>Rellena el formulario para inscribirte al torneo</legend>
                <ul>
                    <li>
                        <input class="validate" type="text" name="nombre" value="" id="nombre" placeholder="Nombre" autofocus>
                    </li>
                    <li>
                        <input  class="validate" type="text" name="primerapellido" value="" id="primerapellido"
                            placeholder="Primer apellido" >
                    </li>
                    <li>
                        <input  class="validate" type="text" name="segundoapellido" value="" id="segundoapellido"
                            placeholder="Segundo apellido" >
                    <li>
                        <input  class="validate" type="text" name="dni" value="" id="dni" placeholder="DNI" >
                    </li>
                    </li>
                    <li>
                        <input  class="validate" type="date" name="fecha" value="" id="fecha" placeholder="Fecha de nacimiento">
                    </li>
                    <li>
                        <input  class="validate" type="email" name="email" value="" id="email" placeholder="Email">
                    </li>
                    <select  class="validate" name="genero" id="genero">
                        <option value="">Genero</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>                        
                    </select>
                    <!-- <select name="categoria" id="categoria" required>
                        <option value=""> Categoria </option>
                        <option value="nino/as"> < 18 anys </option>
                        <option value="jubilados"> > 65 anys </option>
                        <option value="adultos"> entre 40 i 65 anys </option>
                        <option value="jovenes"> entre 18 i 40 anys </option>
                    </select> -->
                </ul>
            </fieldset>

            <div>
                <label for="privacidad">Acepto la política de privacidad</label>
                <input type="checkbox" name="privacidad" id="privacidad" value=""
                required>
            </div>

            <div class="envio">
                <input type="submit" id='sub' value="REGISTRAR">
                
            </div>            
            <p id="message"></p>
        </form>
    </div>
    <footer>
        <div class="container">
            <div class="">
                    <h4>TORNEO SANTA EULALIA</h4>                  
                    <hr>
                    <a href="https://www.facebook.com/" target="_blanc"><i class="fab fa-facebook"></i></a> 
                    <a href="https://www.pinterest.es/" target="_blanc"><i class="fab fa-pinterest"></i></a> 
                    <a href="https://twitter.com/?lang=es" target="_blanc"><i class="fab fa-twitter"></i></a>           
            </div>
            <div>
                <h4>LINKS</h4>
                <ul>
                    <li><a href="../public/index.html">Inicio</a></li>
                    <li><a href="#">Classificaciones</a></li>
                    <li><a href="#">Inscripciones</a></li>
                    <li><a href="#">Noticias</a></li>
                    <li><a href="#">Login-Admin</a></li>
                    <li><a href="#">FeedBack</a></li>
                </ul>
            </div>
            <div>
                <h4>Contacto</h4>
                <ul>
                    <li>19 de diciembre de 2020</li>
                    <li>Ajuntament de L'Hospitalet de Llobregat</li>
                    <li>random@random.com</li>
                    <li>Telf de emergencia: 112</li>
                </ul>
            </div>
        </div>
        <div id="copy">
            <small>Copyright &copy; 2008 Santa Eulalia. All rights reserved.</small>
        </div>
    </footer>    
    <script src="../src/js/validateLogin.js" type="module"></script>
    
</body>

</html>