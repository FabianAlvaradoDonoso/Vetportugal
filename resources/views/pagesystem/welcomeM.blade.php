<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Llantas deportivas</title>
    <meta name="description" content="Venta de llantas deportivas, audio y accesorios para vehículos en Santiago.">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide&amp;subset=latin-ext">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,400,700,900">
    <link rel="stylesheet" href="{{asset('assets/css/best-carousel-slide.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/MUSA_carousel-product-cart-slider-1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/MUSA_carousel-product-cart-slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/smoothproducts.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Social-Icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Team-with-rotating-cards.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/untitled-1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/untitled-2.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/untitled.css')}}">
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "http://www.llantasdeportcar.cl",
  "name": "Llantas Deport Car.",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+569-88289739",
    "contactType": "Customer service"
  }
}
</script>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark clean-navbar">
        <div class="container"><a class="navbar-brand logo"><img src="./assets/img/13806f407fb36eaebdf0a5db250139de.png" alt="logo" height="20px"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item item" role="presentation"><a class="nav-link active" href="index.php">HOME</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="catalogo.php">Catalogo</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="about-us.php">Nosotros</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="contact-us.html">contactenos</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="icon-bar">
        <?php
            $conexion1 = mysqli_connect("localhost", 'root', '', 'autoadmin');
            $conexion2 = new PDO("mysql:host=localhost; dbname=autoadmin", "root", "");
            try{
                $base = $conexion2;
                //$base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");

                $sqlLimit="SELECT
                                *
                            FROM
                                texto
                            WHERE
                                Pag_texto = 'Redes' AND (Heading = 'Facebook' OR Heading = 'Whatsapp' OR Heading = 'Phone')";

                $resultado = $base->prepare($sqlLimit);
                $resultado->execute(array());



                while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                    if($fila["Heading"] == "Facebook"){
                        echo "<a href='".$fila["Texto"]."' class='facebook' target='_blank'><i class='fa fa-facebook'></i></a>";
                    }elseif ($fila["Heading"] == "Whatsapp") {
                        echo "<a class='whatsapp' href='https://api.whatsapp.com/send?phone=".$fila["Texto"]."&amp;amp;text=Probando%20el%20botón%20Whatsapp' target='_blank'><i class='fab fa-whatsapp'></i></a>";
                    }elseif ($fila["Heading"] == "Phone") {
                        echo "<a href='".$fila["Texto"]."' class='phone'><i class='fas fa-phone'></i></a>";

                    }
                }
                $resultado->closeCursor();
            }
            catch(Exception $e){
            }

        ?>

    </div>
    <main class="page landing-page">

        <section id="carousel">
            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                <div class="carousel-inner" role="listbox">
                    <?php
                        $conexion1 = mysqli_connect("localhost", 'root', '', 'autoadmin');
                        $conexion2 = new PDO("mysql:host=localhost; dbname=autoadmin", "root", "");
                        try{
                            $base = $conexion2;
                            //$base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $base->exec("SET CHARACTER SET utf8");

                            $sqlLimit="SELECT
                                            *
                                        FROM
                                            texto
                                        WHERE
                                            Pag_texto = 'Carousel' AND Activo = 1";
                                        // LIMIT 3";

                            $resultado = $base->prepare($sqlLimit);
                            $resultado->execute(array());


                            $count = 0;
                            while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                if($count == 0){
                                    echo "<div class='carousel-item active'>
                                            <div class='jumbotron pulse animated hero-nature carousel-hero'
                                            style='font-family: Audiowide, cursive;background-image: url(".$fila["Imagen"].");background-size: cover;background-repeat: no-repeat;'>
                                                <div class='infotitulo'>
                                                    <h1 class='hero-title'>".$fila["Heading"]."</h1>
                                                    <p class='hero-subtitle'>".$fila["Texto"]."</p>
                                                </div>
                                            </div>
                                        </div>";
                                }else{
                                    echo "<div class='carousel-item'>
                                            <div class='jumbotron pulse animated hero-photography carousel-hero'
                                            style='background-image: url(".$fila["Imagen"].");color: rgba(237,215,21,0.49);font-family: Audiowide, cursive;'>
                                                <div class='infotitulo'>
                                                    <h1 class='hero-title'>".$fila["Heading"]."</h1>
                                                    <p class='hero-subtitle'>".$fila["Texto"]."</p>
                                                </div>
                                            </div>
                                        </div>";
                                }
                                $count = 1;
                            }
                            $resultado->closeCursor();
                        }
                        catch(Exception $e){
                        }

                    ?>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <?php
                        $conexion1 = mysqli_connect("localhost", 'root', '', 'autoadmin');
                            $conexion2 = new PDO("mysql:host=localhost; dbname=autoadmin", "root", "");
                        try{
                            $base = $conexion2;
                            //$base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $base->exec("SET CHARACTER SET utf8");

                            $sqlLimit="SELECT
                                            *
                                        FROM
                                            texto
                                        WHERE
                                            Pag_texto = 'Carousel' AND Activo = 1";
                                        // LIMIT 3";

                            $resultado = $base->prepare($sqlLimit);
                            $resultado->execute(array());


                            $count = 0;
                            while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                if($count == 0){
                                    echo "<li data-target='#carousel-1' data-slide-to='".$count."' class='active'></li>";
                                }else{
                                    echo "<li data-target='#carousel-1' data-slide-to='".$count."'></li>";
                                }
                                $count += 1;
                            }
                            $resultado->closeCursor();
                        }
                        catch(Exception $e){
                        }

                    ?>
                    </ol>
            </div>
            <!-- <button class="btn btn-primary btn-sm shadow-sm d-xl-flex justify-content-xl-center align-items-xl-center visible" type="button" id="btn_whatsapp" href="https://api.whatsapp.com/send?phone=56992323056&amp;amp;text=quepahooo" style="height: 48px;width: 48px;padding: 0px;margin-right: 0px;position: fixed;"><a href="https://api.whatsapp.com/send?phone=56996198670&amp;text=quepahooo" style="color: rgb(255,255,255);font-size: 30px;"><i class="fa fa-whatsapp"></i></a></button> -->
        </section>

        <section
            class="clean-block clean-info dark" style="background-color: rgb(255,222,51);">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info" style="color: rgb(255,255,255);font-family: Audiowide, cursive;font-size: 42px; margin-bottom:60px;">Productos Destacados</h2>
                </div>
                <h4 class="text-info" style="color: rgb(255,255,255);font-family: Audiowide, cursive;font-size: 52px; margin-bottom:30px; text-align: center">Audio</h4>
                <div class="content contentProductos">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="products">
                                <div class="row no-gutters">
                                    <?php
                                        $conexion1 = mysqli_connect("localhost", 'root', '', 'autoadmin');
                            $conexion2 = new PDO("mysql:host=localhost; dbname=autoadmin", "root", "");
                                        try{
                                            $base = $conexion2;
                                            //$base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            $base->exec("SET CHARACTER SET utf8");

                                            $sqlLimit="SELECT
                                                            p.id,
                                                            p.name,
                                                            p.price,
                                                            p.description,
                                                            p.image,
                                                            c.name AS Categoria,
                                                            p.outstanding
                                                        FROM
                                                            product p
                                                        INNER JOIN category c ON
                                                            (p.category_id = c.id)
                                                        WHERE
                                                            c.id = 3 AND p.outstanding = 1";

                                            $resultado = $base->prepare($sqlLimit);
                                            $resultado->execute(array());



                                            while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                setlocale(LC_MONETARY, 'en_US');

                                                echo "<div class='col-12 col-md-6 col-lg-4'>
                                                        <div class='clean-product-item'>
                                                            <div class='product-name' style=''>" . $fila["name"] . "</div>
                                                            <div class='image'><a><img class='img-fluid d-block mx-auto' style='width: 200px; height: 130px' src='/" . $fila["image"] . "'></a></div>
                                                            <div class='product-name'><strong>$" . number_format($fila["price"], 0, ',', '.') . "</strong></div>
                                                            <div class='vermas'>
                                                                <a href='catalogo.php?cat=audio'>Ver Más</a>
                                                            </div>
                                                        </div>
                                                    </div>";
                                            }
                                            $resultado->closeCursor();
                                        }
                                        catch(Exception $e){
                                        }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <h4 class="text-info" style="color: rgb(255,255,255);font-family: Audiowide, cursive;font-size: 52px; margin-bottom:30px; text-align: center">Llantas</h4>
                <div class="content contentProductos">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="products">
                                <div class="row no-gutters">
                                    <?php
                                        $conexion1 = mysqli_connect("localhost", 'root', '', 'autoadmin');
                            $conexion2 = new PDO("mysql:host=localhost; dbname=autoadmin", "root", "");
                                        try{
                                            $base = $conexion2;
                                            //$base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            $base->exec("SET CHARACTER SET utf8");

                                            $sqlLimit="SELECT
                                                            p.Id_Producto,
                                                            p.Nombre,
                                                            p.Precio,
                                                            p.Descripcion,
                                                            p.Imagen,
                                                            c.Nombre AS Categoria,
                                                            p.Destacado
                                                        FROM
                                                            productos p
                                                        INNER JOIN categoria c ON
                                                            (p.Categoria = c.ID)
                                                        WHERE
                                                            c.ID = 1 AND p.Destacado = 1";

                                            $resultado = $base->prepare($sqlLimit);
                                            $resultado->execute(array());



                                            while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                setlocale(LC_MONETARY, 'en_US');
                                                $nombre = $fila["Nombre"];
                                                $precio = $fila["Precio"];
                                                $id = $fila["Id_Producto"];
                                                $descripcion = $fila["Descripcion"];
                                                $categoria = $fila["Categoria"];
                                                $imagen = $fila["Imagen"];


                                                echo "<div class='col-12 col-md-6 col-lg-4'>
                                                        <div class='clean-product-item'>
                                                            <div class='product-name' style=''>" . $fila["Nombre"] . "</div>
                                                            <div class='image'><a><img class='img-fluid d-block mx-auto' style='width: 200px; height: 130px' src='/" . $fila["Imagen"] . "'></a></div>
                                                            <div class='product-name'><strong>$" . number_format($fila["Precio"], 0, ',', '.') . "</strong></div>
                                                            <div class='vermas'>
                                                                <a href='catalogo.php?cat=llantas'>Ver Más</a>
                                                            </div>
                                                        </div>
                                                    </div>";
                                            }
                                            $resultado->closeCursor();
                                        }
                                        catch(Exception $e){
                                        }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <h4 class="text-info" style="color: rgb(255,255,255);font-family: Audiowide, cursive;font-size: 52px; margin-bottom:30px; text-align: center">Neumáticos</h4>
                <div class="content contentProductos">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="products">
                                <div class="row no-gutters">
                                    <?php
                                        $conexion1 = mysqli_connect("localhost", 'root', '', 'autoadmin');
                            $conexion2 = new PDO("mysql:host=localhost; dbname=autoadmin", "root", "");
                                        try{
                                            $base = $conexion2;
                                            //$base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            $base->exec("SET CHARACTER SET utf8");

                                            $sqlLimit="SELECT
                                                            p.Id_Producto,
                                                            p.Nombre,
                                                            p.Precio,
                                                            p.Descripcion,
                                                            p.Imagen,
                                                            c.Nombre AS Categoria,
                                                            p.Destacado
                                                        FROM
                                                            productos p
                                                        INNER JOIN categoria c ON
                                                            (p.Categoria = c.ID)
                                                        WHERE
                                                            c.ID = 2 AND p.Destacado = 1";

                                            $resultado = $base->prepare($sqlLimit);
                                            $resultado->execute(array());



                                            while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                setlocale(LC_MONETARY, 'en_US');
                                                $nombre = $fila["Nombre"];
                                                $precio = $fila["Precio"];
                                                $id = $fila["Id_Producto"];
                                                $descripcion = $fila["Descripcion"];
                                                $categoria = $fila["Categoria"];
                                                $imagen = $fila["Imagen"];


                                                echo "<div class='col-12 col-md-6 col-lg-4'>
                                                        <div class='clean-product-item'>
                                                            <div class='product-name' style=''>" . $fila["Nombre"] . "</div>
                                                            <div class='image'><a><img class='img-fluid d-block mx-auto' style='width: 200px; height: 130px' src='/" . $fila["Imagen"] . "'></a></div>
                                                            <div class='product-name'><strong>$" . number_format($fila["Precio"], 0, ',', '.') . "</strong></div>
                                                            <div class='vermas'>
                                                                <a href='catalogo.php?cat=neumaticos'>Ver Más</a>
                                                            </div>
                                                        </div>
                                                    </div>";
                                            }
                                            $resultado->closeCursor();
                                        }
                                        catch(Exception $e){
                                        }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Teléfonos</h5>
                    <ul>
                        <?php
                            $conexion1 = mysqli_connect("localhost", 'root', '', 'autoadmin');
                            $conexion2 = new PDO("mysql:host=localhost; dbname=autoadmin", "root", "");
                            try{
                                $base = $conexion2;
                                //$base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $base->exec("SET CHARACTER SET utf8");

                                $sqlLimit="SELECT
                                                *
                                            FROM
                                                texto
                                            WHERE
                                                Pag_texto = 'Telefono'";

                                $resultado = $base->prepare($sqlLimit);
                                $resultado->execute(array());



                                while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                    echo "<li><a class='' href='https://api.whatsapp.com/send?phone=".$fila["Texto"]."&amp;amp;text=Probando%20el%20botón%20Whatsapp' target='_blank'>".$fila["Heading"]."</a></li>";
                                }
                                $resultado->closeCursor();
                            }
                            catch(Exception $e){
                            }

                        ?>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Dirección</h5>
                    <ul>
                        <?php
                            $conexion1 = mysqli_connect("localhost", 'root', '', 'autoadmin');
            $conexion2 = new PDO("mysql:host=localhost; dbname=autoadmin", "root", "");
                            try{
                                $base = $conexion2;
                                //$base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $base->exec("SET CHARACTER SET utf8");

                                $sqlLimit="SELECT
                                                *
                                            FROM
                                                texto
                                            WHERE
                                                Pag_texto = 'Maps'";

                                $resultado = $base->prepare($sqlLimit);
                                $resultado->execute(array());



                                while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                    $local = str_replace(", local H", "", $fila["Imagen"]);
                                    $direccion = str_replace(" ", "+", $fila["Heading"]) . "+" . $local . ",+" . $fila["Texto"] . ",+Región+Metropolitana";
                                    $direccion2 = str_replace(" ", "+", $fila["Heading"]) . "+" . $fila["Imagen"] . ",+" . $fila["Texto"] . ",+Región+Metropolitana";
                                    echo "<li><a class='' href='https://www.google.com/maps/place/".$direccion."' target='_blank'>".str_replace("+", " ", $direccion2)."</a></li>";
                                }
                                $resultado->closeCursor();
                            }
                            catch(Exception $e){
                            }

                        ?>
                    </ul>
                </div>
                <?php
                    $conexion1 = mysqli_connect("localhost", 'root', '', 'autoadmin');
            $conexion2 = new PDO("mysql:host=localhost; dbname=autoadmin", "root", "");
                    try{
                        $base = $conexion2;
                        //$base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $base->exec("SET CHARACTER SET utf8");

                        $sqlLimit="SELECT
                                        *
                                    FROM
                                        texto
                                    WHERE
                                        Pag_texto = 'Maps'";

                        $resultado = $base->prepare($sqlLimit);
                        $resultado->execute(array());



                        while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                            $local = str_replace(", local H", "", $fila["Imagen"]);
                            $direccion = str_replace(" ", "+", $fila["Heading"]) . "%20" . $local . "%20" . $fila["Texto"];

                            // $direccion = str_replace(" ", "+", $fila["Heading"]) . "" . $fila["Imagen"] . "" . $fila["Texto"];
                            echo "<div class='col-sm-3'>
                                        <div class='mapaGoogle'>
                                            <iframe src='https://maps.google.com/maps?width=100%&height=600&hl=es&q=".$direccion."+(aa)&ie=UTF8&t=&z=14&iwloc=B&output=embed' width='250' height='200' frameborder='0' style='border: solid rgb(255,222,51) 5px;' allowfullscreen></iframe>
                                        </div>
                                    </div>";
                        }
                        $resultado->closeCursor();
                    }
                    catch(Exception $e){
                    }

                ?>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2019 Diseñada por&nbsp;<a href="https://redpandachile.com" target="_blank"><img src="assets/img/rp_icon.png" alt="logorp"></a></p>
        </div>
    </footer>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="{{asset('assets/js/smoothproducts.min.js')}}"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>
</body>

</html>
