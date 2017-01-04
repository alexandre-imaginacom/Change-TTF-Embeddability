<?php
echo "Starting Change-TTF-Embeddability.php\r\n";

$allFiles = glob("*.ttf");
echo "Found ".sizeof($allFiles)." TTF files in this folder.\r\n";

foreach($allFiles as $filename)
	changeIt($filename);

function changeIt($filename){
	echo "Working on file '{$filename}'... ";
	$inways = fopen($filename, "rb+");
	$a    =
	$x    = 0;
	$type = '    0';

	fseek($inways, 12, 0);
	$type = fread($inways, 4);
	
	if($type === 'OS/2'){
		$length = 
		$loc    = 
		$fstype = 
		$sum    = 0;
		$loc = ftell($inways);
		fread($inways, 4);
		$fstype  = ord(fgetc($inways)) << 24;
		$fstype |= ord(fgetc($inways)) << 16;
		$fstype |= ord(fgetc($inways)) << 8 ;
		$fstype |= ord(fgetc($inways))      ;
		$length  = ord(fgetc($inways)) << 24;
		$length |= ord(fgetc($inways)) << 16;
		$length |= ord(fgetc($inways)) << 8 ;
		$length |= ord(fgetc($inways))      ;
		
		if(fseek($inways,$fstype+8,0)){
			echo "- Fatal error (unknown file format)";
			return;
		}
		fwrite($inways, chr(00));
		fwrite($inways, chr(00));
		fseek($inways,$fstype,0);
		for ($x=$length;$x--;)
			$sum += ord(fgetc($inways));
		fseek($inways,$loc,0);
		fwrite($inways, chr($sum>>24));
		fwrite($inways, chr(255&($sum>>16)));
		fwrite($inways, chr(255&($sum>>8)));
		fwrite($inways, chr(255&$sum));
		fclose($inways);
		echo "- Embeddability has been set to 'Installable'.\r\n";
	}
	else{
		echo "- Could not find file header 'OS/2'. I can't convert this file, sorry.\r\n";
	}
}
