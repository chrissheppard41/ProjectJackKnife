<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
<?php

require "Extract.php";
require "Output.php";

$Extract = new Extract();
$Extract->setCsv();

foreach($Extract->getAllColumns() as $key => $files) {
	if($key == 0) {
		continue;
	}

	Output::print_file(str_replace("http://www.tiger.co.uk","", $files[0]), "index.html", $Extract->getPageTemplate($key));

}

Output::print_file("/", "sitemap.xml", $Extract->getSitemapTemplate());

?>
	</body>
</html>