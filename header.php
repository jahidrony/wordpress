<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo('title') ?> - Index</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="<?= get_site_url() ?>" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                    <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                        echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                        } else { ?>
                            <?php bloginfo('title') ?>
                    <?php } ?>
                    </h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <?php if( is_active_sidebar( 'search_bar' ) ) : ?>
                  <?php dynamic_sidebar( 'search_bar' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <?php
                    global $woocommerce; 
                    $quantity=0;
                    foreach ( WC()->cart->get_cart() as $cart_item ) {
                        $item = $cart_item['data'];
                        if(!empty($item)) {
                            $quantity += $cart_item['quantity'];
                        }
                    }
                ?>
                <a href="<?= get_site_url() ?>/cart" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?= $quantity ?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <?php if(!is_home()){ ?>
    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 collapsed" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 collapse" style="position: absolute;background: rgb(255, 255, 255);width: 100%;z-index: 999;" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <?php
                        $args = array(
                            'taxonomy'     => 'product_cat',
                            'orderby'      => 'id',
                            'show_count'   => 0,
                            'pad_counts'   => 0,
                            'hierarchical' => 1,
                            'title_li'     => "",
                            'hide_empty'   => 0
                        );
                        $all_categories = get_categories( $args );
                        foreach ($all_categories as $cat) {
                            if($cat->category_parent == 0) {
                                $category_id = $cat->term_id; 
                                $args2 = array(
                                        'taxonomy'     => 'product_cat',
                                        'child_of'     => 0,
                                        'parent'       => $category_id,
                                        'orderby'      => 'name',
                                        'show_count'   => 0,
                                        'pad_counts'   => 0,
                                        'hierarchical' => 1,
                                        'title_li'     => "",
                                        'hide_empty'   => 0
                                );
                                $sub_cats = get_categories( $args2 );
                                if($sub_cats) {
                                    echo '
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link" data-toggle="dropdown">'.$cat->name.' <i class="fa fa-angle-down float-right mt-1"></i></a>
                                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">';
                                    foreach($sub_cats as $sub_category) {
                                        echo '<a class="nav-item nav-link" href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>';
                                    } 
                                    echo '</div>
                                    </div>';
                                }else{
                                    echo '<a class="nav-item nav-link" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
                                }
                            }       
                        }
                    ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <?php
                            $menuParameters= array(
                                'items_wrap'   => '%3$s',
                                'echo' => false,
                                'theme_location'=> 'topmenu',
                                'list_item_class'   => 'nav-item nav-link',
                                'link_class'   => 'nav-item nav-link',
                                'depth'         => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                'container'		=> 'div',
                                'container_class'=> 'navbar-nav mr-auto py-0'
                            );
                            echo strip_tags(wp_nav_menu( $menuParameters ), '<a><i><div>' );
                        ?>
                        <?php
                            $menuParameters= array(
                                'items_wrap'   => '%3$s',
                                'echo' => false,
                                'theme_location'=> 'topmenu_auth',
                                'list_item_class'   => 'nav-item nav-link',
                                'link_class'   => 'nav-item nav-link',
                                'depth'         => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                'container'		=> 'div',
                                'container_class'=> 'navbar-nav ml-auto py-0'
                            );
                            echo strip_tags(wp_nav_menu( $menuParameters ), '<a><i><div>' );
                        ?>
                    </div>
                </nav>
                
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <?php } ?>