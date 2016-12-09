<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Interactive Country D3 Data Visulization</title>
<link rel="stylesheet" href="css/foundation.css"/>
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/main.css" rel="stylesheet" type="text/css" media="screen">
<script src="js/vendor/modernizr.js"></script>
<script src="js/d3.min.js"></script><!-- Connect to D3 Library -->
<script src="https://d3js.org/d3-selection-multi.v0.4.min.js"></script>
</head>
<body>

    <header>
        <section id="mobileHeader" class="hide-for-medium-up"><!--Open Mobile Area-->
        <h2 class="hidden">All Mobile Nav</h2>
            <div class="row collapse"><!--add "sticky" after collapse to make the nav sticky for mobile-->
                <nav class="top-bar" data-topbar>
                <h2 class="hide">Mobile Navigation</h2>
                    <ul class="title-area">
                        <li class="name"><h2 class="hide"><a href="#"></a>Mobile Icon</h2></li>
             <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
                    </ul>
                    <ul id="mobileNav">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="#">LOCATIONS</a></li>
                        <li><a href="#">CONTACT</a></li>
                    </ul>
                </nav>
            </div>
        </section><!--Close Mobile Area--> 
        
        <section class="row" id="mainHeader"><!--start mainNav-->
            <h2 class="hidden">All Main Nav</h2>

            <div id="mainLogo" class="small-12 small-centered medium-12 medium-centered columns"><!-- Main Logo -->
                <a href="#"><img src="images/EducationalTravel_Logo.png" alt="Educational Travel Logo"/></a>
                <p>Where is your next destination?</p>
            </div>

        </section> 
    </header>

    <div class="row"><!-- Main Top Nav -->
    <div class="large-5 show-for-large-up columns topNav">
        <nav class="mainNav">
        <h2 class="hide">Main Navigation</h2>
            <ul>
                <li><a href="#"><span class="navText">Home</span></a></li>
                <li><a href="#"><span class="navText">About Us</span></a></li>
                <li><a href="#"><span class="navText">Locations</span></a></li>
                <li><a href="#"><span class="navText">Contact</span></a></li>
            </ul>
        </nav>
    </div>
    </div>

    <div class="row">
    <!-- Some General info about the agency -->
        <div class="small-12 small-centered medium-10 large-4 large-uncentered columns threeSections">
            <h3>Why Travel</h3>
            <p>Being part of a learning environment that fosters global competence and self-awareness  is beneficial in more ways than one. You can return home with a new understanding of your place in the world and become motivated to make a positive change.</p>
        </div>
        <div class="small-12 small-centered medium-10 large-4 large-uncentered columns threeSections">
            <h3>Where to Go</h3>
            <p>After numerous research explorations, spending your post secondary education outside of your hometown can always prove to be helpful. Traveling to North America has been known to help students achieve higher employment opportunities.</p>
        </div>
        <div class="small-12 small-centered medium-10 large-4 large-uncentered columns threeSections">
            <h3>Our Mission</h3>
            <p>Educational Travel will support and empower young men and women academically, physically, and culturally by showcasing the most recent research information on employment rates as well as how high each country's post secondary completion rate is.</p>
        </div>
    </div>

    <div class="large-10 large-centered show-for-large-up columns"><!-- Graph Control buttons -->
    <h2 class="hidden">Chart Buttons</h2>
        <div class="large-4 large-uncentered columns">
            <button id="reset">Reset</button>
        </div>
        <div class="large-4 large-uncentered columns">
            <button id="completion">Education Completion Rate</button>
        </div>
        <div class="large-4 large-uncentered columns">
            <button id="employment">Employment Rate</button>
        </div>

    	<section id="chart"><!-- where the bubble graph will be created -->
    		<h2 class="hidden">Pie Graph</h2>
    	</section>
    </div>

    <div class="row"> <!-- Information about the Graph -->
    <div class="small-12 small-centered medium-10 hide-for-large-up columns threeSections">
        <h3>The Graph</h3>
            <p>Please view on desktop sized screen to view the interactive bubble graph.</p>
    </div>
    </div>

    <div class="row"> <!-- Information about the Graph -->
    <div class="large-12 large-centered show-for-large-up columns threeSections">
        <h3>The Graph</h3>
            <p>To best represent all the information that has been gathered over the years, a bubble graph was made using the D3 Library and JavaScript while using PHP and MySQL for a database connection. If you are a new or experienced student and are looking to travel and start your new school journey look no further!</p><p><br/>The data has been split up into countries with the size of the bubbles representing the total population, for easy comparison, and as well as their educational completion and employment rates shown when hovered over. Using the buttons above, explore the different countries and find out which have the best school completion rates and the best employment rates.</p>
    </div>
    </div>

    <div class="medium-10 medium-centered columns"> <!-- Map of Earth -->
    <h2 class="hidden">Map of Earth</h2>
        <iframe id="iFrame" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d47429654.30153752!2d3.995199443390093!3d43.4840505596604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sca!4v1481281062300" allowfullscreen></iframe>
    </div>

    <footer class="row"> <!-- Copyright Info -->
    	<h2 class="hidden">Main Footer</h2>
        <div id="footer" class="small-12 large-12 columns">
        	<p>Copyright © 2016 Educational Travel</p>
        </div>
    </footer>

<script src="js/main.js"></script> 
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
$(document).foundation();
</script>
</body>
</html>