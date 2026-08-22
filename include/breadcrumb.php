<?php
$bc_title = isset($page_title) && !empty($page_title) ? $page_title : "Manas Crest International";


$bc_bg = isset($breadcrumb_bg) && !empty($breadcrumb_bg) ? $breadcrumb_bg : "assets/images/banner/breadcrumb-bg.jpg";

if (!isset($breadcrumb_links) || !is_array($breadcrumb_links)) {
    $breadcrumb_links = [
        "Home" => "index.php"
    ];
}
?>

<div class="breadcrumb-area premium-breadcrumb-area" style="background-image: url('<?php echo htmlspecialchars($bc_bg); ?>');">
    <div class="breadcrumb-overlay"></div>
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content">
                    
                    <h1 class="breadcrumb-title"><?php echo htmlspecialchars($bc_title); ?></h1>
                    
                    <ul class="breadcrumb-list d-flex justify-content-center">
                        <?php 
                        foreach ($breadcrumb_links as $name => $url) : ?>
                            <li><a href="<?php echo htmlspecialchars($url); ?>"><?php echo htmlspecialchars($name); ?></a></li>
                            <li><span class="divider"><i class="fa fa-angle-right"></i></span></li>
                        <?php endforeach; ?>
                        
                        <li class="active"><?php echo htmlspecialchars($bc_title); ?></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
