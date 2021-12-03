<!DOCTYPE html>
<head>
    <title>Blog Posts</title>
</head>
<body>
    <?php 		
                DEFINE ('DB_USER', 'blog_edit'); //blog_edit
                DEFINE ('DB_PASSWORD', 'bloggotyp'); //bloggotyp
                DEFINE ('DB_HOST', 'localhost');
                DEFINE ('DB_NAME', 'blogdb');

                //check password
                $password = $_POST['password'];
                print("Trying to write blogpost  <br> <br>");

                /* if(false){//$password != "sjuktHemligt") {
                    print("<h3>Felaktigt lösenord! Försök igen, om du orkar! Det är ett sjukt hemligt lösen! </h3>\n");
                }

                else { */
                    //connect to DB
                    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                                OR die('Could not connect to MYSQL: ' .
                                mysqli_connect_error());

                    $author	=	mysqli_real_escape_string($connection,	$_POST["author"]);	
                    $heading	=	mysqli_real_escape_string($connection,	$_POST["heading"]);
                    $text	=	mysqli_real_escape_string($connection,	$_POST["entry"]);

                    $query = "INSERT INTO blogpost (`entry_date`, `entry_author`, `entry_heading`, `entry_text` ) VALUES (NULL, '$author', '$heading', '$text')";			
                    print("Trying to insert into dB <br> <br>");
                    
                    mysqli_query($connection, $query);
                    
                    if(!$query) {
                        die('Invalid query: ' . mysqli_error());
                    } 
                    else {
                        //redirect to blog page
                        header("Location: showBlog.php");
                        exit; // Location header is set, pointless to send HTML, stop the script
                    }
                //}
                
    ?>
</body>
</html>