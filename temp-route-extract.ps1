$files = Get-ChildItem -Recurse resources/views -Include *.blade.php
$routes = [System.Collections.Generic.HashSet[string]]::new()
foreach ($f in $files) {
    $c = Get-Content $f.FullName -Raw
    $pattern = 'route\s*\(\s*["\']([^"\']+)["\']'
    $matches = [regex]::Matches($c, $pattern)
    foreach ($m in $matches) { $routes.Add($m.Groups[1].Value) > $null }
}
$routes | Sort-Object | ForEach-Object { $_ }