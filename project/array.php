<?php

$dir = 'hello';
$files = scandir($dir);

//pre_r($files);

function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';

}

$files = array_diff($files, array('..', '.'));

//pre_r($files);

$files = array_values($files);

//pre_r($files);

$movies = array();

for ($i = 0; $i <count($files); $i++){

	preg_match("!(.*?)\((.*)\)!", $files[$i],$results);
	$movie_name = str_replace('_',' ',$results[1]);
	$movie_name = ucwords($movie_name);

	$movies[$movie_name]['image'] = $files[$i];
	$movies[$movie_name]['year'] = $results[2];


}

echo "<table id = 'hello' cellpadding = 50>";
echo "<tr class = 'odd'>";

foreach ($movies as $movie_name => $info){
	$content = "<td><span class = 'name'> $movie_name</span><br />"
	. "<img src = 'hello/$info[image]'><br />"
	. "<span class = 'year'>( $info[year] ) </span></td>";
	echo $content;
}

echo "</tr></table>";

?>


<style>
		#movies{
			background-color:#000;
			color:  #fff;
			font: 15pt;  
			font-family: monospace;
		}
		tr.header{

			background-color: #111f4e;
			color: #fff;
			font:  bold 11pt  ;
			
		}
		tr.odd{
			background-image:linear-gradient(#1b1b1b ,#3b3a3a) ;
		}
		tr.even{
			background-color: #ffa31a;
		}
		img {
			height: 250px;
			width: 180px;
			padding:  10px;
		}
		td{
			text-align: center;
		}
		span.year{
			color: #fff;
			font-size: 13px;
			font-family: Sans-serif;
		}
		span.name{
			color: #fff;
			font-size: 18px;
			font-weight: bold;
			font-family: monospace;
		}
		body{
			background-image:linear-gradient(#784a01 ,#ffa31a) ;
			margin: 0;
			padding: 0
		}
</style>