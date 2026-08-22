<?php 
include ("./admin/db-conn.php");
include ("./include/header.php");

//  1. FETCH PRODUCT DATA BY ID FROM DATABASE

$pro_id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 0;

$pro_query = "SELECT * FROM products WHERE id = $pro_id AND status = 1";
$pro_result = mysqli_query($conn, $pro_query);

if (!$pro_result || mysqli_num_rows($pro_result) == 0) {
    echo "<div class='container py-5 text-center'><h3>Product Not Found!</h3><a href='products.php' class='obrien-button premium-btn mt-3'>Back to Products</a></div>";
    include ("./include/footer.php");
    exit;
}

$product = mysqli_fetch_assoc($pro_result);

// Dynamic Props for Breadcrumb
$page_title = $product['pro_name'];
$breadcrumb_links = [
    "Home" => "index.php",
    "Products" => "products.php"
];

include ("./include/breadcrumb.php");

// Image Path Setup
$img_path = !empty($product['pro_img']) 
            ? "admin/assets/img/uploads/" . htmlspecialchars($product['pro_img']) 
            : "assets/images/product/medium-size/default.png";

// Stock & Category Setup
$stock_qty = isset($product['stock']) ? (int)$product['stock'] : 1;
$stock_class = ($stock_qty > 10) ? "in-stock" : "limited-stock";
$stock_icon  = ($stock_qty > 10) ? "fa-circle-check" : "fa-circle-exclamation";
$stock_text  = ($stock_qty > 10) ? "Export Ready Stock" : "Limited Stock";

$category_tag = !empty($product['product_type']) ? strtoupper($product['product_type']) : "AGRI COMMODITY";
$price = !empty($product['selling_price']) ? number_format($product['selling_price'], 2) : "0.00";
?>

