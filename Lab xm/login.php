<!DOCTYPE html>
<html>
    <head>
        <title>Login page</title>
    </head>
    <?php 
        $UserId="";
        $password="";
        $data="";
        $userErrMsg="";
        $passwordErrMsg="";
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            function test_input($data) {
                $data = htmlspecialchars($data);
                return $data;
            }
            if(filesize("regidata.json")>0){
                $f = fopen("regidata.json","r");
            $fr = fread($f,filesize("regidata.json"));
            $data = json_decode($fr);
            fclose($f);
            }            

            $UserId = test_input($_POST['UserId']);
            $password = test_input($_POST['password']);

            if(empty($UserId)){
                $userErrMsg .= "UserId is empty ";
            }
            else{
                foreach($data as $user){
                    if($user -> UserId==$UserId){
                        $userErrMsg="Valid";
                    }
                }
            }
            if(empty($password)){
                $passwordErrMsg .= "Password is empty";
            }
            else{
                foreach($data as $user){
                    if($user -> password==$password){
                        $passwordErrMsg="Valid";
                    }
                }
            }

            if ($userErrMsg == "Valid" && $passwordErrMsg="Valid" && $data!="") {
                echo "Login Successful";
                
            }
        }
    ?>
    <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
        <fieldset>
            <legend>Login</legend>
            <label for="uname">UserId</label>
            <input type="text" name="UserId" id="uname">
            <span><?php echo $userErrMsg; ?></span>
            <br><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <span><?php echo $passwordErrMsg; ?></span>
        </fieldset>
        <input type="submit" name="submit" value="Login">
        <a href="Login.php">Register</a>
    </form>
    </body>
</html>