<?php 
$page_title = "About Us";
// $breadcrumb_links = [
//     "Home" => "index.php",
//     "About Us" => "about.php"
// ];
$bc_bg = "https://images.pexels.com/photos/2252584/pexels-photo-2252584.jpeg?auto=compress&cs=tinysrgb&w=1200";
include ("./include/header.php");
include ("./include/breadcrumb.php");
?>

<!-- SECTION 1: COMPANY OVERVIEW / STORY -->
<div class="about-overview-area section-padding position-relative overflow-hidden">
    <!-- Subtle Background Glow -->
    <div class="bg-glow-circle"></div>

    <div class="container container-default custom-area">
        <div class="row align-items-center">
            
            <!-- Left Text Content -->
            <div class="col-lg-6 col-md-12 col-custom mb-5 mt-5 mb-lg-0">
                <div class="about-content-wrap">
                    <span class="sub-title badge-title">WHO WE ARE</span>
                    <h2 class="main-heading">Bridging Indian Agriculture to <span class="highlight-green">Global Markets</span></h2>
                    <p class="lead-text">
                        <strong>Manas Crest International</strong> is a premier export-import trading house specializing in top-grade agricultural commodities. Rooted in the rich agricultural belt of India, we deliver unmatched purity and freshness to international buyers.
                    </p>
                    <p class="body-text">
                        From farm-fresh <em>Potato and Onion</em> to high-purity sortex <em>Cumin Seeds, Castor Oil, Pearl Millet, Maize, Mung Beans,</em> and eco-friendly <em>Organic Fertilizers</em>—we ensure that every product adheres to rigorous international food safety and hygiene standards.
                    </p>

                    <!-- Feature Bullets -->
                    <ul class="about-feature-list mt-4">
                        <li><i class="fa fa-check-circle"></i> Direct APMC & Farm Sourcing Model</li>
                        <li><i class="fa fa-check-circle"></i> 99% to 99.5% Sortex Cleaned & Graded</li>
                        <li><i class="fa fa-check-circle"></i> Moisture-Controlled Export Packaging</li>
                    </ul>
                    
                    <!-- Certificate Seal Box -->
                    <div class="signature-box mt-4 d-flex align-items-center">
                        <div class="icon-seal mr-3">
                            <i class="fa fa-shield"></i>
                        </div>
                        <div class="seal-text">
                            <h5 class="mb-0">100% Export Quality Assured</h5>
                            <small>ISO, APEDA & Global Standard Compliant</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Image Area (Using Reliable Pexels CDN) -->
            <div class="col-lg-6 col-md-12 col-custom">
                <div class="about-image-wrap position-relative">
                    <div class="image-main overflow-hidden rounded-image shadow-lg">
                        <!-- Reliable Pexels Agriculture Export Image -->
                        <img src="https://images.pexels.com/photos/2252584/pexels-photo-2252584.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Manas Crest Farming & Export" class="img-fluid w-100">
                    </div>
                    
                    <!-- Glassmorphism Floating Badge -->
                    <div class="floating-badge d-flex align-items-center">
                        <div class="badge-icon">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="badge-text">
                            <h3 class="years">Global</h3>
                            <p class="mb-0">Export & Trading<br>Excellence</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- SECTION 2: OUR MISSION & VISION PILLARS -->
