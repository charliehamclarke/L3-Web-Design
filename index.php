<!DOCTYPE HTML>
<?php
    // function to allow easy insertion of gallery code
    include("functions.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashion Showcase">
    <meta name="keywords" content="Fashion, Streetwear, Athleisure, Grunge, Gallery">
    <meta name="author" content="Your Name">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Fashion Showcase</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/gallery.css" />
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/navigation.css" />

    <!-- JQuery -->
    <script src="js/j_query_min.js"></script>
</head>

<body>
    <div class="wrapper">


        <!-- Title -->
        <div class="top-title">
            <img src="images/fashion-showcase-logo.png" alt="Fashion Showcase" class="graffiti-title">
        </div>




        <!-- Navigation -->

        <div class="menu-header">
            <i class="fa fa-bars"></i>
            <div class="menu-content">
            <ul>
                <li><a class="nav" href="index.php?page=home">Home</a></li>
                <li>
                <a class="dropbtn" href="#">Gallery <i class="fa-solid fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a class="nav" href="index.php?page=streetwear">Streetwear</a></li>
                    <li><a class="nav" href="index.php?page=athleisure">Athleisure</a></li>
                    <li><a class="nav" href="index.php?page=grunge">Grunge</a></li>
                </ul>
                </li>
                <li><a class="nav" href="index.php?page=about">About</a></li>
                <li><a class="nav" href="index.php?page=links">Links</a></li>
                <li><a class="nav" href="index.php?page=contact">Contact</a></li>
            </ul>
            </div>
        </div>
        </div>


        <!-- Dynamic Content -->
        <?php
        if (!isset($_REQUEST['page']) || $_REQUEST['page'] == "home") {
            include("home.php");
        } else {
            // Sanitize page variable (letters and numbers only)
            $page = preg_replace('/[^0-9a-zA-Z]/', '', $_REQUEST['page']);
            $file = $page . ".php";

            if (file_exists($file)) {
                include($file);
            } else {
                echo "<div class='box main'><h2>Page not found.</h2></div>";
            }
        }
        ?>

        <!-- Footer -->
        <div class="box footer">
            Fashion Showcase © 2025
        </div>
    </div> <!-- /wrapper -->

    <!-- Scripts -->
    <script>
        $('.dropbtn').click(function() {
            $('.dropbtn').toggleClass('display');
        });

        $('.fa-bars').click(function() {
            $('.menu-content').toggle();
        });
    </script>

    <script src="js/simple-lightbox.min.js"></script>
    <script>
        (function() {
            var $gallery = new SimpleLightbox('.gallery a', {});
        })();
    </script>
</body>
</html>
