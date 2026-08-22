<?php 
include ("./admin/db-conn.php");
include ("./include/header.php");

// 1. FETCH BLOG DATA BY ID FROM DATABASE

$blog_id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 0;

$blog_query = "SELECT * FROM blogs WHERE id = $blog_id AND status = 'published'";
$blog_result = mysqli_query($conn, $blog_query);

// Agar blog id galat ho ya post inactive ho, toh error dikhao
if (!$blog_result || mysqli_num_rows($blog_result) == 0) {
    echo "<div class='container py-5 text-center'><h3>Article Not Found!</h3><a href='blog.php' class='obrien-button premium-btn mt-3'>Back to Market Insights</a></div>";
    include ("./include/footer.php");
    exit;
}

$blog = mysqli_fetch_assoc($blog_result);

// Dynamic Props for Breadcrumb
$page_title = $blog['title'];
$breadcrumb_links = [
    "Home" => "index.php",
    "Market Insights" => "blog.php"
];

include ("./include/breadcrumb.php");

// Image Path Setup
$blog_img_path = !empty($blog['image']) 
                ? "admin/assets/img/uploads/" . htmlspecialchars($blog['image']) 
                : "assets/images/product/medium-size/default.png";

// Date formatting
$formatted_date = date("d M, Y", strtotime($blog['created_at']));
$author_name    = !empty($blog['author']) ? htmlspecialchars($blog['author']) : "Editorial Team";
?>

