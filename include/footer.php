<?php 
include ("./admin/db-conn.php");
if (!isset($conn)) {
    $conn = mysqli_connect("localhost", "root", "", "rudra");
}

// =========================================================
// 1. FETCH CONTACT & SOCIAL INFO FROM `contacts` TABLE
// =========================================================
$contact_query = "SELECT * FROM contacts ORDER BY id DESC LIMIT 1";
$contact_result = mysqli_query($conn, $contact_query);
$contact_data = ($contact_result && mysqli_num_rows($contact_result) > 0) ? mysqli_fetch_assoc($contact_result) : [];

// Fallback setup agar database me field empty ho
$phone_no   = !empty($contact_data['phone']) ? htmlspecialchars($contact_data['phone']) : "+91 81409 65033";
$email_id   = !empty($contact_data['email']) ? htmlspecialchars($contact_data['email']) : "manascrestint@gmail.com";
$address    = !empty($contact_data['address']) ? htmlspecialchars($contact_data['address']) : "Radhanpur, Patan, Gujarat, India - 385340";
$fb_link    = !empty($contact_data['facebook']) ? htmlspecialchars($contact_data['facebook']) : "#";
$insta_link = !empty($contact_data['instagram']) ? htmlspecialchars($contact_data['instagram']) : "#";
$li_link    = !empty($contact_data['linkdin']) ? htmlspecialchars($contact_data['linkdin']) : "#";
$wa_number  = !empty($contact_data['wp_number']) ? preg_replace('/[^0-9]/', '', $contact_data['wp_number']) : "918140965033";
?>

<footer class="custom-premium-footer">
    <div class="container container-default custom-area">
        <div class="row footer-main-content">
            
            <!-- Column 1: Brand & Social Icons -->
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                <div class="footer-brand">
                    <h2 class="brand-name">MANAS CREST<br><span>INTERNATIONAL</span></h2>
                    
                    <!-- Social Icons (Dynamic Links from DB) -->
                    <div class="social-icons mt-4">
                        <a href="<?php echo $fb_link; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook-f"></i></a>
                        <a href="<?php echo $li_link; ?>" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                        <a href="<?php echo $insta_link; ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
                        <a href="https://wa.me/<?php echo $wa_number; ?>" target="_blank" title="WhatsApp"><i class="fa fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Column 2: Quick Links (2-Column Layout) -->
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                <h4 class="footer-heading">QUICK LINKS</h4>
                <div class="footer-links-two-col">
                    <ul class="footer-list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="products.php">Export Markets</a></li>
                    </ul>
                    <ul class="footer-list">
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="policy.php?slug=privacy-policy">Privacy Policy</a></li>
                        <li><a href="policy.php?slug=terms-conditions">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>

            <!-- Column 3: Our Products (2-Column Dynamic Layout from DB) -->
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                <h4 class="footer-heading">OUR PRODUCTS</h4>
                <div class="footer-links-two-col">
                    <?php 
                    // Fetch latest 8 active products from database
                    $footer_pro_query = "SELECT id, pro_name FROM products WHERE status = 1 ORDER BY id DESC LIMIT 8";
                    $footer_pro_res = mysqli_query($conn, $footer_pro_query);

                    $footer_products = [];
                    if ($footer_pro_res && mysqli_num_rows($footer_pro_res) > 0) {
                        while ($f_pro = mysqli_fetch_assoc($footer_pro_res)) {
                            $footer_products[] = $f_pro;
                        }
                    }

                    // Split into two columns (Left 4, Right 4)
                    $left_products = array_slice($footer_products, 0, 4);
                    $right_products = array_slice($footer_products, 4, 4);
                    ?>

                    <!-- Left Sub-column (Up to 4 products) -->
                    <ul class="footer-list">
                        <?php if (!empty($left_products)) : ?>
                            <?php foreach ($left_products as $l_item) : ?>
                                <li>
                                    <a href="product-details.php?id=<?php echo $l_item['id']; ?>">
                                        <?php echo htmlspecialchars($l_item['pro_name']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li><a href="products.php">Potato</a></li>
                            <li><a href="products.php">Onion</a></li>
                            <li><a href="products.php">Cumin Seeds</a></li>
                            <li><a href="products.php">Castor Oil</a></li>
                        <?php endif; ?>
                    </ul>

                    <!-- Right Sub-column (Up to 4 products) -->
                    <ul class="footer-list">
                        <?php if (!empty($right_products)) : ?>
                            <?php foreach ($right_products as $r_item) : ?>
                                <li>
                                    <a href="product-details.php?id=<?php echo $r_item['id']; ?>">
                                        <?php echo htmlspecialchars($r_item['pro_name']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li><a href="products.php">Pearl Millet</a></li>
                            <li><a href="products.php">Maize</a></li>
                            <li><a href="products.php">Mung Beans</a></li>
                            <li><a href="products.php">Fertilizer</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- Column 4: Dynamic Contact Us Info -->
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                <h4 class="footer-heading">CONTACT US</h4>
                <ul class="footer-contact-info">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <span><?php echo nl2br($address); ?></span>
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <span><a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone_no); ?>" style="color: inherit;"><?php echo $phone_no; ?></a></span>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <span><a href="mailto:<?php echo $email_id; ?>" style="color: inherit;"><?php echo $email_id; ?></a></span>
                    </li>
                    <li>
                        <i class="fa fa-globe"></i>
                        <span><?php echo $_SERVER['HTTP_HOST']; ?></span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Copyright Bottom Bar (Auto Current Year) -->
    <div class="footer-bottom">
        <div class="container text-center">
            <p>&copy; <?php echo date("Y"); ?> <span class="highlight">Manas Crest International</span>. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('.obrien-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: true, 
            dots: true,   
            autoplay: true,
            fade: true,   
            autoplaySpeed: 5000,
            pauseOnHover: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true
                    }
                }
            ]
        });
    });
</script>

</body>
</html>