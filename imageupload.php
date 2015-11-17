<?php
if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
{
	header("Location: index.php");
	die();
}

$i = 0;
foreach($_FILES[$input]['tmp_name'] as $f)
{
	if(is_uploaded_file($_FILES[$input]['tmp_name'][$i])/*isset($_FILES[$input])*/)
	{
		$filepath = "none";
		try {	
				// Undefined | Multiple Files | $_FILES Corruption Attack
				// If this request falls under any of them, treat it invalid.
				if (
					!isset($_FILES[$input]['error'][$i]) ||
					is_array($_FILES[$input]['error'][$i])
				) {
					throw new RuntimeException('Invalid parameters.');
				}

				// Check $_FILES[$input]['error'] value.
				switch ($_FILES[$input]['error'][$i]) {
					case UPLOAD_ERR_OK:
						break;
					case UPLOAD_ERR_NO_FILE:
						throw new RuntimeException('No file sent.');
					case UPLOAD_ERR_INI_SIZE:
					case UPLOAD_ERR_FORM_SIZE:
						throw new RuntimeException('Exceeded filesize limit.');
					default:
						throw new RuntimeException('Unknown errors.');
				}

				// You should also check filesize here. 
				if ($_FILES[$input]['size'][$i] > 1000000) {
					throw new RuntimeException('Exceeded filesize limit.');
				}

				// DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
				// Check MIME Type by yourself.
				$finfo = new finfo(FILEINFO_MIME_TYPE);
				if (false === $ext = array_search(
					$finfo->file($_FILES[$input]['tmp_name'][$i]),
					array(
						'jpg' => 'image/jpeg',
						'png' => 'image/png',
						'gif' => 'image/gif',
					),
					true
				)) {
					throw new RuntimeException('Invalid file format.');
				}

				// You should name it uniquely.
				// DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
				// On this example, obtain safe unique name from its binary data.
				$filename = sha1_file($_FILES[$input]['tmp_name'][$i]);
				$filepath = 'product_images/' . $filename . '.' . $ext;
				if (!move_uploaded_file(
					$_FILES[$input]['tmp_name'][$i],
					sprintf('product_images/%s.%s',
						$filename,
						$ext
					)
				)) {
					throw new RuntimeException('Failed to move uploaded file.');
				}

				//echo 'File is uploaded successfully.';

				$productimage = array(
				'product_id' => $product_id,
				'image_url' => $filepath				
				);
				$STH = $DBH->prepare(
					"INSERT INTO Product_Image (Product_Id, Image_Url)
					 VALUES (:product_id, :image_url)");
				$STH->execute($productimage);

			} catch (RuntimeException $e) {
				//echo 'try exception: ' . $e->getMessage() . "</br>";
			}
	}
	$i++;
}
?>