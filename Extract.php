<?php
class Extract {
	private $array;

	public function __construct() {
		$this->array = Array();
	}

	public function setCsv() {
		if (($handle = fopen("tiger_pages.csv", "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    	$this->array[] = $data;
		    }
		    fclose($handle);
		}
	}


	public function getAllColumns() {
		return $this->array;
	}

	public function getColumn($row) {
		if(!empty($this->array[$row])) {
			return $this->array[$row];
		} else {
			return Array();
		}
	}

	public function getPageTemplate($row) {
		$output = "";
		if(!empty($this->array[$row])) {

$output = '
<!DOCTYPE html>
<html>
	<head>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push(
		{"gtm.start": new Date().getTime(),event:"gtm.js"}
		);var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!="dataLayer"?"&l="+l:"";j.async=true;j.src=
		"https://www.googletagmanager.com/gtm.js?id="+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,"script","dataLayer","GTM-PSF877F");</script>
		<!-- End Google Tag Manager -->

		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">

		<meta name="description" content="">
		<meta name="keywords" content="">

		<title>' . $this->array[$row][1] . '</title>
	</head>
	<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PSF877F"
		height="0" width="0" style="display:none;visibility:hidden">
		</iframe>
		</noscript>
		<!-- End Google Tag Manager (noscript) -->
		<h1>' . $this->array[$row][2] . '</h1>
	</body>
</html>
';

		}

		return $output;
	}
	public function getUrl($row) {
		$output = "";
		if(!empty($this->array[$row])) {
			$output = $this->array[$row][0];
		}

		return $output;
	}


	public function getSitemapTemplate() {
		$output = "";
		if(!empty($this->array)) {

			$output = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc>http://www.tiger.co.uk/</loc>
		<changefreq>monthly</changefreq>
		<priority>1.0</priority>
	</url>';
			foreach ($this->array as $key => $value) {

				if($key == 0) {
					continue;
				}

				$output .= '
	<url>
		<loc>' . $value[0] . '</loc>
		<changefreq>yearly</changefreq>
	</url>';

			}
			$output .= '
</urlset>';
		}
		return $output;
	}
}
?>