<!-- PRODUCT HERO & QUOTE DESK SECTION (DYNAMIC) -->
<div class="product-details-area section-padding pt-5">
    <div class="container container-default custom-area">
        <div class="row align-items-center">
            
            <!-- Left: Dynamic Image -->
            <div class="col-lg-6 col-md-12 col-custom mb-5 mb-lg-0">
                <div class="product-detail-image-wrap">
                    <div class="main-gallery-image rounded-image overflow-hidden border mb-3">
                        <img src="<?php echo $img_path; ?>" alt="<?php echo htmlspecialchars($product['pro_name']); ?>" class="img-fluid w-100" style="height: 440px; object-fit: cover;">
                    </div>
                </div>
            </div>

            <!-- Right: Dynamic B2B Specifications & Price Action -->
            <div class="col-lg-6 col-md-12 col-custom">
                <div class="product-detail-content">
                    
                    <!-- Badges -->
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="category-tag"><?php echo htmlspecialchars($category_tag); ?></span>
                        <span class="stock-tag <?php echo $stock_class; ?>">
                            <i class="fa-solid <?php echo $stock_icon; ?>"></i> <?php echo $stock_text; ?>
                        </span>
                    </div>

                    <h1 class="detail-product-title"><?php echo htmlspecialchars($product['pro_name']); ?></h1>
                    
                    <div class="product-rating mb-3">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        <span class="rating-count ms-2">(4.9 / 5 - Global Export Standard)</span>
                    </div>

                    <div class="detail-price-box my-3 p-3 rounded">
                        <span class="current-price">₹<?php echo $price; ?></span>
                        <span class="price-unit"> / Metric Ton (FOB India Port)</span>
                        <p class="text-muted mb-0 mt-1" style="font-size: 13px;">*Prices vary based on moisture level, packaging, and current mandi rates.</p>
                    </div>

                    <!-- Quick B2B Highlights Grid -->
                    <div class="b2b-quick-specs my-4">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="spec-tile">
                                    <span class="label">SKU / Code:</span>
                                    <span class="val font-weight-bold"><?php echo !empty($product['sku']) ? htmlspecialchars($product['sku']) : "MCI-" . $product['id']; ?></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="spec-tile">
                                    <span class="label">Country of Origin:</span>
                                    <span class="val font-weight-bold">India</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="spec-tile">
                                    <span class="label">Minimum Order (MOQ):</span>
                                    <span class="val font-weight-bold">5 Metric Tons</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="spec-tile">
                                    <span class="label">Port of Loading:</span>
                                    <span class="val font-weight-bold">Mundra / Nhava Sheva</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-short-desc text-muted mb-4">
                        <?php 
                        // Show short description if available
                        echo !empty($product['short_desc']) ? $product['short_desc'] : "High-purity export-grade agricultural commodity procured directly from certified Indian farms."; 
                        ?>
                    </div>

                    <!-- Instant Bulk Action Buttons -->
                    <div class="action-buttons d-flex flex-wrap gap-3">
                        <a href="contact.php?product=<?php echo urlencode($product['pro_name']); ?>" class="obrien-button premium-btn flex-grow-1 text-center">
                            Request CIF / FOB Quote <i class="fa-solid fa-paper-plane ms-2"></i>
                        </a>
                        <a href="https://wa.me/918140965033?text=<?php echo urlencode('Hello, I need an export quote for: ' . $product['pro_name']); ?>" target="_blank" class="wa-btn text-center d-flex align-items-center justify-content-center px-4">
                            <i class="fa-brands fa-whatsapp me-2"></i> WhatsApp Desk
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- 2. DYNAMIC DESCRIPTION TABS AREA -->
<div class="product-tabs-area pb-5">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-12">
                
                <ul class="nav nav-tabs custom-b2b-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab">Detailed Overview & Specs</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab">Packaging & Container Load</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="cert-tab" data-bs-toggle="tab" data-bs-target="#cert" type="button" role="tab">Certifications</button>
                    </li>
                </ul>

                <div class="tab-content border rounded p-4 bg-white shadow-sm" id="myTabContent">
                    <!-- TAB 1: DB Full Description -->
                    <div class="tab-pane fade show active" id="desc" role="tabpanel">
                        <?php 
                        if (!empty($product['description'])) {
                            echo $product['description']; // Output HTML formatting from database
                        } else {
                            echo "<p>Complete technical specifications and product brochure available upon official email inquiry.</p>";
                        }
                        ?>
                    </div>

                    <!-- TAB 2: Standard Packaging -->
                    <div class="tab-pane fade" id="shipping" role="tabpanel">
                        <h4 class="mb-3 font-weight-bold">Custom Export Packaging & Ocean Logistics</h4>
                        <p class="text-muted">We provide customized labeling and moisture-proof packaging to ensure zero deterioration during sea transit.</p>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item"><strong>Available Pack Sizes:</strong> 10kg, 25kg, 50kg New PP Bags / Jute Bags / Multi-wall Paper Bags.</li>
                            <li class="list-group-item"><strong>20ft Container Capacity:</strong> Approximately 13 to 14 Metric Tons.</li>
                            <li class="list-group-item"><strong>40ft Container Capacity:</strong> Approximately 26 to 28 Metric Tons.</li>
                        </ul>
                    </div>

                    <!-- TAB 3: Standard Certifications -->
                    <div class="tab-pane fade" id="cert" role="tabpanel">
                        <h4 class="mb-3 font-weight-bold">Global Regulatory Compliance</h4>
                        <p>Every shipment from Manas Crest International is accompanied by mandatory trade certificates: Phytosanitary Certificate, Certificate of Origin, SGS / Third-Party Quality Inspection, and Fumigation Certificate.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- 3. DYNAMIC RELATED PRODUCTS CAROUSEL (BOTTOM) -->