<div class="about-pillars-area section-padding bg-light-theme">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title">
                    <span class="sub-title badge-title">CORE VALUES</span>
                    <h2 class="title">OUR CORE PILLARS</h2>
                    <p class="desc">The fundamental principles that drive our international B2B export operations.</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Pillar 1 -->
            <div class="col-lg-4 col-md-6 col-custom mb-4">
                <div class="pillar-card">
                    <span class="card-bg-number">01</span>
                    <div class="pillar-icon">
                        <i class="fa fa-eye"></i>
                    </div>
                    <h4>Our Vision</h4>
                    <p>To emerge as the most trusted and transparent global supply chain partner for premium Indian agricultural commodities, recognized for integrity and punctuality.</p>
                </div>
            </div>

            <!-- Pillar 2 -->
            <div class="col-lg-4 col-md-6 col-custom mb-4">
                <div class="pillar-card active-pillar">
                    <span class="card-bg-number">02</span>
                    <div class="pillar-icon">
                        <i class="fa fa-bullseye"></i>
                    </div>
                    <h4>Our Mission</h4>
                    <p>To deliver sustainably farmed, sortex-cleaned, and properly packaged produce to international buyers while providing equitable remuneration to our farming communities.</p>
                </div>
            </div>

            <!-- Pillar 3 -->
            <div class="col-lg-4 col-md-6 col-custom mb-4">
                <div class="pillar-card">
                    <span class="card-bg-number">03</span>
                    <div class="pillar-icon">
                        <i class="fa fa-handshake"></i>
                    </div>
                    <h4>Quality Policy</h4>
                    <p>We deploy stringent multi-stage quality control—from soil and crop inspection to moisture-controlled export packaging—ensuring zero transit damage.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 3: WHY CHOOSE US (TABLE / GRID) -->
<div class="why-choose-area section-padding m-5">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title">
                    <span class="sub-title badge-title">THE ADVANTAGE</span>
                    <h2 class="title">WHY IMPORTERS CHOOSE US</h2>
                    <p class="desc">We simplify international procurement through reliability, transparency, and speed.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-lg-10 col-custom">
                <div class="table-responsive premium-table-wrap">
                    <table class="table premium-comparison-table mb-0">
                        <thead>
                            <tr>
                                <th>Procurement Advantage</th>
                                <th class="highlight-col">Manas Crest International</th>
                                <th>Conventional Exporters</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Sourcing Model</strong></td>
                                <td class="highlight-col"><span class="text-success font-weight-bold"><i class="fa fa-check-circle mr-2"></i>Direct from Farmers / APMC</span></td>
                                <td><span class="text-muted">Multiple Middlemen & Traders</span></td>
                            </tr>
                            <tr>
                                <td><strong>Quality Cleaning</strong></td>
                                <td class="highlight-col"><span class="text-success font-weight-bold"><i class="fa fa-check-circle mr-2"></i>99% to 99.5% Sortex Cleaned</span></td>
                                <td><span class="text-muted">Standard Manual Sorting</span></td>
                            </tr>
                            <tr>
                                <td><strong>Packaging Options</strong></td>
                                <td class="highlight-col"><span class="text-success font-weight-bold"><i class="fa fa-check-circle mr-2"></i>Customized Bulk (Jute/PP/Mesh)</span></td>
                                <td><span class="text-muted">Rigid Standard Packs</span></td>
                            </tr>
                            <tr>
                                <td><strong>Logistics & Support</strong></td>
                                <td class="highlight-col"><span class="text-success font-weight-bold"><i class="fa fa-check-circle mr-2"></i>Dedicated Manager & Tracking</span></td>
                                <td><span class="text-muted">Limited Post-Shipment Updates</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 4: LIVE STATS / FOOTPRINT BANNER  -->
<div class="export-stats-area">
    <div class="container container-default custom-area">
        <div class="row text-center">
            
            <div class="col-lg-3 col-md-6 col-6 col-custom mb-4 mb-lg-0">
                <div class="single-stat-box">
                    <h3 class="stat-number">10,000+</h3>
                    <p class="stat-label">Metric Tons Exported</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-6 col-custom mb-4 mb-lg-0">
                <div class="single-stat-box">
                    <h3 class="stat-number">15+</h3>
                    <p class="stat-label">Countries Served</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-6 col-custom">
                <div class="single-stat-box">
                    <h3 class="stat-number">500+</h3>
                    <p class="stat-label">Partner Farmers</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-6 col-custom">
                <div class="single-stat-box">
                    <h3 class="stat-number">100%</h3>
                    <p class="stat-label">Sortex Quality Sourcing</p>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include ("./include/footer.php")?>