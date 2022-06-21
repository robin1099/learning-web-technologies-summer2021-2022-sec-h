<!DOCTYPE html>
<html>
    <head>
        <title>password change</title>
    </head>
    <?php 
        $CurrentPassword="";
        $NewPassword="";
        $RetypeNewPassword="";
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

            $CurrentPassword = test_input($_POST['CurrentPassword']);
            $NewPassword = test_input($_POST['NewPassword']);
            $RetypeNewPassword = test_input($_POST['RetypeNewPassword']);

            if(empty($CurrentPassword)){
                $userErrMsg .= "wrong pass ";
            }
            else{
                foreach($data as $user){
                    if($user -> CurrentPassword==$CurrentPassword){
                        $userErrMsg="Valid";
                    }
                }
            }
            if(empty($NewPassword)){
                $passwordErrMsg .= "wrong Pass";
            }
            else{
                foreach($data as $user){
                    if($user -> NewPassword==$NewPassword){
                        $passwordErrMsg="Valid";
                    }
                }
            }
            if(empty($RetypeNewPassword)){
                $passwordErrMsg .= "wrong Pass";
            }
            else{
                foreach($data as $user){
                    if($user -> RetypeNewPassword==$RetypeNewPassword){
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
            <legend>CHANGE PASSWORD</legend>
            <label for="uname">CurrentPassword</label>
            <input type="text" name="CurrentPassword" id="uname">
            <span><?php echo $userErrMsg; ?></span>
            <br><br>
            <label for="NewPassword">NewPassword</label>
            <input type="NewPassword" name="NewPassword" id="NewPassword">
            <span><?php echo $passwordErrMsg; ?></span>
            <br><br>
            <label for="RetypeNewPassword">RetypeNewPassword</label>
            <input type="RetypeNewPassword" name="RetypeNewPassword" id="RetypeNewPassword">
            <span><?php echo $passwordErrMsg; ?></span>
        </fieldset>
        <input type="submit" name="submit" value="Change">
        <a href="Login.php">Home</a>
    </form>
    </body>
</html>