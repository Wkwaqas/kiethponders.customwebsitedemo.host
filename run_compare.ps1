Add-Type -AssemblyName System.IO.Compression.FileSystem
$zipA = 'thinker.news.zip'
$zipB = 'thinkers.news.customwebsitedemo.host.zip'
if (-not (Test-Path $zipA)) { Write-Error "File not found: $zipA"; return }
if (-not (Test-Path $zipB)) { Write-Error "File not found: $zipB"; return }
$hA = (Get-FileHash -Path $zipA -Algorithm SHA256).Hash
$hB = (Get-FileHash -Path $zipB -Algorithm SHA256).Hash
$za = [System.IO.Compression.ZipFile]::OpenRead((Resolve-Path $zipA).Path)
$zb = [System.IO.Compression.ZipFile]::OpenRead((Resolve-Path $zipB).Path)
try {
  $mapA = @{}
  foreach($e in $za.Entries){ $k = $e.FullName.Replace('\','/'); $mapA[$k] = $e }
  $mapB = @{}
  foreach($e in $zb.Entries){ $k = $e.FullName.Replace('\','/'); $mapB[$k] = $e }
  $onlyA = @($mapA.Keys | Where-Object { -not $mapB.ContainsKey($_) })
  $onlyB = @($mapB.Keys | Where-Object { -not $mapA.ContainsKey($_) })
  $common = @($mapA.Keys | Where-Object { $mapB.ContainsKey($_) })
  $lenMismatch = @()
  foreach($k in $common){ if($mapA[$k].Length -ne $mapB[$k].Length){ $lenMismatch += $k } }
  Write-Output "HASH_A=$hA"
  Write-Output "HASH_B=$hB"
  Write-Output "HASH_EQUAL=$($hA -eq $hB)"
  Write-Output "ENTRIES_A=$($mapA.Count)"
  Write-Output "ENTRIES_B=$($mapB.Count)"
  Write-Output "ONLY_A=$($onlyA.Count)"
  Write-Output "ONLY_B=$($onlyB.Count)"
  Write-Output "LEN_MISMATCH=$($lenMismatch.Count)"
  if($hA -eq $hB){ Write-Output 'VERDICT=exact duplicate zip' }
  elseif($onlyA.Count -eq 0 -and $onlyB.Count -eq 0 -and $lenMismatch.Count -eq 0){ Write-Output 'VERDICT=same content different zip metadata' }
  else { Write-Output 'VERDICT=different content' }
  if($onlyA.Count -gt 0){ Write-Output ('ONLY_A_SAMPLE=' + (($onlyA | Select-Object -First 10) -join ';')) }
  if($onlyB.Count -gt 0){ Write-Output ('ONLY_B_SAMPLE=' + (($onlyB | Select-Object -First 10) -join ';')) }
  if($lenMismatch.Count -gt 0){ Write-Output ('LEN_MISMATCH_SAMPLE=' + (($lenMismatch | Select-Object -First 10) -join ';')) }
} finally { if($za){$za.Dispose()}; if($zb){$zb.Dispose()} }
