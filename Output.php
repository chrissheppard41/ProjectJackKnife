<?php


class Output {

	public static function print_file($_dir, $_page, $_content, $_type = "", $_rename = false) {

		$_dir = str_replace("../", "/", $_dir);
		if($_rename) {
			$_page = str_replace(".htm", ".md", $_page);
		}

		$path = "output/";

		if($_type !== "") {
			$path .= $_type."/";
		}
		if($_dir !== "/") {
			$path .= $_dir."/";
		}


		if(!file_exists($path)) {
			mkdir($path, 0777, true);
		}


		if($_page !== "") {
			$path .= $_page;
		}


		$myfile = fopen($path, "w") or die("Unable to open file!");
		fwrite($myfile, $_content);
		fclose($myfile);

	}

}


?>