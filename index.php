<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;

if (isset($_POST['template'])) {

	$file = __DIR__ . '/templates/' . $_POST['template'] . '.html';
	$html = file_get_contents($file);
	$publicUrl = __DIR__;

	$dompdf = new Dompdf([
		'chroot' => $publicUrl
	]);
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4', 'portrait');
	$dompdf->render();
	$dompdf->stream('document.pdf', [
		'Attachment' => false
	]);	
}

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>DOMPDF Examples</title>
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

	<form method="POST" action="#" class="bg-white inline-block px-4 py-8 rounded w-2/6">

		<div class="py-4">
		  <label for="template" class="block text-sm font-medium text-gray-700">Template</label>
		  <select id="template" name="template" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
		    <option value="invoice">Invoice</option>
		  </select>
		</div>

		<div>
			<input type="submit" name="Submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
		</div>
	</form>

</body>
</html>
