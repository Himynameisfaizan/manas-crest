<?php
include("./admin/db-conn.php");
include("./include/header.php");

if (!isset($conn)) {
    $conn = mysqli_connect("localhost", "root", "", "rudra");
    if (!$conn) {
        die("Database Connection Failed: " . mysqli_connect_error());
    }
}
?>

<!-- Hero Slider Area Start -->
<div class="slider-area premium-hero-slider">
    <div class="obrien-slider arrow-style" data-slick-options='{
        "slidesToShow": 1,
        "slidesToScroll": 1,
        "infinite": true,
        "arrows": true,
        "dots": true,
        "autoplay" : true,
        "fade" : true,
        "autoplaySpeed" : 6000,
        "pauseOnHover" : false,
        "pauseOnFocus" : false
        }' data-slick-responsive='[
        {"breakpoint":992, "settings": {
        "slidesToShow": 1,
        "arrows": false,
        "dots": true
        }}
        ]'>

        <!-- Slide Item 1 -->
        <!-- Apni background image yahan 'style' tag mein add karein -->
        <div class="slide-item slide-1 bg-position animation-style-01"
            style="background-image: url('assets/images/slider/p-1-banner.png');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-content premium-slider-content">
                            <span class="slider-small-title badge-title">100% Organic & Natural</span>
                            <h2 class="slider-large-title">Premium Quality <br> Agricultural Exports</h2>
                            <p class="slider-desc">Delivering the finest Potato, Onion, Cumin Seeds, and Castor Oil to
                                the global market with unmatched quality standards.</p>
                            <div class="slider-btn">
                                <a class="obrien-button premium-btn" href="#">Explore Products <i
                                        class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide Item 2 -->
        <div class="slide-item slide-2 bg-position animation-style-01"
            style="background-image: url('assets/images/slider/p-1-banner.png');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-content premium-slider-content">
                            <span class="slider-small-title badge-title">Certified & Trusted</span>
                            <h2 class="slider-large-title">Sustainably Sourced <br> Globally Trusted</h2>
                            <p class="slider-desc">Top-grade Pearl Millet, Maize, Mung Beans, and Organic Fertilizers
                                straight from nature to your business.</p>
                            <div class="slider-btn">
                                <a class="obrien-button premium-btn" href="#">Get a Quote <i
                                        class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Premium Features Area Start (Delivery, Quality, Support) -->
<div class="premium-features-area">
    <div class="container container-default custom-area">
        <div class="row align-items-center">

            <!-- Feature 1 -->
            <div class="col-md-4 col-lg-4 col-custom feature-border">
                <div class="premium-feature-item d-flex align-items-center">
                    <div class="feature-icon">
                        <!-- Icon image (Ensure your icon color matches the green theme) -->
                        <img src="assets/images/icons/icon-1.png" alt="Fast Delivery Icon">
                    </div>
                    <div class="feature-info">
                        <h3 class="feature-title">Fast Global Delivery</h3>
                        <p class="feature-desc">Timely & secure logistics for all international bulk orders.</p>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-md-4 col-lg-4 col-custom feature-border">
                <div class="premium-feature-item d-flex align-items-center">
                    <div class="feature-icon">
                        <img src="assets/images/icons/icon-2.png" alt="Quality Standard Icon">
                    </div>
                    <div class="feature-info">
                        <h3 class="feature-title">Certified Quality</h3>
                        <p class="feature-desc">100% natural, sorted, and globally certified agricultural products.</p>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-md-4 col-lg-4 col-custom">
                <div class="premium-feature-item d-flex align-items-center">
                    <div class="feature-icon">
                        <img src="assets/images/icons/icon-3.png" alt="24/7 Support Icon">
                    </div>
                    <div class="feature-info">
                        <h3 class="feature-title">24/7 B2B Support</h3>
                        <p class="feature-desc">Dedicated account managers to assist with your trading queries.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Premium Features Area End -->

