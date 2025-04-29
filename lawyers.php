<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MLMW News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="js/respond.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f8fa;
            color: #333;
        }

        h1.section-heading {
            font-size: 2.8rem;
            font-weight: 700;
            color: #2c3e50;
            text-align: center;
            margin-top: 40px;
            margin-bottom: 10px;
        }

        .section-subheading {
            font-size: 1.2rem;
            color: #7f8c8d;
            text-align: center;
            margin-bottom: 50px;
        }

        .custom-hr {
            width: 70px;
            height: 4px;
            background: #e74c3c;
            border: none;
            margin: 20px auto;
        }

        .lawyer-card {
            background: #ffffff;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            transition: all 0.3s ease-in-out;
        }

        .lawyer-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .lawyer-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .lawyer-card-body {
            padding: 20px;
            text-align: center;
        }

        .lawyer-card-body h5 {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .lawyer-card-body p {
            color: #7f8c8d;
            margin-bottom: 20px;
        }

        .lawyer-card-body a {
            text-decoration: none;
            color: white;
            background: #3498db;
            padding: 8px 20px;
            border-radius: 25px;
            transition: background 0.3s;
        }

        .lawyer-card-body a:hover {
            background: #2980b9;
        }

        footer {
            margin-top: 60px;
            padding: 20px 0;
            background: #2c3e50;
            color: #ffffff;
            text-align: center;
        }

        #row {
            margin-top: 20px;
        }
    </style>
</head>

<body id="news">
<div class="container">  

    <!-- Row1 navigation -->
    <div id="row">
        <?php include("includes/php/menu-bar.php"); ?>
    </div>
    <!-- Row1 end -->

    <!-- Lawyers jumbotron -->
    <?php include("includes/php/lawyer-jumbotron.php"); ?>
    <!-- Lawyers jumbotron end -->

    <!-- Latest list start -->
    <h1 class="section-heading">
        Best Lawyers Around the Globe
    </h1>
    <hr class="custom-hr">
    <p class="section-subheading">
        Discover the most trusted legal experts from every corner of the world.
    </p>  

    <div class="row">
        <?php include("includes/php/lawyer-short-profile.php"); ?>
    </div>
    <!-- Latest news end -->

    <!-- Subscribe for news -->
    <?php include("includes/php/news-letter.php"); ?>
    <!-- Subscribe for news end -->

    <!-- Footer start -->
    <?php include("includes/php/footer.php"); ?>
    <!-- Footer end -->

</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
