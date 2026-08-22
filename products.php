<?php 
include ("admin/db-conn.php");
$page_title = "Our Export Commodities";
$breadcrumb_links = [
    "Home" => "index.php"
];

include ("./include/header.php");
include ("./include/breadcrumb.php");

// 1. GET SELECTED CATEGORY FILTER

$selected_cat = isset($_GET['cat_id']) && is_numeric($_GET['cat_id']) ? (int)$_GET['cat_id'] : 0;

$where_sql = "WHERE status = 1";
if ($selected_cat > 0) {
    $where_sql .= " AND pro_cate = $selected_cat";
}

//  2. PHP PAGINATION LOGIC (FILTER AWARE)

$limit = 12; // 12 products per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $limit;

$count_query = "SELECT COUNT(*) AS total FROM products $where_sql";
$count_result = mysqli_query($conn, $count_query);
$total_records = 0;
if ($count_result) {
    $count_row = mysqli_fetch_assoc($count_result);
    $total_records = $count_row['total'];
}
$total_pages = ceil($total_records / $limit);

$cat_url_param = ($selected_cat > 0) ? "&cat_id=" . $selected_cat : "";
?>

<div class="products-listing-area section-padding pt-5">
    <div class="container container-default custom-area">
        
        <!-- 3. DYNAMIC CATEGORY FILTER PILLS (FROM DB) -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="blog-category-pills">
                    
                    <!-- 'All Commodities' Tab -->
                    <a href="products.php" class="pill-btn <?php echo ($selected_cat == 0) ? 'active' : ''; ?>">
                        All Commodities
                    </a>

                    <?php 
                    // Fetch Active Categories from Database
                    $cat_query = "SELECT * FROM categories WHERE status = 1 ORDER BY id ASC";
                    $cat_result = mysqli_query($conn, $cat_query);

                    if ($cat_result && mysqli_num_rows($cat_result) > 0) :
                        while ($cat = mysqli_fetch_assoc($cat_result)) :
                            $is_active = ($selected_cat == $cat['id'] || $selected_cat == $cat['cate_id']) ? "active" : "";
                    ?>
                        <!-- Single Dynamic Category Pill -->
                        <a href="products.php?cat_id=<?php echo $cat['id']; ?>" class="pill-btn <?php echo $is_active; ?>">
                            <?php echo htmlspecialchars($cat['categories']); ?>
                        </a>
                    <?php 
                        endwhile;
                    endif; 
                    ?>

                </div>
            </div>
        </div>

        <!-- 4. DYNAMIC 4-COLUMN PRODUCT GRID (FILTERED) -->
        <div class="row">
            <?php 
            // Fetch products using dynamic WHERE clause and Pagination
            $pro_query = "SELECT * FROM products $where_sql ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $pro_result = mysqli_query($conn, $pro_query);

            if ($pro_result && mysqli_num_rows($pro_result) > 0) :
                while ($row = mysqli_fetch_assoc($pro_result)) :
                    
                    // Correct Image Path Handling
                    $img_path = !empty($row['pro_img']) 
                                ? "admin/assets/img/uploads/" . htmlspecialchars($row['pro_img']) 
                                : "assets/images/product/medium-size/default.png";
                    
                    // Stock Status Logic
                    $stock_qty = isset($row['stock']) ? (int)$row['stock'] : 1;
                    $stock_class = ($stock_qty > 10) ? "in-stock" : "limited-stock";
                    $stock_icon  = ($stock_qty > 10) ? "fa-circle-check" : "fa-circle-exclamation";
                    $stock_text  = ($stock_qty > 10) ? "In Stock" : "Low Stock";

                    // Category Tag Logic
                    $category_tag = !empty($row['product_type']) ? strtoupper($row['product_type']) : "AGRI COMMODITY";

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
                            <li><span>Packaging:</span> 50kg Export Bags</li>
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
                <!-- Empty State Message when no products are in that category -->
                <div class="col-12 text-center py-5">
                    <h5 class="text-muted">No export commodities found in this category.</h5>
                    <a href="products.php" class="obrien-button premium-btn mt-3">View All Commodities</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- 5. DYNAMIC PAGINATION (CATEGORY AWARE) -->
        <?php if ($total_pages > 1) : ?>
        <div class="row mt-4 pb-5">
            <div class="col-12 text-center">
                <div class="premium-pagination">
                    <ul class="d-inline-flex align-items-center">
                        
                        <!-- Previous Page Button -->
                        <?php if ($page > 1) : ?>
                            <li>
                                <a href="products.php?page=<?php echo ($page - 1) . $cat_url_param; ?>" class="page-link next-btn">
                                    <i class="fa fa-angle-left"></i> PREV
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Page Number Loops -->
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li>
                                <a href="products.php?page=<?php echo $i . $cat_url_param; ?>" class="page-link <?php echo ($page == $i) ? 'active' : ''; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next Page Button -->
                        <?php if ($page < $total_pages) : ?>
                            <li>
                                <a href="products.php?page=<?php echo ($page + 1) . $cat_url_param; ?>" class="page-link next-btn">
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