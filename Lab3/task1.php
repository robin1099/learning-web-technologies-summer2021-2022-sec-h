<!DOCTYPE html>
<html>
<body>

<?php

		$n=$ns='';
		
	if(isset($_POST['s']))
	{
		$n=trim($_POST['n']);
		$nc='/^[A-Za-z]*$/';

		if(preg_match($nc,$n) && strlen($n)>0 )
		{
			$ns="ok";
		}
		else
		{
			$ns="check name";
		}
		
	}
	
		<form action="" method="post">
			Name: <input type="text" name="n" value"<?php echo $n; ?>">
			<span><?php echo $ns; ?></span>
			
			<br><br>
			
			
			<input type="submit" name="s">
		</form>

	



?>

</body>
</html>