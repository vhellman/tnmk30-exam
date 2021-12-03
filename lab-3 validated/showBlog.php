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
            <h4>Blog Posts</h4>
            <?php include("blog.txt");?>
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