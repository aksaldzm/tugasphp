<?php

$data = <<<'EOD'
X, -9\\\10\100\-5\\\0\\\\, A
Y, \\13\\1\, B
Z, \\\5\\\-3\\2\\\800, C
EOD;

$lines = explode(PHP_EOL, $data); 

$output = array();

foreach ($lines as $line) {
    $part = explode(',', $line); 

    $partFirst = trim($part[0]);
    $partSecond = trim($part[1]);
    $partThird = trim($part[2]);

    $values = explode('\\', $partSecond); 

    $counter = 1;
    foreach ($values as $value) {
        if (!empty($value)) {
            $output[] = $partFirst . ', ' . $value . ', ' . $partThird . ', ' . $counter;
            $counter++;
        }
    }
}


usort($output, function($a, $b) {
    $aValue = (int)trim(explode(',', $a)[1]); 
    $bValue = (int)trim(explode(',', $b)[1]); 

    if ($aValue == $bValue) {
        return 0;
    }
    return ($aValue < $bValue) ? -1 : 1;
});


foreach ($output as $line) {
    echo $line . '<br>';
}
?>