<!-- Premium Banner Area Start -->
<div class="premium-banner-area">
    <div class="container container-default custom-area">
        <div class="row">

            <!-- Banner 1 -->
            <div class="col-md-4 col-sm-12 col-custom mb-4 mb-md-0">
                <div class="premium-banner-card">
                    <a href="#" class="d-block overflow-hidden">
                        <img class="w-100 img-fluid" src="assets/images/banner/small-banner/2.1.png"
                            alt="Fresh Potato Category">
                        <div class="banner-overlay"></div>
                    </a>
                </div>
            </div>

            <!-- Banner 2 -->
            <div class="col-md-4 col-sm-12 col-custom mb-4 mb-md-0">
                <div class="premium-banner-card">
                    <a href="#" class="d-block overflow-hidden">
                        <img class="w-100 img-fluid" src="assets/images/banner/small-banner/2.2.png"
                            alt="Onion Category">
                        <div class="banner-overlay"></div>
                    </a>
                </div>
            </div>

            <!-- Banner 3 -->
            <div class="col-md-4 col-sm-12 col-custom">
                <div class="premium-banner-card">
                    <a href="#" class="d-block overflow-hidden">
                        <img class="w-100 img-fluid" src="assets/images/banner/small-banner/2.3.png"
                            alt="Cumin Seeds Category">
                        <div class="banner-overlay"></div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Premium B2B Product Area Start -->
<div class="best-sale-area section-padding py-5">
    <div class="container container-default custom-area">

        <!-- Section Title -->
        <div class="row py-3">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h2 class="title">TOP EXPORT PRODUCTS</h2>
                    <p class="desc">Premium grade agricultural commodities sourced directly from the best farms.</p>
                </div>
            </div>
        </div>

        <!-- Dynamic Product Grid -->
        <div class="row">
            <?php
            // Query: Fetch Active Products
            $pro_query = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT 4";
            $pro_result = mysqli_query($conn, $pro_query);

            if ($pro_result && mysqli_num_rows($pro_result) > 0):
                while ($row = mysqli_fetch_assoc($pro_result)):

                    // 1. Correct Image Path according to your Admin Folder structure
                    $img_path = !empty($row['pro_img'])
                        ? "admin/assets/img/uploads/" . htmlspecialchars($row['pro_img'])
                        : "assets/images/product/medium-size/default.png";

                    // 2. Stock Status Logic
                    $stock_qty = isset($row['stock']) ? (int) $row['stock'] : 1;
                    $stock_class = ($stock_qty > 10) ? "in-stock" : "limited-stock";
                    $stock_icon = ($stock_qty > 10) ? "fa-check-circle" : "fa-exclamation-circle";
                    $stock_text = ($stock_qty > 10) ? "In Stock" : "Low Stock";

                    // 3. Category Type logic
                    $category_tag = !empty($row['product_type']) ? strtoupper($row['product_type']) : "AGRI COMMODITY";

                    // 4. Price handling (Ensuring selling_price shows properly)
                    $price = !empty($row['selling_price']) ? number_format($row['selling_price'], 2) : "0.00";
                    ?>
                    <!-- Dynamic Single Product Card -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-custom mb-4">
                        <div class="b2b-product-card">
                            <div class="product-image">
                                <!-- Meta Tags on Image -->
                                <div class="img-meta-tags">
                                    <span class="category-tag"><?php echo htmlspecialchars($category_tag); ?></span>
                                    <span class="stock-tag <?php echo $stock_class; ?>">
                                        <i class="fa <?php echo $stock_icon; ?>"></i> <?php echo $stock_text; ?>
                                    </span>
                                </div>
                                <a href="product-details.php?id=<?php echo $row['id']; ?>">
                                    <img src="<?php echo $img_path; ?>" alt="<?php echo htmlspecialchars($row['pro_name']); ?>"
                                        class="w-100 img-fluid object-fit-cover">
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="product-rating">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                                    <span class="rating-count">(4.8)</span>
                                </div>
                                <h4 class="product-title">
                                    <a href="product-details.php?id=<?php echo $row['id']; ?>">
                                        <?php echo htmlspecialchars($row['pro_name']); ?>
                                    </a>
                                </h4>

                                <!-- B2B Technical Details -->
                                <ul class="product-tech-details">
                                    <li><span>Packaging:</span> 50kg Jute/PP Bags</li>
                                    <li><span>MOQ:</span> 5 Metric Tons</li>
                                    <li><span>Origin:</span> India</li>
                                </ul>

                                <div class="price-action-wrapper">
                                    <div class="price-box">
                                        <span class="current-price">₹<?php echo $price; ?></span>
                                        <span class="price-unit">/ Ton</span>
                                    </div>
                                    <a href="product-details.php?id=<?php echo $row['id']; ?>" class="add-to-quote-btn"
                                        title="Add to Quote">
                                        <i class="fa fa-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            else:
                ?>
                <div class="col-12 text-center py-4">
                    <p class="text-muted">No export products available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Premium B2B Product Area End -->