<!-- BLOG DETAILS SECTION (2-Column: Article + Focused Sidebar) -->
<div class="blog-details-area section-padding mt-5 pb-5">
    <div class="container container-default custom-area">
        <div class="row">
            
            <!-- LEFT COLUMN: DYNAMIC MAIN ARTICLE CONTENT -->
            <div class="col-lg-8 col-md-12 col-custom mb-5 mb-lg-0">
                <article class="premium-blog-article">
                    
                    <!-- Hero Image -->
                    <div class="article-hero-image overflow-hidden rounded-image mb-4">
                        <img src="<?php echo $blog_img_path; ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="img-fluid w-100">
                    </div>

                    <!-- Meta Bar -->
                    <div class="article-meta-bar d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div class="meta-left d-flex flex-wrap gap-3">
                            <span><i class="fa fa-calendar"></i> <?php echo $formatted_date; ?></span>
                            <span><i class="fa fa-user"></i> <?php echo $author_name; ?></span>
                            <span><i class="fa fa-folder-open"></i> Export Trade Report</span>
                        </div>
                        <div class="meta-right">
                            <span class="verified-badge"><i class="fa fa-check-circle"></i> APEDA Verified Insights</span>
                        </div>
                    </div>

                    <!-- Article Main Title -->
                    <h1 class="article-main-title">
                        <?php echo htmlspecialchars($blog['title']); ?>
                    </h1>

                    <!-- Article Content Body (HTML formatted from DB) -->
                    <div class="article-body-content mt-4">
                        <?php 
                        if (!empty($blog['content'])) {
                            echo $blog['content']; 
                        } else {
                            echo "<p>Complete market intelligence report is currently being updated by our analysts.</p>";
                        }
                        ?>
                    </div>

                    <!-- Share Icons Footer -->
                    <div class="article-footer-tags d-flex flex-wrap justify-content-end align-items-center mt-5 pt-4 border-top">
                        <div class="share-icons d-flex align-items-center gap-2">
                            <span class="share-label">Share Article:</span>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>&title=<?php echo urlencode($blog['title']); ?>" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin"></i></a>
                            <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($blog['title'] . ' - http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" target="_blank" title="Share on WhatsApp"><i class="fa fa-whatsapp"></i></a>
                            <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode($blog['title']); ?>&url=<?php echo urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" target="_blank" title="Share on Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="mailto:?subject=<?php echo urlencode($blog['title']); ?>&body=<?php echo urlencode('Check out this article: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" title="Share via Email"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>

                    <!-- Author Box -->
                    <div class="article-author-box d-flex align-items-center mt-4 p-4">
                        <div class="author-logo mr-4">
                            <img src="assets/images/logo/logo1.png" alt="Manas Crest" style="max-width: 80px;">
                        </div>
                        <div class="author-info">
                            <h4 class="mb-1">Manas Crest International - Editorial Team</h4>
                            <p class="mb-0 text-muted">
                                Our trade market analysts publish regular reports on Indian crop harvests, commodity pricing, and phytosanitary export regulations to help buyers make informed decisions.
                            </p>
                        </div>
                    </div>

                </article>
            </div>

            <!-- RIGHT COLUMN: CLEAN CONVERSION SIDEBAR -->
            <div class="col-lg-4 col-md-12 col-custom mt-5 mt-lg-0">
                <aside class="blog-sidebar">
                    
                    <!-- 1. Lead Conversion Card (Essential for B2B Buyers!) -->
                    <div class="sidebar-widget quote-trigger-widget mb-4 text-center p-4">
                        <span class="badge-title mb-2 d-inline-block">BULK TRADE DESK</span>
                        <h3 class="text-white mb-2">Need an Export Quote?</h3>
                        <p class="text-light mb-4" style="font-size: 14px;">
                            Get real-time APMC Mandi FOB & CIF pricing for sortex-cleaned Indian commodities.
                        </p>
                        <a href="contact.php" class="obrien-button premium-btn w-100 justify-content-center">
                            Request FOB/CIF Price <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>

                    <!-- 2. Dynamic Recent Trade Insights (Latest 3 Blogs) -->
                    <div class="sidebar-widget mb-4">
                        <h4 class="widget-title">Recent Trade Insights</h4>
                        <div class="recent-post-list">
                            <?php 
                            // Query: Fetch latest 3 published blogs excluding the current one
                            $rec_query = "SELECT * FROM blogs WHERE status = 'published' AND id != $blog_id ORDER BY id DESC LIMIT 3";
                            $rec_result = mysqli_query($conn, $rec_query);

                            // Fallback if less than 3 other blogs exist
                            if (!$rec_result || mysqli_num_rows($rec_result) == 0) {
                                $rec_query = "SELECT * FROM blogs WHERE status = 'published' ORDER BY id DESC LIMIT 3";
                                $rec_result = mysqli_query($conn, $rec_query);
                            }

                            if ($rec_result && mysqli_num_rows($rec_result) > 0) :
                                while ($rec = mysqli_fetch_assoc($rec_result)) :
                                    
                                    $rec_img = !empty($rec['image']) 
                                               ? "admin/assets/img/uploads/" . htmlspecialchars($rec['image']) 
                                               : "assets/images/product/medium-size/default.png";
                                    
                                    $rec_date = date("d M, Y", strtotime($rec['created_at']));
                            ?>
                            <!-- Single Recent Post -->
                            <div class="single-recent-post d-flex align-items-center mb-3">
                                <div class="post-thumb mr-3">
                                    <a href="blog-details.php?id=<?php echo $rec['id']; ?>">
                                        <img src="<?php echo $rec_img; ?>" alt="<?php echo htmlspecialchars($rec['title']); ?>" style="width: 75px; height: 70px; object-fit: cover; border-radius: 8px;">
                                    </a>
                                </div>
                                <div class="post-info pl-2">
                                    <span class="date"><i class="fa fa-calendar"></i> <?php echo $rec_date; ?></span>
                                    <h5 class="post-title mb-0">
                                        <a href="blog-details.php?id=<?php echo $rec['id']; ?>">
                                            <?php echo htmlspecialchars($rec['title']); ?>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <?php 
                                endwhile;
                            else:
                            ?>
                                <p class="text-muted mb-0">No recent trade reports available.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- 3. Export Categories -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Export Categories</h4>
                        <ul class="sidebar-category-list">
                            <li><a href="products.php?cat_id=7"><span>Spices & Commodities</span></a></li>
                            <li><a href="products.php?cat_id=8"><span>Vegetables & Produce</span></a></li>
                            <li><a href="products.php?cat_id=4"><span>Oils & Industrials</span></a></li>
                            <li><a href="products.php?cat_id=6"><span>Grains & Millets</span></a></li>
                            <li><a href="products.php?cat_id=5"><span>Pulses & Beans</span></a></li>
                        </ul>
                    </div>

                </aside>
            </div>

        </div>
    </div>
</div>

<?php include ("./include/footer.php"); ?>