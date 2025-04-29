<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>MLMW Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
    <style>
        /* Additional custom styles for better layout */
        .case-section {
            background-color: #f7f7f7;
            padding: 40px 0;
        }
        .case-image {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .case-description {
            font-size: 1.1em;
            margin-top: 20px;
            color: #333;
        }
        .case-card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>

<body id="cases">
<div class="container">

    <!-- row1 navigation -->
    <div class="row">
        <?php include("includes/php/menu-bar.php"); ?>
    </div>
    <!-- row1 end -->

    <!-- news jumbotron -->
    <?php include("includes/php/cases-jumbotron.php"); ?>
    <!-- news jumbotron end -->

    <!-- case section start -->
    <div class="row case-section">
        <div class="col-md-6">
            <h2>What is Legal Case Management?</h2>
            <p class="case-description">
                Legal case management involves handling and organizing legal cases throughout their lifecycle. This includes tracking deadlines, organizing documents, managing client communications, and preparing legal strategies. Proper case management ensures that the case progresses smoothly, saving time and resources.
            </p>
            <p class="case-description">
                Whether you're an individual seeking justice or a lawyer managing multiple cases, effective case management tools and processes are essential to ensure success in legal proceedings.
            </p>
        </div>
        <div class="col-md-6">
            <!-- Example External Image URL -->
            <img src="https://images.unsplash.com/photo-1589913450960-0412023f1f4a" alt="Legal Case Management" class="case-image">
        </div>
    </div>
    <!-- case section end -->

    <!-- case cards section start -->
    <div class="row">
        <div class="col-md-4">
            <div class="case-card">
                <h3>Criminal Defense</h3>
                <!-- Example External Image URL -->
                <img src="https://images.unsplash.com/photo-1595435961560-d8856b053fd1" alt="Criminal Defense" class="case-image">
                <p class="case-description">
                    Defending individuals accused of criminal offenses, ensuring their rights are protected and securing the best possible outcome.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="case-card">
                <h3>Family Law</h3>
                <!-- Example External Image URL -->
                <img src="C:\Users\hp\Desktop\family law.jpg" class="case-image">
                <p class="case-description">
                    Assisting with family-related legal matters such as divorce, child custody, and property division.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="case-card">
                <h3>Corporate Law</h3>
                <!-- Example External Image URL -->
                <img src="https://images.unsplash.com/photo-1604070970211-4c747dbe424f" alt="Corporate Law" class="case-image">
                <p class="case-description">
                    Providing legal services to businesses, including contracts, mergers, acquisitions, and intellectual property.
                </p>
            </div>
        </div>
    </div>
    <!-- case cards section end -->

    <!-- footer start -->
    <?php include("includes/php/footer.php"); ?>
    <!-- footer end
