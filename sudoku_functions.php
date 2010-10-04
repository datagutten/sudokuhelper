<?php
function row($row) //Returerer et array med verdiene fra den valgte raden
{
for ($i=1; $i<=9; $i++)
	{
		if (isset($_SESSION["felt$row-$i"]))
		$out[]=$_SESSION["felt$row-$i"];
	}
	return $out;
}
function col($col) //Returerer et array med verdiene fra den valgte kolonnen
{
for ($i=1; $i<=11; $i++)
	{
		if (isset($_SESSION["felt$i-$col"]))
		$out[]=$_SESSION["felt$i-$col"];
	}
	return $out;
}
function grp($i,$startj) //Returerer et array med verdiene fra den valgte gruppen
{
	$maxi=$i+2;
	$maxj=$startj+2;
	//echo $maxi;
	while($i<=$maxi)
	{
		for ($j=$startj; $j<=$maxj; $j++)
		{
			if (isset($_SESSION["felt$i-$j"]))
			$out[]=$_SESSION["felt$i-$j"];
			//echo "$i-$j<br>";
		}

		$i++;
	}
	return $out;
}


function check($check) //Returnerer true hvis array inneholder 9 unike verdier
{
$pre=count($check);
if (count(array_unique($check))<$pre)
		return false;
		else
		return true;

	
}
function rowcol($rowcol)
{
	for ($i=1; $i<=9; $i++)
	{
		if ($rowcol=='row')
		{
		$idata=row($i);		
		$text='Rad';
		}
		elseif ($rowcol=='col')
		{
		$idata=col($i);
		$text='Kolonne';
		}
		//if ()
		//{
			$check=check($idata);
			if ($check && count($idata)==9)
					echo "$text $i er riktig<br>";
			elseif (!$check)
					echo "$text $i er feil<br>";
	
		//}

	}	
	
}
?>