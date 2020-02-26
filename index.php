<?php
/**
 * Created by PhpStorm.
 * User: kevinmijwaart
 * Date: 25/02/2020
 * Time: 12:28
 */

include_once 'db.php';


if (isset($_GET['idzender'])) {
$sql = "INSERT INTO zender (idzender, zendernaam, omschrijving) VALUES (".$_GET['idzender'].",".$_GET['omschrijving'].")";
$stmt = $dbh->prepare($sql);
$stmt->execute();
}

$stmt =$dbh->prepare('SELECT * from zender');
$stmt->execute();
$zenders = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>

<!--navbar-->
<ul class="nav fixed-top navbar-fixed-top">
    <a class="navbar-brand" href="#home">
        <img class="logo" src="538_logo.png" alt="">
    </a>
    <li data-aos="slide-down" class="nav-item"><a class="nav-link" href="#home">Home</a></li>
    <li data-aos="slide-down"
        data-aos-delay="100" class="nav-item"><a class="nav-link" href="#zenders">Zenders</a></li>
    <li data-aos="slide-down"
        data-aos-delay="200" class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
</ul>

<!--header-->
<header id="home">
    <div class="overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="video/538%20Intro.mp4" type="video/mp4">
    </video>
    <div class="container h-100">
        <div class="d-flex text-center h-128">
            <div class="my-auto w-100 text-white">
                <div class="row">
                    <div class="col-4">
                        <img class="dj-img" src="dj/Mattie_Marieke_2018_17A9634_RGB-e1535980356105.jpg">
                    </div>
                    <div class="col-4">
                        <img class="dj-img" src="dj/frankdane-932-263.jpg">
                    </div>
                    <div class="col-4">
                        <img class="dj-img" src="dj/giel-beelen-cr-michel-schnater-2-e1484991436948.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--zenders-->
<section id="zenders" class="zenders">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="title">Zenders</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="form-group">
                        <label for="zender">Zender</label>
                        <input type="text" class="form-control" id="zender" aria-describedby="zenderhelp">
                        <small id="zenderhelp" class="form-text text-muted">Voeg hier een zender toe.</small>
                    </div>
                    <div class="form-group">
                        <label for="omschrijving">Omschrijving</label>
                        <input type="text" class="form-control" id="omschrijving">
                    </div>
                    <button type="submit" class="btn btn-primary">Voeg toe</button>
                </form>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Playlist</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <?php foreach($dbh->query('SELECT * FROM zender') as $row) {?>
                            <?php print "
                        <td> " .$row['zendernaam'] ."<br>" .$row['omschrijving'] . "<br>" . " </td> "; ?>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <?php foreach($dbh->query('SELECT * FROM zender') as $row) {?>
                            <?php print "
                        <td> " .$row['zendernaam'] ."<br>" .$row['omschrijving'] . "<br>" . " </td> "; ?>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <?php foreach($dbh->query('SELECT * FROM zender') as $row) {?>
                            <?php print "
                        <td> " .$row['zendernaam'] ."<br>" .$row['omschrijving'] . "<br>" . " </td> "; ?>
                        <?php } ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!--contact-->
<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="title">Contact</h1>
            </div>
        </div>
    </div>
</section>


</body>
</html>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    $(function () {
        $(document).scroll(function () {
            var $nav = $(".navbar-fixed-top");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        });
    });
</script>
