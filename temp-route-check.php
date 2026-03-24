<?php
$blade=[];
$it=new RecursiveIteratorIterator(new RecursiveDirectoryIterator('resources/views'));
foreach($it as $f){
    if(!$f->isFile()) continue;
    $c=file_get_contents($f->getPathname());
    $pos=0;
    while(false !== ($pos = strpos($c, 'route(', $pos))){
        $pos += 6;
        while($pos < strlen($c) && ctype_space($c[$pos])) $pos++;
        if($pos>=strlen($c)) break;
        $q = $c[$pos];
        if(ord($q)!=34 && ord($q)!=39) continue;
        $end = strpos($c,$q,$pos+1);
        if($end===false) break;
        $route = substr($c,$pos+1,$end-$pos-1);
        if($route) $blade[$route]=1;
        $pos=$end+1;
    }
}
foreach(array_keys($blade) as $r){ echo $r . "\n"; }
