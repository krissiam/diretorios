$files = glob( "$dir."/*" );//seu diretorio
 
// Sort files by modified time, latest to earliest
// Use SORT_ASC in place of SORT_DESC for earliest to latest
array_multisort(
  array_map( 'filemtime', $files ),
  SORT_NUMERIC,
  SORT_DESC,
  $files
);
