<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
    </head>

    <?php 
        $username="";
        $password="";
        $u_msg="";
        $p_msg="";
        $data="";
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}
            if(filesize("data.json")>0){
                $f = fopen("data.json","r");
            $fr = fread($f,filesize("data.json"));
            $data = json_decode($fr);
            fclose($f);
            }            

            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);

            if(empty($username)){
                $u_msg .= "Username is empty ";
            }
            else{
                foreach($data as $user){
                    if($user -> username==$username){
                        $u_msg="OK";
                    }
                }
            }
            if(empty($password)){
                $p_msg .= "Password is empty";
            }
            else{
                foreach($data as $user){
                    if($user -> password==$password){
                        $p_msg="OK";
                    }
                }
            }
            if (isset($_POST['remember_me'])){
                setcookie('remember_me','y',time()+(60*60));
            }
            else{
                setcookie('remember_me','n',time());
            }

            if ($u_msg == "OK" && $p_msg=="OK" && $data!="") {
				echo "Login Successful";
                
			}
        }
    ?>
    <body>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
        <fieldset>
            <tr>
            <legend>REGISTRATION</legend>
            <label for="id">Id</label><br>
            <input type="number" name="id" id="id">
            <span><?php echo $u_msg; ?></span>
            <br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password">
            <span><?php echo $p_msg; ?></span>
            <br><br>
            <label for="conpass">Confirm Password</label><br>
            <input type="password" name="conpass" id="conpass">
            <span><?php echo $p_msg; ?></span>
            <br><br>
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name">
            <span><?php echo $p_msg; ?></span>
            <br><br>
            <legend>User Type</legend><br>
            <input type="radio" id="user" name="User Type" value="User">
            <label for="html">User</label>
            <input type="radio" id="admin" name="User Type" value="Admin">
            <label for="css">Admin</label><br>
            <br><br>
            <input type="submit" name="submit" value="Sign Up">
            <a href="Login.php">Sign in</a>
        </fieldset>
    </form>
    </body>
</html>