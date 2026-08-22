<?php 
include ("./admin/db-conn.php");
include ("./include/header.php");

$cat_id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 0;

$cat_query = "SELECT * FROM categories WHERE id = $cat_id AND status = 1";
$cat_result = mysqli_query($conn, $cat_query);

if (!$cat_result || mysqli_num_rows($cat_result) == 0) {
    echo "<div class='container py-5 text-center'><h3>Category Not Found!</h3><a href='products.php' class='obrien-button premium-btn mt-3'>View All Products</a></div>";
    include ("./include/footer.php");
    exit;
}

$category_data = mysqli_fetch_assoc($cat_result);
$cat_name = $category_data['categories'];

// Dynamic Props for Breadcrumb
$page_title = $cat_name . " Commodities";
$breadcrumb_links = [
    "Home" => "index.php",
    "Products" => "products.php"
];

include ("./include/breadcrumb.php");

// 2. PHP PAGINATION FOR SELECTED CATEGORY

$limit = 8; // 8 products per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $limit;

// Count total records in this category
$count_query = "SELECT COUNT(*) AS total FROM products WHERE status = 1 AND (pro_cate = $cat_id OR pro_sub_cate = $cat_id)";
$count_result = mysqli_query($conn, $count_query);
$total_records = 0;
if ($count_result) {
    $count_row = mysqli_fetch_assoc($count_result);
    $total_records = $count_row['total'];
}
$total_pages = ceil($total_records / $limit);
?>

<!-- CATEGORY COMMODITIES AREA (4-COLUMN B2B GRID) -->
<div class="products-listing-area section-padding pt-5">
    <div class="container container-default custom-area">
        
        <!-- Category Banner Heading -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="section-title">
                    <span class="sub-title badge-title mb-2 d-inline-block">CATEGORY COMMODITIES</span>
                    <h2 class="title"><?php echo strtoupper(htmlspecialchars($cat_name)); ?> EXPORTS</h2>
                    <p class="desc">
                        Explore our premium grade <?php echo htmlspecialchars($cat_name); ?>, sortex-cleaned and moisture-packed for global ocean shipping.
                    </p>
                </div>
            </div>
        </div>

        <!-- 4-Column Product Grid -->
        <div class="row">
            <?php 
            // Query: Fetch products belonging to this category
            $pro_query = "SELECT * FROM products WHERE status = 1 AND (pro_cate = $cat_id OR pro_sub_cate = $cat_id) ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $pro_result = mysqli_query($conn, $pro_query);

            if ($pro_result && mysqli_num_rows($pro_result) > 0) :
                while ($row = mysqli_fetch_assoc($pro_result)) :
                    
                    // Image Path Handling
                    $img_path = !empty($row['pro_img']) 
                                ? "admin/assets/img/uploads/" . htmlspecialchars($row['pro_img']) 
                                : "assets/images/product/medium-size/default.png";
                    
                    // Stock Status Logic
                    $stock_qty = isset($row['stock']) ? (int)$row['stock'] : 1;
                    $stock_class = ($stock_qty > 10) ? "in-stock" : "limited-stock";
                    $stock_icon  = ($stock_qty > 10) ? "fa-circle-check" : "fa-circle-exclamation";
                    $stock_text  = ($stock_qty > 10) ? "In Stock" : "Low Stock";

                    // Category Tag Logic
                    $category_tag = !empty($row['product_type']) ? strtoupper($row['product_type']) : strtoupper($cat_name);

                    // Price Formatting
                    $price = !empty($row['selling_price']) ? number_format($row['selling_price'], 2) : "0.00";
            ?>
            <!-- Single Dynamic Product Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-custom mb-4">
                <div class="b2b-product-card">
                    <div class="product-image">
                        <div class="img-meta-tags">
                            <span class="category-tag"><?php echo htmlspecialchars($category_tag); ?></span>
                            <span class="stock-tag <?php echo $stock_class; ?>">
                                <i class="fa-solid <?php echo $stock_icon; ?>"></i> <?php echo $stock_text; ?>
                            </span>
                        </div>
                        <a href="product-details.php?id=<?php echo $row['id']; ?>">
                            <img src="<?php echo $img_path; ?>" alt="<?php echo htmlspecialchars($row['pro_name']); ?>" class="w-100 img-fluid">
                        </a>
                    </div>
                    <div class="product-content">
                        <div class="product-rating">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                            <span class="rating-count">(4.8)</span>
                        </div>
                        <h4 class="product-title">
                            <a href="product-details.php?id=<?php echo $row['id']; ?>">
                                <?php echo htmlspecialchars($row['pro_name']); ?>
                            </a>
                        </h4>
                        <ul class="product-tech-details">
                            <li><span>Packaging:</span> Export Standard Bags</li>
                            <li><span>MOQ:</span> 5 Metric Tons</li>
                            <li><span>Origin:</span> India</li>
                        </ul>
                        <div class="price-action-wrapper">
                            <div class="price-box">
                                <span class="current-price">₹<?php echo $price; ?></span><span class="price-unit"> / Ton</span>
                            </div>
                            <a href="product-details.php?id=<?php echo $row['id']; ?>" class="add-to-quote-btn" title="Request Quote">
                                <i class="fa-solid fa-basket-shopping"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                endwhile;
            else:
            ?>
                <!-- Empty State Message -->
                <div class="col-12 text-center py-5">
                    <h5 class="text-muted">No export commodities found under "<?php echo htmlspecialchars($cat_name); ?>" yet.</h5>
                    <a href="products.php" class="obrien-button premium-btn mt-3">View All Commodities</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- =========================================================
             DYNAMIC PAGINATION FOR CATEGORY PAGE
             ========================================================= -->
        <?php if ($total_pages > 1) : ?>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <div class="premium-pagination">
                    <ul class="d-inline-flex align-items-center">
                        
                        <!-- Previous Page Button -->
                        <?php if ($page > 1) : ?>
                            <li>
                                <a href="category-products.php?id=<?php echo $cat_id; ?>&page=<?php echo ($page - 1); ?>" class="page-link next-btn">
                                    <i class="fa fa-angle-left"></i> PREV
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Page Number Loops -->
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li>
                                <a href="category-products.php?id=<?php echo $cat_id; ?>&page=<?php echo $i; ?>" class="page-link <?php echo ($page == $i) ? 'active' : ''; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next Page Button -->
                        <?php if ($page < $total_pages) : ?>
                            <li>
                                <a href="category-products.php?id=<?php echo $cat_id; ?>&page=<?php echo ($page + 1); ?>" class="page-link next-btn">
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