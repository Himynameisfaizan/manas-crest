<?php
// Default DB connection agar standalone run ho
if (!isset($conn)) {
    include("admin/db-conn.php");
}

// Current Page check for Active Links
$current_page = basename($_SERVER['PHP_SELF']);

// Fetch Active Categories ek hi baar mein taaki dono mobile aur desktop menu me kaam aaye
$nav_cat_query = "SELECT * FROM categories WHERE status = 1 ORDER BY id ASC";
$nav_cat_res = mysqli_query($conn, $nav_cat_query);
$categories_list = [];
if ($nav_cat_res && mysqli_num_rows($nav_cat_res) > 0) {
    while ($nav_cat = mysqli_fetch_assoc($nav_cat_res)) {
        $categories_list[] = $nav_cat;
    }
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manas Crest International | Premium Exports</title>
    <meta name="description"
        content="Exporting premium quality Potato, Onion, Cumin seeds, Castor Oil, Pearl Millet, and more.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="manifest" href="site.webmanifest">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Slick Slider CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/include.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/about.css">
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/product.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <style>
    /* Active Menu Highlighting */
    .main-nav ul.nav>li>a.active {
        color: var(--primary-green) !important;
    }

    .main-nav ul.nav>li>a.active::after {
        width: 100% !important;
    }

    /* Bootstrap Offcanvas Mobile Menu Styling */
    .mobile-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mobile-menu li {
        border-bottom: 1px solid #f1f1f1;
    }

    .mobile-menu li a {
        display: block;
        padding: 12px 0;
        font-size: 16px;
        font-weight: 600;
        color: #333;
        text-decoration: none;
        transition: 0.3s;
    }

    .mobile-menu li a.active {
        color: var(--primary-green);
    }

    .dropdown-mobile {
        padding-left: 15px;
        border-left: 2px solid #eee;
        margin-bottom: 10px;
    }

    .dropdown-mobile li {
        border-bottom: none;
    }

    .dropdown-mobile li a {
        padding: 8px 0;
        font-size: 14px;
        color: #666;
        font-weight: 500;
    }
    </style>

    <header class="main-header-area">

        <!-- Header Top Area -->
        <div class="header-top-area header-top-2">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-12 col-custom header-top-wrapper text-center">
                        <div class="short-desc">
                            <p>Premium Global Exports: <strong><a href="tel:+918140965033" title="Call Us">+91 81409
                                        65033
                                    </a> | </strong></p>
                            <p> Email: <a href="mailto:manascrestint@gmail.com"
                                    title="Email Us">manascrestint@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Area Start -->
        <div class="main-header">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-12 col-custom">
                        <div class="row align-items-center">

                            <!-- Logo -->
                            <div class="col-lg-3 col-xl-3 col-sm-6 col-6 col-custom">
                                <div class="header-logo d-flex align-items-center">
                                    <a href="index.php">
                                        <img class="img-full" src="assets/images/logo/logo.png" alt="Manas Crest Logo"
                                            style="max-height: 60px;">
                                    </a>
                                </div>
                            </div>

                            <!-- DESKTOP NAVIGATION -->
                            <div class="col-lg-9 col-xl-9 position-static d-none d-lg-block col-custom">
                                <nav class="main-nav d-flex justify-content-end">
                                    <ul class="nav">
                                        <li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ''; ?>"
                                                href="index.php"><span class="menu-text">Home</span></a></li>
                                        <li><a class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>"
                                                href="about.php"><span class="menu-text">About Us</span></a></li>

                                        <!-- Dynamic Products Dropdown -->
                                        <li>
                                            <a class="<?php echo ($current_page == 'products.php' || $current_page == 'category-products.php' || $current_page == 'product-details.php') ? 'active' : ''; ?>"
                                                href="products.php">
                                                <span class="menu-text">Products</span>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-sidemenu dropdown-hover-2">
                                                <li><a href="products.php">All Commodities</a></li>
                                                <?php foreach ($categories_list as $cat): ?>
                                                <li><a
                                                        href="category-products.php?id=<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['categories']); ?></a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>

                                        <li><a class="<?php echo ($current_page == 'blogs.php' || $current_page == 'blog-details.php') ? 'active' : ''; ?>"
                                                href="blogs.php"><span class="menu-text">Blogs</span></a></li>
                                        <li><a class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>"
                                                href="contact.php"><span class="menu-text">Contact</span></a></li>
                                    </ul>
                                </nav>
                            </div>

                            <!-- MOBILE MENU BUTTON (Uses Bootstrap Offcanvas) -->
                            <div class="col-sm-6 col-6 col-custom d-lg-none">
                                <div class="header-right-area main-nav justify-content-end">
                                    <ul class="nav">
                                        <li class="mobile-menu-btn">
                                            <a class="off-canvas-btn" data-bs-toggle="offcanvas"
                                                href="#mobileMenuOffcanvas" role="button"
                                                aria-controls="mobileMenuOffcanvas">
                                                <i class="fa fa-bars"
                                                    style="font-size: 24px; color: var(--primary-green);"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Header Start Here-->
        <div class="main-header header-sticky">
            <div class="container container-default custom-area">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-xl-3 col-sm-6 col-6 col-custom">
                        <div class="header-logo">
                            <a href="index.php">
                                <img class="img-full" src="assets/images/logo/logo.png" alt="Manas Crest Logo"
                                    style="max-height: 50px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-xl-9 position-static d-none d-lg-block col-custom">
                        <nav class="main-nav d-flex justify-content-end">
                            <ul class="nav">
                                <li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ''; ?>"
                                        href="index.php">Home</a></li>
                                <li><a class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>"
                                        href="about.php">About Us</a></li>
                                <li>
                                    <a class="<?php echo ($current_page == 'products.php' || $current_page == 'category-products.php') ? 'active' : ''; ?>"
                                        href="products.php">Products <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-sidemenu dropdown-hover-2">
                                        <li><a href="products.php">All Commodities</a></li>
                                        <?php foreach ($categories_list as $cat): ?>
                                        <li><a
                                                href="category-products.php?id=<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['categories']); ?></a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li><a class="<?php echo ($current_page == 'blogs.php' || $current_page == 'blog-details.php') ? 'active' : ''; ?>"
                                        href="blogs.php">Blogs</a></li>
                                <li><a class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>"
                                        href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>

                    <!-- MOBILE MENU BUTTON (Sticky Header) -->
                    <div class="col-sm-6 col-6 col-custom d-lg-none">
                        <div class="header-right-area main-nav justify-content-end">
                            <ul class="nav">
                                <li class="mobile-menu-btn">
                                    <a class="off-canvas-btn" data-bs-toggle="offcanvas" href="#mobileMenuOffcanvas"
                                        role="button" aria-controls="mobileMenuOffcanvas">
                                        <i class="fa fa-bars" style="font-size: 24px; color: var(--primary-green);"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- =======================================================
         BOOTSTRAP 5 NATIVE OFFCANVAS MOBILE MENU (BULLETPROOF)
         ======================================================= -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenuOffcanvas"
            aria-labelledby="mobileMenuOffcanvasLabel">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="mobileMenuOffcanvasLabel">
                    <img src="assets/images/logo/logo.png" alt="Manas Crest Logo" style="max-height: 40px;">
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <nav>
                    <ul class="mobile-menu">
                        <li><a href="index.php"
                                class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ''; ?>">Home</a>
                        </li>
                        <li><a href="about.php"
                                class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About
                                Us</a></li>

                        <!-- Dynamic Mobile Category Dropdown using Bootstrap Collapse -->
                        <li>
                            <a data-bs-toggle="collapse" href="#mobileProductDropdown" role="button"
                                aria-expanded="false" aria-controls="mobileProductDropdown"
                                class="<?php echo ($current_page == 'products.php' || $current_page == 'category-products.php') ? 'active' : ''; ?>">
                                Products <i class="fa fa-angle-down float-end mt-1"></i>
                            </a>
                            <ul class="collapse dropdown-mobile list-unstyled" id="mobileProductDropdown">
                                <li><a href="products.php">All Commodities</a></li>
                                <?php foreach ($categories_list as $cat): ?>
                                <li><a
                                        href="category-products.php?id=<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['categories']); ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li><a href="blogs.php"
                                class="<?php echo ($current_page == 'blogs.php' || $current_page == 'blog-details.php') ? 'active' : ''; ?>">Blogs</a>
                        </li>
                        <li><a href="contact.php"
                                class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
                    </ul>
                </nav>

                <div class="mt-5 pt-3 border-top">
                    <ul style="list-style: none; padding:0;">
                        <li class="mb-3 d-flex align-items-center">
                            <i class="fa fa-phone me-3" style="color:var(--primary-green); font-size: 18px;"></i>
                            <a href="tel:+918140965033" style="color:#333; font-weight: 500;">+91 81409 65033</a>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="fa fa-envelope me-3" style="color:var(--primary-green); font-size: 18px;"></i>
                            <a href="mailto:manascrestint@gmail.com"
                                style="color:#333; font-weight: 500;">manascrestint@gmail.com</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </header>