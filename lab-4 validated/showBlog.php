<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Merriweather:wght@400;700&family=Mulish:wght@300;700;800;900&family=Permanent+Marker&family=Roboto:wght@300;700&display=swap" rel="stylesheet">    
    <script src="https://kit.fontawesome.com/099ae6463c.js" crossorigin="anonymous"></script>
    <title>This is me, not really plain nor simple</title>
</head>
<body>

    <header>
        <div class="logo">
            <a href="./index.html">
                <img src="./img/logo_light.png" alt="Full stack developer logo" id="logo-img">
            </a>
        </div> 
        <nav id='nav'>
            <ul class="nav__list">
                <li class="nav__item"><a href="./index.html" class="nav__link">Hem</a></li>
                <li class="nav__item"><a href="./index.html#about-me-section" class="nav__link">Om mig</a></li>
                <li class="nav__item"><a href="./intresse.html" class="nav__link">Intresse</a></li>
                <li class="nav__item"><a href="./showBlog.php" class="nav__link">Blog</a></li>
                <li class="nav__item settings">
                    
                    <i class="far fa-moon" id='toggle-icon'></i>
                    
                    <div id="clock" class="clock">
                        <div class="time">
                            <h3 id="hours">00:</h3>
                        
                        </div>
                        <div class="time">
                            <h3 id="minutes">00</h3>
                        </div>
                    </div>
                    
                </li>
            </ul>
            
            <button id="nav-toggle" aria-label="toggle navigation">
                <span class="hamburger"></span>
            </button>
        </nav>
    </header>
    <main>
        <section id="blog-section">
            <h4 class='container'>Blog Posts</h4>
            <div class="container blog-settings">
                <a href="showBlog.php?order=desc" class='nav__link sort-blog-element' >Visa nyaste posterna först</a>
                <a href="showBlog.php?order=asc" class='nav__link sort-blog-element'>Visa äldsta posterna först</a>
                <a href="showBlog.php?order=desc&limit=10" class='nav__link sort-blog-element'>Visa de 10 senaste posterna</a>
            </div>
            <?php 
                DEFINE ('DB_USER', 'blog');
                DEFINE ('DB_PASSWORD', '');
                DEFINE ('DB_HOST', 'localhost');
                DEFINE ('DB_NAME', 'blogdb');
                
                // default values
                $queryOrderBy = 'desc';
                $queryLimitBy = 25;

                //connect to DB
                $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                OR die('Could not connect to MYSQL: ' .
                mysqli_connect_error());

                //overwrite default query arguments if they are provided
                if( isset($_GET['order']) ) {
                    $queryOrderBy = $_GET['order'];
                }
                if( isset($_GET['limit']) ) {
                    $queryLimitBy = $_GET['limit'];
                }
                
                //query
                $result = mysqli_query($connection, "SELECT * FROM blogpost ORDER BY entry_date $queryOrderBy LIMIT $queryLimitBy");

                //print rows
                while($row = mysqli_fetch_array($result)){
                    // get entries and meta
                    $heading = $row['entry_heading'];
                    $author	= $row['entry_author'];																																	
                    $date =	$row['entry_date'];	
                    $text =	$row['entry_text'];
                    print("<div class='container blog-container'> \n");
                    print("  <div class='post-sidebar'> \n");
                    print("      <i class='far fa-newspaper'></i> \n");
                    print("  </div> \n");

                    print("  <div class='post-main'> \n");
                    print("      <h3>$heading</h3> \n");
                    print("      <div class='meta'> \n");
                    print("          <small class='timesstamp'>$date</small> \n");
                    print("          <p class='post-author'>$author</p> \n");
                    print("      </div> \n");
                    print("      <p class='post-body'>$text</p> \n");
                    print("      </div> \n");
                    print("</div> <hr/>");
                    print(" \n");																																		
                    																																																
                }	//	end	while					
            
            ?>
            <a href='./form.html' id='add-blog-btn' class='btn-cta'>Skriv nytt blogginlägg</a>
        </section>
    </main>

        <footer>
            <div class="container">
                <a href="https://github.com/vhellman">
                    <i class="fab fa-github"></i> 
                </a>
                <a href="https://twitter.com/vhellman10">
                    <i class="fab fa-twitter"></i> 
                </a>
                <a href="https://www.instagram.com/vhellman10/">
                    <i class="fab fa-instagram"></i> 
                </a>
            </div>    
    </footer>
<script  src='script.js'></script>
</body>
</html>