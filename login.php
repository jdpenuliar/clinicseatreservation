<?php include("./include/header2.php"); ?>

<body>
<section class="body_container page" id="login">
    <div id="div_login"> 
        <form name="form_login" id="form_login" method="post" enctype="multipart/form-data">
            <input type="text" 		id="username" 	name="username" placeholder="Username" />
            <input type="password" 	id="password" 	name="password" placeholder="Password" />
            <input type="submit" 	id="btn_login" 	name="btn_login" 	value="Login" />
        </form>
        <?php 
		
			if($error == ""){
				echo "<div  class='error'><a></a> </div>";
			}elseif($error == "500231"){
				echo "<div  class='error'><a>Incorrect Password!</a> </div>";
			}
			
		?>
    </div>
</section>

    
</body>
</html>















