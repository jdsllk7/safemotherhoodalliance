<!-- header -->
<?php
$title = "Blog | Safe Motherhood Alliance";
include_once 'includes/partials/header.inc.php';
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/banner/084e5242fd3c48e484455d908d4240dd - Copy.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate mb-5 text-center">
        <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Blog <i class="fa fa-chevron-right"></i></span></p>
        <h1 class="mb-0 bread">Our Blogs</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">

      <?php
      $systemServices = new SystemServices();
      $fileManager = new FileManager();
      $db = new Db();
      $conn = $db->connect();
      $blog = new Blog();
      $result = $blog->getAllBlogs();
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          if ($db->server() == "localhost") {
            $a_img = '<a href="blog-single.php?blog=' . $row["blogId"] . '" class="block-20 img rounded" style="background-image: url(\'http://' . $_SERVER['HTTP_HOST'] . '/myprojects/safemotherhoodalliance/admin/' . $fileManager->getFilePath('blog', $row["blogId"], $conn)[0] . '\');"></a>';
          } else {
            $a_img = '<a href="blog-single.php?blog=' . $row["blogId"] . '" class="block-20 img rounded" style="background-image: url(\'https://' . $_SERVER['HTTP_HOST'] . '/' . $fileManager->getFilePath('blog', $row["blogId"], $conn)[0] . '\');"></a>';
          }
          if (count(explode(" ", $systemServices->getTimeAgo($row["uploadDate"]))) == 3) {
            $timeAgo = '' . explode(" ", $systemServices->getTimeAgo($row["uploadDate"]))[0] . '<br>
						' . explode(" ", $systemServices->getTimeAgo($row["uploadDate"]))[1] . '<br>
						' . explode(" ", $systemServices->getTimeAgo($row["uploadDate"]))[2] . '';
          } else {
            $timeAgo = '' . explode(" ", $systemServices->getTimeAgo($row["uploadDate"]))[0] . '<br>
						' . explode(" ", $systemServices->getTimeAgo($row["uploadDate"]))[1] . '';
          }
          echo '
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end text-center">
              <div class="text text-center">
              ' . $a_img . '  
                <a href="blog-single.php?blog=' . $row["blogId"] . '" class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                  <div>
                    <span class="mos font-small" title="Posted ' . $systemServices->getTimeAgo($row["uploadDate"]) . '">
                    ' . $timeAgo . '
                    </span>
                  </div>
                </a>
                <h3 class="heading mb-3">' . $row["blogTitle"] . '</h3>
                <p> ' . substr($row["blogText"], 0, 100) . '... <a href="blog-single.php?blog=' . $row["blogId"] . '">read more</a></p>
              </div>
					    <!-- <a href="#" style="width:30px" title="Share on Twitter" class="btn btn-sm bg-facebook m-1"><i class="fa fa-facebook"></i></a>
					    <a href="#" style="width:30px" title="Share on Twitter" class="btn btn-sm bg-twitter m-1"><i class="fa fa-twitter"></i></a>
					    <a href="#" style="width:30px" title="Share on LinkedIn" class="btn btn-sm bg-linkedin m-1"><i class="fa fa-linkedin"></i></a>
					    <a href="#" style="width:30px" title="Share on Instagram" class="btn btn-sm bg-instagram m-1"><i class="fa fa-instagram"></i></a> -->
            </div>
          </div>
          ';
        }
      } else {
        echo '
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
            <div class="text text-center">
              <a class="block-20 img" style="background-image: url(\'images/placeholders/placeholder.png\');">
              </a>
              <a class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                <div>
                  <span class="day">0</span>
                </div>
              </a>
              <h3 class="heading mb-3">No Blogs</h3>
              <p>Blogs coming soon</p>
            </div>
          </div>
        </div>
        ';
      }
      ?>




    </div>

    <!-- <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li>
          </ul>
        </div>
      </div>
    </div> -->

  </div>
</section>


<!-- footer -->
<?php
include_once 'includes/partials/footer.inc.php';
?>

<!-- nav-link active -->
<script>
  $(document).ready(function() {
    $(".nav-blog").addClass("active");
  });
</script>