<div class="related-products-area section-padding py-5 bg-light-theme">
    <div class="container container-default custom-area">
        
        <div class="row mb-4">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h2 class="title">RELATED EXPORT COMMODITIES</h2>
                    <p class="desc">Explore other high-demand export products from Manas Crest International.</p>
                </div>
            </div>
        </div>

        <!-- Carousel Wrapper -->
        <div class="row">
            <div class="col-12">
                <div class="related-product-slider">
                    <?php 
                    // Query: Same category ke active products laao (current product ko chhod ke)
                    $cat_id = isset($product['pro_cate']) ? (int)$product['pro_cate'] : 0;
                    $rel_query = "SELECT * FROM products WHERE status = 1 AND id != $pro_id ";
                    if ($cat_id > 0) {
                        $rel_query .= " AND pro_cate = $cat_id ";
                    }
                    $rel_query .= " ORDER BY id DESC LIMIT 8";
                    
                    $rel_result = mysqli_query($conn, $rel_query);

                    // Agar related me kam products hon toh bina category filter ke latest le aao
                    if (!$rel_result || mysqli_num_rows($rel_result) < 3) {
                        $rel_query = "SELECT * FROM products WHERE status = 1 AND id != $pro_id ORDER BY id DESC LIMIT 8";
                        $rel_result = mysqli_query($conn, $rel_query);
                    }

                    if ($rel_result && mysqli_num_rows($rel_result) > 0) :
                        while ($rel = mysqli_fetch_assoc($rel_result)) :
                            
                            $rel_img = !empty($rel['pro_img']) 
                                       ? "admin/assets/img/uploads/" . htmlspecialchars($rel['pro_img']) 
                                       : "assets/images/product/medium-size/default.png";
                            
                            $rel_price = !empty($rel['selling_price']) ? number_format($rel['selling_price'], 2) : "0.00";
                            $rel_cat   = !empty($rel['product_type']) ? strtoupper($rel['product_type']) : "AGRI COMMODITY";
                    ?>
                    <!-- Single Carousel Item -->
                    <div class="px-2">
                        <div class="b2b-product-card mb-3">
                            <div class="product-image">
                                <div class="img-meta-tags">
                                    <span class="category-tag"><?php echo htmlspecialchars($rel_cat); ?></span>
                                    <span class="stock-tag in-stock"><i class="fa-solid fa-check-circle"></i> Ready</span>
                                </div>
                                <a href="product-details.php?id=<?php echo $rel['id']; ?>">
                                    <img src="<?php echo $rel_img; ?>" alt="<?php echo htmlspecialchars($rel['pro_name']); ?>" class="w-100 img-fluid">
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="product-rating">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <span class="rating-count">(4.9)</span>
                                </div>
                                <h4 class="product-title">
                                    <a href="product-details.php?id=<?php echo $rel['id']; ?>">
                                        <?php echo htmlspecialchars($rel['pro_name']); ?>
                                    </a>
                                </h4>
                                <ul class="product-tech-details">
                                    <li><span>Packaging:</span> Export Bulk Bags</li>
                                    <li><span>MOQ:</span> 5 Metric Tons</li>
                                </ul>
                                <div class="price-action-wrapper">
                                    <div class="price-box">
                                        <span class="current-price">₹<?php echo $rel_price; ?></span>
                                        <span class="price-unit">/ Ton</span>
                                    </div>
                                    <a href="product-details.php?id=<?php echo $rel['id']; ?>" class="add-to-quote-btn" title="Request Quote">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                    endif; 
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include ("./include/footer.php"); ?>

<!-- 4. SLICK CAROUSEL INITIALIZATION SCRIPT (FOR RELATED PRODUCTS) -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Check if jQuery and slick are loaded
    if (typeof $ !== 'undefined' && $.fn.slick) {
        $('.related-product-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            dots: false,
            autoplay: true,
            autoplaySpeed: 4000,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: { slidesToShow: 3 }
                },
                {
                    breakpoint: 991,
                    settings: { slidesToShow: 2 }
                },
                {
                    breakpoint: 575,
                    settings: { 
                        slidesToShow: 1,
                        arrows: false,
                        dots: true 
                    }
                }
            ]
        });
    }
});
</script>