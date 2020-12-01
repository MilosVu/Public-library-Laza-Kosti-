<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="styles.css">
    <title>Public library, "Laza Kostić"</title>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">

    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/logo.png" width="100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Browse books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Genres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link colour=red" href="#">Sing Up</a>
                </li>
            </ul>
        </div>
    </div>

    </nav>
    <!-- Image Slider -->

    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/First Carousel.png" alt="First picture">
                <div class="carousel-caption">
                    <h1 class="display-2">Welcome</h1>
                    <h3>First online library in Serbia</h3>
                    <button type="button" class="btn btn-outline-light btn-lg">
                        Genres
                    </button>
                    <button type="button" class="btn btn-primary btn-lg">
                        Browse books
                    </button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/Second Carousel.png" alt="Second picture">
            </div>
            <div class="carousel-item">
                <img src="img/Third Carousel.png" alt="Third picture">
            </div>
        </div>
    </div>

    <!-- Jumbotron-->

    <div class="container-fluid">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                <p class="lead">
                Check the availability of our books and reserve your favourite one!
                </p>
            </div>
        </div>
    </div>

    <!-- Welcome Section-->

    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">History</h1>
            </div>
            <hr>
            <div class="col-12">
                <p>
                    Libraries, as one of the most important witnesses and instigators of spiritual culture, as guardians of tradition and books as a universal treasury of knowledge, 
                    have always followed the life of the environment in which they originate and serve. They, in themselves, reflected the culture of the population or special smaller communities, 
                    their efforts to follow the cultural and literary life, but also the development of various activities 
                    (education, social and natural sciences, etc.).
                </p>
                <p>
                    They were formed as private collections of books, newspapers and magazines, professionally de termined or not, as reading rooms, 
                    then as public institutions and finally as separate ones. When it comes to Čukarica, 
                    there is no doubt that to some extent there was a private library in the house of Matija Ban during the second half of the 19th century because a 
                    large part of his life was in many ways related to books - as an editor and journalist, as a teacher, as a writer. and as a public worker. 
                </p>
            </div>
        </div>
    </div>

    <!-- Two Column Section-->

    <hr class="my-4">
    <div class="container-fluid padding">
        <div class="row paddin">
            <div class="col-lg-6">
                <h2>Sign In</h2>
                <p>Sign in to create lists, bibliographies and<br>reviews of library materials</p>
                <br>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>

            <div class="col-lg-6">
            <h2>Sing Up</h2>
                <p>If you don't already have a Netflix account, don't worry.<br>You can sign up for a 30-day free trial.</p>
                <br>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </div>

    <!-- Fixed background-->

    <hr class="my-4">
    <figure>
        <div class="fixed-wrap">
            <div id="fixed"></div>
        </div>
    </figure>

    <!-- Footer -->

    <footer>

        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-md-6">
                    <img src="img/logo.png" width="90px">
                    <hr class="light">
                    <p>tel. 555-123</p>
                    <p>laza.kostic@gmail.com</p> 
                    <p>Turgenjevljeva 5, Čukarica</p>
                    <p>Belgrade, Serbia</p>
                </div>
                <div class="col-md-6">                   
                    <hr class="light">
                    <h5>Our hours</h5>
                    <hr class="light">
                    <p>Monday to Friday: 9am - 5pm</p>
                    <p>Saturday: 10am - 4pm</p>
                    <p>Sunday: closed</p>
                </div>
            </div>
            <div clas="col-12">
                <hr class="light-100" alignement="centre">
                <h5>&copy; Public library, "Laza Kostić" & Milos Vujic 81/17</h5>
            </div>
        </div>

    </footer>

</body>
</html>