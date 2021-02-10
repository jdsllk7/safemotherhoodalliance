<!-- header -->
<?php
include_once 'includes/class-autoLoader.inc.php';
if (!isset($_GET["blog"])) {
  header("Location: blog.php");
} else {
  $blog = new Blog();
  $result = $blog->getBlog($_GET["blog"]);
  if ($result->num_rows != 1) {
    header("Location: blog.php");
  } else {
    $row = $result->fetch_assoc();
    $fileManager = new FileManager();
    $db = new Db();
    $conn = $db->connect();
    $img = "http://" . $_SERVER['HTTP_HOST'] . "/myprojects/safemotherhoodalliance/admin/" . $fileManager->getFilePath("blog", $row["blogId"], $conn)[0];
    if ($db->server() == "production") {
      $img = "https://admin.safemotherhoodalliance.org" . $fileManager->getFilePath('blog', $row["blogId"], $conn)[0];
    }
  }
}

$title = $row["blogTitle"] . " | Safe Motherhood Alliance";
include_once 'includes/partials/header.inc.php';
?>

<head>
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@safemotherhoodalliance">
  <meta name="twitter:title" content="<?php echo $row["blogTitle"] . " | Safe Motherhood Alliance"; ?>">
  <meta name="twitter:description" content="<?php echo $row["blogText"]; ?>">
  <meta name="twitter:creator" content="@MuzalemaMwanza">
  <meta name="twitter:image" content="http://placekitten.com/250/250">
  <meta name="twitter:domain" content="<?php echo $img; ?>">
</head>

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
          $systemServices = new SystemServices();
          $fileManager = new FileManager();
          $db = new Db();
          $conn = $db->connect();
          $blog = new Blog();
          $result = $blog->getSomeBlogs(5);
          while ($row2 = $result->fetch_assoc()) {
            //format date
            $dateTime = new DateTime($row2["uploadDate"]);
            $formattedDate = $dateTime->format('d-m-Y | h:m A');
            if ($db->server() == "localhost") {
              $anchor_img = '<a class="blog-img mr-4" style="background-image: url(http://' . $_SERVER['HTTP_HOST'] . '/myprojects/safemotherhoodalliance/admin/' . $fileManager->getFilePath('blog', $row2["blogId"], $conn)[0] . ');"></a>';
            } else {
              $anchor_img = '<a class="blog-img mr-4" style="background-image: url(https://' . $_SERVER['HTTP_HOST'] . '/' . $fileManager->getFilePath('blog', $row2["blogId"], $conn)[0] . ');"></a>';
            }
            echo '<div class="block-21 mb-4 d-flex">
                    ' . $anchor_img . '
                    <div class="text">
                      <h3 class="heading"><span>' . substr($row2["blogTitle"], 0, 50) . '...</span><br><a class="baby-blue-normal-color" href="blog-single.php?blog=' . $row2["blogId"] . '">read more</a></h3>
                      <div class="meta">
                        <div><span class="font-small"><span class="fa fa-calendar"></span> ' . $formattedDate . '</span></div>
                        <div><span class="font-small"><span class="fa fa-user"></span> Posted ' . $systemServices->getTimeAgo($row2["uploadDate"]) . '</span></div>
                      </div>
                    </div>
                  </div>';
          }
          ?>

        </div>
      </div>

    </div>
  </div>
</section>

<div class="share-btn-container">
  <a href="#" title="Share on facebook" target="_blank" class="facebook-btn">
    <i class="fa fa-facebook"></i>
  </a>

  <a href="https://twitter.com/intent/tweet?text=Hello there&url=https://safemotherhoodalliance.org/blog-single.php?blogId=<?php echo $row["blogId"]; ?>&hashtags=SafeMotherhoodAlliance,SafeDelivery" title="Share on twitter" target="_blank" class="twitter-btn">
    <i class="fa fa-twitter"></i>
  </a>

  <!-- <a href="http://www.linkedin.com/shareArticle?mini=true&url=https://safemotherhoodalliance.org/blog-single.php?blog=<?php echo $row["blogId"]; ?>&title=Write title here&source=<?php echo $img; ?>" title="Share on linkedin" target="_blank" class="linkedin-btn">
    <i class="fa fa-linkedin"></i>
  </a> -->

</div>
<!--   <a href="http://www.linkedin.com/shareArticle?mini=true&url=blog-single.php?blog=<?php echo $row["blogId"]; ?>&title=Write title here&source=<?php echo $img; ?>">jdslk</a> -->

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