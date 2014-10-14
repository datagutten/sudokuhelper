<?php
//session_start();
//print_r($_COOKIE);
//session_destroy();
if (true)
{
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script type="text/javascript">
function validate(str,name,row,col)
{

	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	
	xmlhttp.onreadystatechange=function() //This is called after a http request
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			if (xmlhttp.responseText.indexOf("Feil") !=-1)
			{
				document.getElementById(name).className = "wrong";
			}
			if (xmlhttp.responseText.length == 0)
				document.getElementById(name).className = "white";
		}
	}
	//Send HTTP request
	xmlhttp.open("GET","sudoku_serverside.php?query=true&name="+name+"&q="+str+"&row="+row+"&col="+col);
	xmlhttp.send();
}
</script>
</head>
<body>
<?Php
print_r($_SESSION);
?>
<form>
<table border="0 ">
<?php
for($row=1; $row<=9; $row++) //Rad
{



	if ($row==4 || $row==7)
		echo '<tr><td colspan="12">&nbsp;</td></tr>';
			echo "<tr>\n";
	//else
	//{
		for($col=1; $col<10;) //Kolonne
		{
			
		
			if (($col==4 || $col==7)/* && ($row==1 || $row==5 || $row==9)*/)
			{
				echo "\t<td>&nbsp;&nbsp;";
//				$col++;	
			}
//			else
//			{
				echo "\t<td>";
				if ($_SESSION['felt'.$row.'-'.$col]==0)
					$_SESSION['felt'.$row.'-'.$col]=NULL;
				echo '<input type="text" name="felt'.$row.'-'.$col.'" value="'.$_SESSION['felt'.$row.'-'.$col].'" onkeyup="validate(this.value,this.name,'."'$row','$col'".')" size="1" maxlength="1" />';
			 $col++;

//			}
			echo "</td>\n";
			
		//}
	}
	echo "</tr>\n";

}
	?>
    </table>
</form>
<p>Resultat: <br /> <span id="txtHint"></span></p>


</body>
</html>
<?Php
}
?>