<!-- PROMO BANNER AREA  -->
<div class="promo-banner-area section-padding py-5">
    <div class="container container-default custom-area">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-custom">
                <div class="promo-content">
                    <h2 class="title">Sustainable & Global Standard Farming</h2>
                    <p class="desc">We partner directly with farms to ensure high-quality cultivation. Our
                        state-of-the-art sorting and packaging facilities guarantee that only the finest produce reaches
                        the global market safely.</p>
                    <a href="#" class="obrien-button premium-btn">Discover Our Process</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-custom mt-5 mt-md-0">
                <div class="promo-image text-center">
                    <img src="assets/images/feature/feature-2.jpg" alt="Global Standards"
                        class="img-fluid w-100 rounded-image">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FLASH DEAL / SEASONAL BULK OFFER  -->
<div class="flash-deal-area section-padding bg-light-theme py-5">
    <div class="container container-default custom-area">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 col-custom">
                <div class="deal-image">
                    <img src="assets/images/banner/thumb/1.png" alt="Fresh Harvest" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-custom text-center text-md-left">
                <div class="deal-content">
                    <h4 class="sub-title">SEASONAL HARVEST</h4>
                    <h2 class="main-title">Pre-Book Onion & Potato Bulk Orders</h2>
                    <p class="discount-text">Get exclusive rates on advance booking.</p>

                    <!-- Countdown Wrapper (Can be made dynamic via JS) -->
                    <div class="countdown-wrapper d-flex justify-content-center justify-content-md-center">
                        <div class="single-countdown"><span class="count">15</span><span class="text">Days</span></div>
                        <div class="single-countdown"><span class="count">08</span><span class="text">Hours</span></div>
                        <div class="single-countdown"><span class="count">45</span><span class="text">Mins</span></div>
                        <div class="single-countdown"><span class="count">30</span><span class="text">Secs</span></div>
                    </div>

                    <a href="#" class="obrien-button premium-btn mt-4">Request Quote</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Second Product Section: Featured / Trending Commodities -->
