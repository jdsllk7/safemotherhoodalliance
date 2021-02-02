<?php

namespace Blog;

use Db;

class Blog extends Db
{
	public function getAllBlogs()
	{
		$conn = $this->connect();
		$sql = "SELECT * FROM blog ORDER BY uploadDate DESC";
		return $conn->query($sql);
	} //end getAllBlogs()

	public function getSomeBlogs($num)
	{
		$conn = $this->connect();
		$sql = "SELECT * FROM blog ORDER BY uploadDate DESC LIMIT $num";
		return $conn->query($sql);
	} //end getAllBlogs()

	public function getBlog($blogId)
	{
		$conn = $this->connect();
		$sql = "SELECT * FROM blog WHERE blogId = $blogId";
		return $conn->query($sql);
	} //end getAllBlogs()

}//end class
