<!DOCTYPE html>
<head>
    <title>Blog Posts</title>
</head>
<body>
    <?php 		
            //check password
            $password = $_POST['password'];

            if($password != "sjuktHemligt") {
                print("<h3>Felaktigt lösenord! Försök igen, om du orkar! Det är ett sjukt hemligt lösen! </h3>\n");
            }

            else {
                //open file
                $blogfile = fopen("blog.txt", "ab");

                //retrieve form data
                $heading = $_POST['heading'];
                $entry = $_POST['entry'];
                $author = $_POST['author'];	

                $timestamp	=	date("Y-m-d	H:i:s");

                // write blog post 
                fwrite($blogfile,"<div class='container blog-container'> \n");
                fwrite($blogfile,"  <div class='post-sidebar'> \n");
                fwrite($blogfile,"      <i class='far fa-newspaper'></i> \n");
                fwrite($blogfile,"  </div> \n");
                fwrite($blogfile,"  <div class='post-main'> \n");
                fwrite($blogfile,"      <h3>$heading</h3> \n");
                fwrite($blogfile,"      <div class='meta'> \n");
                fwrite($blogfile,"          <small class='timesstamp'>$timestamp</small> \n");
                fwrite($blogfile,"          <p class='post-author'>$author</p> \n");
                fwrite($blogfile,"      </div> \n");
                fwrite($blogfile,"      <p class='post-body'>$entry</p> \n");
                fwrite($blogfile,"      </div> \n");
                fwrite($blogfile,"</div> <hr/>");
                fwrite($blogfile," \n");

                //close file
                fclose($blogfile); //	Namnet	på	formulärfälten	bestäms	

                //redirect to blog page
                header("Location: showBlog.php");
                exit; // Location header is set, pointless to send HTML, stop the script
            }
    ?>
</body>
</html>