<?php 
include ("./admin/db-conn.php");
$page_title = "Blogs & News";
$breadcrumb_links = [
    "Home" => "index.php"
];

include ("./include/header.php");
include ("./include/breadcrumb.php");

// =========================================================
// PHP PAGINATION LOGIC FOR BLOGS
// =========================================================
$limit = 6; // 6 blogs per page (3 columns x 2 rows)
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $limit;

// Total published blogs count karna
$count_query = "SELECT COUNT(*) AS total FROM blogs WHERE status = 'published'";
$count_result = mysqli_query($conn, $count_query);
$total_records = 0;
if ($count_result) {
    $count_row = mysqli_fetch_assoc($count_result);
    $total_records = $count_row['total'];
}
$total_pages = ceil($total_records / $limit);
?>

<div class="blog-listing-area section-padding mt-8">
    <div class="container container-default custom-area">
        
        <!-- =========================================================
             NEW PROFESSIONAL B2B HEADER (REPLACING CATEGORY PILLS)
             ========================================================= -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="section-title">
                    <span class="sub-title badge-title mb-2 d-inline-block">MARKET INTELLIGENCE</span>
                    <h2 class="title">LATEST EXPORT INSIGHTS & TRADE NEWS</h2>
                    <p class="desc">
                        Stay informed with real-time commodity harvest reports, global quality standards, APEDA policies, and ocean logistics updates shaping Indian agricultural trade.
                    </p>
                </div>
            </div>
        </div>

        <!-- =========================================================
             DYNAMIC BLOG CARDS GRID (3-COLUMN)
             ========================================================= -->
        <div class="row">
            <?php 
            // Query: Fetch paginated published blogs
            $blog_query = "SELECT * FROM blogs WHERE status = 'published' ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $blog_result = mysqli_query($conn, $blog_query);

            if ($blog_result && mysqli_num_rows($blog_result) > 0) :
                while ($blog = mysqli_fetch_assoc($blog_result)) :
                    
                    // Image Path Handling
                    $blog_img_path = !empty($blog['image']) 
                                    ? "admin/assets/img/uploads/" . htmlspecialchars($blog['image']) 
                                    : "assets/images/product/medium-size/default.png";

                    // Date formatting
                    $formatted_date = date("d M, Y", strtotime($blog['created_at']));
                    
                    // Excerpt text formatting (~115 characters limit)
                    $clean_text = strip_tags($blog['content']);
                    $excerpt = (strlen($clean_text) > 115) ? substr($clean_text, 0, 115) . '...' : $clean_text;
            ?>
            <!-- Single Dynamic Blog Card -->
            <div class="col-lg-4 col-md-6 col-custom mb-4">
                <div class="single-blog-card">
                    <div class="blog-image">
                        <a href="blog-details.php?id=<?php echo $blog['id']; ?>">
                            <img src="<?php echo $blog_img_path; ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="img-fluid w-100">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="date"><i class="fa fa-calendar"></i> <?php echo $formatted_date; ?></span>
                            <span class="category"><i class="fa fa-folder"></i> Export Trends</span>
                        </div>
                        <h4 class="blog-title">
                            <a href="blog-details.php?id=<?php echo $blog['id']; ?>">
                                <?php echo htmlspecialchars($blog['title']); ?>
                            </a>
                        </h4>
                        <p class="blog-excerpt">
                            <?php echo htmlspecialchars($excerpt); ?>
                        </p>
                        <a href="blog-details.php?id=<?php echo $blog['id']; ?>" class="read-more-btn">
                            READ MORE <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php 
                endwhile;
            else:
            ?>
                <!-- Empty State -->
                <div class="col-12 text-center py-5">
                    <h5 class="text-muted">No news or trade insights published yet.</h5>
                </div>
            <?php endif; ?>
        </div>

        <!-- =========================================================
             DYNAMIC PAGINATION SECTION
             ========================================================= -->
        <?php if ($total_pages > 1) : ?>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <div class="premium-pagination">
                    <ul class="d-inline-flex align-items-center">
                        
                        <!-- Previous Page Button -->
                        <?php if ($page > 1) : ?>
                            <li>
                                <a href="blog.php?page=<?php echo ($page - 1); ?>" class="page-link next-btn">
                                    <i class="fa fa-angle-left"></i> PREV
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Page Number Loops -->
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li>
                                <a href="blog.php?page=<?php echo $i; ?>" class="page-link <?php echo ($page == $i) ? 'active' : ''; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next Page Button -->
                        <?php if ($page < $total_pages) : ?>
                            <li>
                                <a href="blog.php?page=<?php echo ($page + 1); ?>" class="page-link next-btn">
                                    NEXT <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>

<?php include ("./include/footer.php"); ?>