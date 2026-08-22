<?php 
$page_title = "Contact Us";
$breadcrumb_links = [
    "Home" => "index.php"
];

include ("./include/header.php");
include ("./include/breadcrumb.php");
?>

<div class="contact-info-area section-padding">
    <div class="container container-default custom-area">
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="section-title">
                    <span class="sub-title badge-title">GLOBAL TRADE DESK</span>
                    <h2 class="title">GET IN TOUCH WITH US</h2>
                    <p class="desc">Connect with our export managers for bulk commodity quotes, CIF/FOB pricing, and sampling.</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">

        <div class="col-lg-3 col-md-6 col-custom mb-4">
                <div class="contact-info-card text-center">
                    <div class="contact-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h4>Head Office & Yard</h4>
                    <p>155, APMC Market Yard,<br>Gujarat, India - 385565</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-custom mb-4">
                <div class="contact-info-card text-center">
                    <div class="contact-icon">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <h4>Direct Export Desk</h4>
                    <p>
                        <a href="tel:+919876543210">+91 98765 43210</a><br>
                        <a href="tel:+918140965033">+91 81409 65033</a>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-custom mb-4">
                <div class="contact-info-card text-center">
                    <div class="contact-icon">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <h4>Official Email Desk</h4>
                    <p>
                        <a href="mailto:info@manascrest.com">info@manascrest.com</a><br>
                        <a href="mailto:export@manascrest.com">export@manascrest.com</a>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-custom mb-4">
                <div class="contact-info-card text-center">
                    <div class="contact-icon">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <h4>Global Support</h4>
                    <p>Mon - Sat: 09:00 AM - 07:00 PM<br><strong>24/7 WhatsApp Assistance</strong></p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="contact-form-area section-padding bg-light-theme">
    <div class="container container-default custom-area">
        <div class="row align-items-center">
            
            <div class="col-lg-8 col-md-12 col-custom mb-5 mb-lg-0">
                <div class="premium-contact-form-wrap">
                    <span class="sub-title badge-title mb-2 d-inline-block">INQUIRY FORM</span>
                    <h3 class="form-main-title mb-4">Request a Bulk Export Quote</h3>
                    
                    <form action="#" method="POST" class="b2b-contact-form">
                        <div class="row">
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control custom-input" placeholder="e.g. John Doe" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company / Business Name <span class="text-danger">*</span></label>
                                <input type="text" name="company" class="form-control custom-input" placeholder="e.g. Global Agri Imports LLC" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control custom-input" placeholder="e.g. buyer@company.com" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone / WhatsApp Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control custom-input" placeholder="e.g. +1 234 567 8900" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Select Commodity <span class="text-danger">*</span></label>
                                <select name="product" class="form-control custom-select" required>
                                    <option value="" disabled selected>-- Choose Interested Product --</option>
                                    <option value="Potato">Premium Fresh Potato</option>
                                    <option value="Onion">Fresh Red Onion</option>
                                    <option value="Cumin">Sortex Cumin Seeds (99% / 99.5%)</option>
                                    <option value="CastorOil">Cold Pressed Castor Oil</option>
                                    <option value="PearlMillet">Pearl Millet (Bajra)</option>
                                    <option value="Maize">Yellow Maize / Corn</option>
                                    <option value="MungBeans">Mung Beans</option>
                                    <option value="Fertilizer">Organic Fertilizer</option>
                                    <option value="Other">Other Custom Inquiry</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Target Port & Country <span class="text-danger">*</span></label>
                                <input type="text" name="port" class="form-control custom-input" placeholder="e.g. Jebel Ali Port, UAE" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Estimated Order Quantity (MT / Containers)</label>
                                <input type="text" name="quantity" class="form-control custom-input" placeholder="e.g. 1x20ft Container or 25 Metric Tons">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="form-label">Specific Packaging or Quality Requirements</label>
                                <textarea name="message" rows="4" class="form-control custom-input" placeholder="Mention packaging preference (Jute/PP/Mesh bags), CIF/FOB pricing requirements, etc."></textarea>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="obrien-button premium-btn w-100 justify-content-center">
                                    Send Official Inquiry <i class="fa-solid fa-paper-plane ms-2"></i>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-custom">
                <div class="contact-support-sidebar">
                    
                    <div class="support-card whatsapp-card mb-4 text-center p-4">
                        <div class="wa-icon mb-2">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <h4 class="text-white mb-2">Instant Trade Assistance</h4>
                        <p class="text-light mb-4" style="font-size: 14px;">
                            Need urgent FOB prices or shipment schedules? Chat directly with our Export Manager.
                        </p>
                        <a href="https://wa.me/918140965033" target="_blank" class="wa-btn w-100 d-inline-block">
                            <i class="fa-brands fa-whatsapp me-2"></i> Chat on WhatsApp
                        </a>
                    </div>

                    <div class="support-card trust-card p-4">
                        <h4 class="mb-3">Why Trade With Us?</h4>
                        <ul class="trust-list mb-0">
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                <span><strong>Fast Response:</strong> Official quote within 24 business hours.</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                <span><strong>Sample Available:</strong> Quality samples sent via DHL/FedEx on request.</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                <span><strong>Direct Sourcing:</strong> Zero middlemen, best mandi FOB rates.</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                <span><strong>APEDA Compliant:</strong> Complete phytosanitary & ISO documentation.</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- SECTION 3: EMBEDDED GOOGLE MAP (HIGH-END LOOK) -->
<div class="contact-map-area">
    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14660.123456!2d71.5000!3d24.0000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395a3123456789%3A0xabcdef!2sGujarat%2C%20India!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

<?php include ("./include/footer.php"); ?>