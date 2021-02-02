<!-- header -->
<?php
include_once 'includes/class-autoLoader.inc.php';
if (!isset($_GET["blog"])) {
  header("Location: blog.php");
} else {
  $blog = new Blog\Blog();
  $result = $blog->getBlog($_GET["blog"]);
  if ($result->num_rows != 1) {
    header("Location: blog.php");
  } else {
    $row = $result->fetch_assoc();
    $fileManager = new FileManager\FileManager();
    $db = new Db();
    $conn = $db->connect();
    $img = "http://" . $_SERVER['HTTP_HOST'] . "/myprojects/safemotherhoodalliance/admin/" . $fileManager->getFilePath("blog", $row["blogId"], $conn)[0];
    if ($db->server() == "production") {
      $img = "http://safemotherhoodalliance.org" . $fileManager->getFilePath('blog', $row["blogId"], $conn)[0];
    }
  }
}

$title = $row["blogTitle"] . " | Safe Motherhood Alliance";
include_once 'includes/partials/header.inc.php';
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo $img; ?>')" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate mb-5 text-center">
        <p class="breadcrumbs mb-0">
          <span class="mr-2">
            <a href="index.php">Home <i class="fa fa-chevron-right"></i></a>
          </span>
          <span class="mr-2"><a href="blog.php">Blogs <i class="fa fa-chevron-right"></i></a></span>
        </p>
        <h1 class="mb-0 bread">Blog</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <p>
          <img src="<?php echo $img; ?>" alt="" class="img-fluid">
        </p>
        <h2 class="mb-3"><?php echo $row["blogTitle"]; ?></h2>
        <p>
          <?php echo $row["blogText"]; ?>
        </p>

      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
        <div class="sidebar-box ftco-animate">

          <h3>Other Blogs</h3>

          <?php
          $systemServices = new SystemServices\SystemServices();
          $fileManager = new FileManager\FileManager();
          $db = new Db();
          $conn = $db->connect();
          $blog = new Blog\Blog();
          $result = $blog->getSomeBlogs(5);
          while ($row = $result->fetch_assoc()) {
            //format date
            $dateTime = new DateTime($row["uploadDate"]);
            $formattedDate = $dateTime->format('d-m-Y | h:m A');
            if ($db->server() == "localhost") {
              $anchor_img = '<a class="blog-img mr-4" style="background-image: url(http://' . $_SERVER['HTTP_HOST'] . '/myprojects/safemotherhoodalliance/admin/' . $fileManager->getFilePath('blog', $row["blogId"], $conn)[0] . ');"></a>';
            } else {
              $anchor_img = '<a class="blog-img mr-4" style="background-image: url(https://' . $_SERVER['HTTP_HOST'] . '/' . $fileManager->getFilePath('blog', $row["blogId"], $conn)[0] . ');"></a>';
            }
            echo '<div class="block-21 mb-4 d-flex">
                    ' . $anchor_img . '
                    <div class="text">
                      <h3 class="heading"><span>' . substr($row["blogTitle"], 0, 50) . '...</span><br><a class="baby-blue-normal-color" href="blog-single.php?blog=' . $row["blogId"] . '">read more</a></h3>
                      <div class="meta">
                        <div><span class="font-small"><span class="fa fa-calendar"></span> ' . $formattedDate . '</span></div>
                        <div><span class="font-small"><span class="fa fa-user"></span> Posted ' . $systemServices->getTimeAgo($row["uploadDate"]) . '</span></div>
                      </div>
                    </div>
                  </div>';
          }
          ?>

        </div>
      </div>

      <!-- <div class="col-lg-12">
        <br>
        <h5>Share on:</h5>
        <a href="#" style="width:30px" title="Share on Twitter" class="btn btn-sm bg-facebook m-1"><i class="fa fa-facebook"></i></a>
        <a href="#" style="width:30px" title="Share on Twitter" class="btn btn-sm bg-twitter m-1"><i class="fa fa-twitter"></i></a>
        <a href="#" style="width:30px" title="Share on LinkedIn" class="btn btn-sm bg-linkedin m-1"><i class="fa fa-linkedin"></i></a>
        <a href="#" style="width:30px" title="Share on Instagram" class="btn btn-sm bg-instagram m-1"><i class="fa fa-instagram"></i></a>
      </div> -->

    </div>
  </div>
</section>

<div class="share-btn-container">
  <a href="#" target="_blank" class="facebook-btn">
    <i class="fab fa-facebook"></i>
  </a>

  <a href="#" target="_blank" class="twitter-btn">
    <i class="fab fa-twitter"></i>
  </a>

  <a href="#" target="_blank" class="linkedin-btn">
    <i class="fab fa-linkedin"></i>
  </a>

  <a href="#" target="_blank" class="whatsapp-btn">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>

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