<div class="featured-products-area section-padding py-5 bg-light-theme">
    <div class="container container-default custom-area">
        <div class="row py-3">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h2 class="title">FEATURED COMMODITIES</h2>
                    <p class="desc">High-demand sortex-cleaned Indian produce ready for immediate global dispatch.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            // Second Section Query: Check trending or get next set of products
            $feat_query = "SELECT * FROM products WHERE status = 1 AND trending = 1 ORDER BY id DESC LIMIT 4";
            $feat_result = mysqli_query($conn, $feat_query);

            // Fallback: Agar trending = 1 wale products na milein toh random 4 fetch kar lo
            if (!$feat_result || mysqli_num_rows($feat_result) == 0) {
                $feat_query = "SELECT * FROM products WHERE status = 1 ORDER BY RAND() LIMIT 4";
                $feat_result = mysqli_query($conn, $feat_query);
            }

            if ($feat_result && mysqli_num_rows($feat_result) > 0):
                while ($row = mysqli_fetch_assoc($feat_result)):
                    $img_name = !empty($row['pro_img']) ? $row['pro_img'] : '';
                    $img_path = !empty($row['pro_img'])
                        ? "admin/assets/img/uploads/" . htmlspecialchars($row['pro_img'])
                        : "assets/images/product/medium-size/default.png";
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-custom mb-4">
                        <div class="b2b-product-card">
                            <div class="product-image">
                                <div class="img-meta-tags">
                                    <span class="category-tag">FEATURED</span>
                                    <span class="stock-tag in-stock"><i class="fa fa-check-circle"></i> Export Ready</span>
                                </div>
                                <a href="product-details.php?id=<?php echo $row['id']; ?>">
                                    <img src="<?php echo $img_path; ?>" alt="<?php echo htmlspecialchars($row['pro_name']); ?>"
                                        class="w-100 img-fluid">
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="product-rating">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                    <span class="rating-count">(5.0)</span>
                                </div>
                                <h4 class="product-title">
                                    <a href="product-details.php?id=<?php echo $row['id']; ?>">
                                        <?php echo htmlspecialchars($row['pro_name']); ?>
                                    </a>
                                </h4>

                                <ul class="product-tech-details">
                                    <li><span>Packaging:</span> Bulk PP / Jute Bags</li>
                                    <li><span>MOQ:</span> 10 Metric Tons</li>
                                    <li><span>Grade:</span> 99.5% Sortex</li>
                                </ul>

                                <div class="price-action-wrapper">
                                    <div class="price-box">
                                        <span
                                            class="current-price">₹<?php echo number_format($row['selling_price'], 2); ?></span>
                                        <span class="price-unit">/ Ton</span>
                                    </div>
                                    <a href="product-details.php?id=<?php echo $row['id']; ?>" class="add-to-quote-btn"
                                        title="Add to Quote">
                                        <i class="fa fa-shopping-basket"></i>
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

<!-- Dynamic Blog / Market Insights Area Start -->
<div class="blog-area section-padding py-5">
    <div class="container container-default custom-area">
        <div class="row py-3">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h2 class="title">MARKET INSIGHTS & NEWS</h2>
                    <p class="desc">Stay updated with Indian commodity harvests, pricing trends, and export regulations.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            // Query: Fetch latest 3 published blogs
            $blog_query = "SELECT * FROM blogs WHERE status = 'published' ORDER BY id DESC LIMIT 3";
            $blog_result = mysqli_query($conn, $blog_query);

            if ($blog_result && mysqli_num_rows($blog_result) > 0):
                while ($blog = mysqli_fetch_assoc($blog_result)):

                    // FIXED: Changed $row to $blog and column name to 'image' (singular as per DB schema)
                    $blog_img_path = !empty($blog['image'])
                        ? "admin/assets/img/uploads/" . htmlspecialchars($blog['image'])
                        : "assets/images/product/medium-size/default.png";

                    // Date formatting
                    $formatted_date = date("d M, Y", strtotime($blog['created_at']));

                    // Excerpt (110 characters text limit)
                    $clean_text = strip_tags($blog['content']);
                    $excerpt = (strlen($clean_text) > 110) ? substr($clean_text, 0, 110) . '...' : $clean_text;
                    ?>
                    <!-- Single Dynamic Blog Card -->
                    <div class="col-lg-4 col-md-6 col-custom mb-4">
                        <div class="single-blog-card">
                            <div class="blog-image">
                                <a href="blog-details.php?id=<?php echo $blog['id']; ?>">
                                    <img src="<?php echo $blog_img_path; ?>"
                                        alt="<?php echo htmlspecialchars($blog['title']); ?>" class="img-fluid w-100">
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
                <div class="col-12 text-center py-4">
                    <p class="text-muted">No blog posts found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Dynamic Blog Area End -->



<?php include("./include/footer.php") ?>