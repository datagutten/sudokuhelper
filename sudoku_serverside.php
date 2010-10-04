<?Php
session_start();
include 'sudoku_functions.php';
if ($_GET['query']=='true')
{
	//echo $_GET['name'].'<br>'.$_GET['q'];
	$_SESSION[$_GET['name']]=$_GET['q'];
	//print_r($_SESSION);
	$sum=$_SESSION['felt1-1']+$_SESSION['felt1-2']+$_SESSION['felt1-3']+$_SESSION['felt1-4']+$_SESSION['felt1-5']+$_SESSION['felt1-6']+$_SESSION['felt1-7']+$_SESSION['felt1-8']+$_SESSION['felt1-9'];
	//$row1=array($_SESSION['felt1-1'],$_SESSION['felt1-2'],$_SESSION['felt1-3'],$_SESSION['felt1-4'],$_SESSION['felt1-5'],$_SESSION['felt1-6'],$_SESSION['felt1-7'],$_SESSION['felt1-8'],$_SESSION['felt1-9']);
	
	/*
	for ($row=1; $row<=9; $row++)
	{
		$rowdata=row($row);
		if (count($rowdata)==9)
		{
			if (check($rowdata))
					echo "Rad $row er riktig<br>";
				else
					echo "Rad $row er feil<br>";
	
		}

	}*/
	rowcol('row');
/*
for ($col=1; $col<=9; $col++)
	{
		$coldata=col($col);
		
		//if ()
		//{
			$check=check($coldata);
			if ($check && count($coldata)==9)
					echo "Kolonne $col er riktig<br>";
			elseif (!$check)
					echo "Kolonne $col er feil<br>";
	
		//}

	}
*/
rowcol('col');

//1,1 1,4 1,7
//4,1 4,4 4,7
//9,1 9,4 9,7
$grps[]=false;
$grps[]=grp(1,1);
$grps[]=grp(1,4);
$grps[]=grp(1,7);
$grps[]=grp(4,1);
$grps[]=grp(4,4);
$grps[]=grp(4,7);
$grps[]=grp(9,1);
$grps[]=grp(9,4);
$grps[]=grp(9,7);
//print_r($grps[1]);
for ($grp=1; $grp<=9; $grp++)
{
	$grpdata=$grps[$grp];
	//echo count($grpdata);
	//var_dump($grps[$grep]);
	if (count($grpdata)==9)
	{
		//echo "Gruppe $grp er fylt ut";
		if (check($grpdata))
				echo "Gruppe $grp er riktig<br>";
			else
				echo "Gruppe $grp er feil<br>";

	}

}

}

//Grupper:
//1,1 1,4 1,7
//4,1 4,4 4,7
//9,1 9,4 9,7


if ($_GET['clear']=='true')
	session_destroy();

?>