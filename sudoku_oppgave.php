<?Php
session_start();
session_destroy();
session_start();
$data='040150786159670402678043591096082310702030905031590820824310679305067248967024050';

//echo strlen($data);
$chunk=chunk_split($data,1,',');
$arr=explode(',',$chunk);
echo count($arr);
print_r($arr);
$k=0;
for($i=1; $i<=9; $i++) //Kolonne
{

	for($j=1; $j<=9; $j++) //Kolonne
		{
				
		$_SESSION['felt'.$i.'-'.$j]=$arr[$k];
		$k++;

		}
		
	
}
print_r($_SESSION);