<?php
header('Content-Type: application/json'); 

$withData = array(); 
foreach ($_POST as $key=>$value) {
    if (strpos($value, "Data") !== false) { 
        $withData[$key] = $value; 
    }
}


function greater($s1, $s2) {
    $s1l = strlen($s1);
    $s2l = strlen($s2);
    if ($s1l != $s2l) { 
        return $s1l > $s2l;
    } else { 
        return strcmp($s1, $s2) > 0; 
    }
}


function bubbleSort($data) {
	$swapped=true;
	$n=count($data);
	$temp=null;
	while ($swapped) {
		$swapped = false;
		for($i=0; $i<$n-1; $i++) {
			if( greater($data[$i],$data[$i+1])) {
				$temp=$data[$i];
				$data[$i]=$data[$i+1];
				$data[$i+1]=$temp;
				$swapped=true;
			}
		}
	}
	return $data;
}

$keys = array_keys($withData); 
$keys = bubbleSort($keys); 
echo '{ "'; 
$firstTime = true;
foreach ($keys as $key) {
    if ($firstTime) {
        $firstTime = false;
    } else {
        echo '","'; 
    }
    echo $key . '":"' . hash('adler32', $withData[$key]); 
}
echo '" }'; ?>