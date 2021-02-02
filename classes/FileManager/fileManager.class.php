<?php

namespace FileManager;

class FileManager
{
	//delete file(s)
	function deleteFile($deleteByType, $valueToDeleteBy, $conn)
	{
		if ($deleteByType == "sourceId") {
			if (mysqli_query($conn, "DELETE FROM sysfiles WHERE sourceId = $valueToDeleteBy")) {
				return true;
			} else {
				return false;
			}
		} elseif ($deleteByType == "path") {
			if (mysqli_query($conn, "DELETE FROM sysfiles WHERE path LIKE '$valueToDeleteBy'")) {
				return true;
			} else {
				return false;
			}
		} elseif ($deleteByType == "fileType") {
			if (mysqli_query($conn, "DELETE FROM sysfiles WHERE fileType LIKE '$valueToDeleteBy'")) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	} //end deleteFile()


	//upload new files
	function uploadFiles($file, $path, $fileType, $sourceId, $tempPath, $cleanUp, $conn)
	{
		$filesArr = $file["file"];
		$fileNames = array_filter($filesArr['name']);
		$uploadStatus = 0;

		if (!empty($fileNames)) {
			//clear up unused paths from table
			if ($cleanUp) {
				$this->deleteFile("sourceId", $sourceId, $conn);
				// mysqli_query($conn, "DELETE FROM sysfiles WHERE sourceId = $sourceId");
			}

			foreach ($filesArr['name'] as $key => $val) {
				$fileName = basename($filesArr['name'][$key]);
				$tmp_name = $filesArr['tmp_name'][$key];

				//get file extension
				$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

				//get new complete file path
				$destination_url = $path . '/' . $fileType . "." . md5(md5(time() . 'travisGreene' . rand(0, 9999))) . "." . $fileExtension;

				//compress and move file to new directory
				if ($this->compress_image($tmp_name, $tempPath . $destination_url, 70)) {
					$sql = "INSERT INTO sysfiles (path, fileType, sourceId) VALUES ('" . $destination_url . "', '" . $fileType . "', " . $sourceId . ")";
					if (!mysqli_query($conn, $sql)) { //same path in db
						$uploadStatus++;
					}
				} else {
					return false;
				}
			} //end foreach()
		} else {
			$uploadStatus++;
		}
		if ($uploadStatus == 0) {
			return true;
		} else {
			return false;
		}
	} //end uploadFiles()

	//print out/display files 
	function getFilePath($fileType, $sourceId, $conn)
	{
		$pathsArr = array();
		$placeholderImg = "dist/img/site-images/placeholder.png";
		if (isset($sourceId) && !empty($sourceId) && isset($fileType) && !empty($fileType)) {
			$data = mysqli_query($conn, "SELECT path FROM sysfiles WHERE fileType LIKE '$fileType' AND sourceId = $sourceId");
			if (mysqli_num_rows($data) >= 1) {
				while ($result = mysqli_fetch_assoc($data)) {
					if (file_exists("../" . $result["path"]) || file_exists($result["path"]) || !empty($result["path"])) {
						array_push($pathsArr, $result["path"]);
					}
				}
				if (sizeof($pathsArr) == 0) {
					array_push($pathsArr, $placeholderImg);
				}
			} else {
				array_push($pathsArr, $placeholderImg);
			}
		} else {
			array_push($pathsArr, $placeholderImg);
		}
		return $pathsArr;
	} //end getFilePath()

	//compress & move files
	function compress_image($source_url, $destination_url, $quality)
	{
		$info = getimagesize($source_url);

		if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source_url);

		elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source_url);

		return imagejpeg($image, $destination_url, $quality);
	} //end compress_image
}//end class
