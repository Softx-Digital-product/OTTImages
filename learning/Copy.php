<?php




function custom_copy($src, $dst) {

	// open the source directory
	$dir = opendir($src);

	// Make the destination directory if not exist
	@mkdir($dst);

	// Loop through the files in source directory
	while( $file = readdir($dir) ) {
        echo $dir;
		if (( $file != '.' ) && ( $file != '..' )) {
			if ( is_dir($src . '/' . $file) )
			{

				// Recursively calling custom copy function
				// for sub directory
				custom_copy($src . '/' . $file, $dst . '/' . $file);

			}
			else {
				copy($src . '/' . $file, $dst . '/' . $file);
			}
		}
	}


	closedir($dir);

   // return "Coped Successfully";
}

// $src = "C:/xampp/htdocs/learning";

// $dst = "C:/xampp/htdocs/gfg";

// custom_copy($src, $dst);


function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}
    

?>
