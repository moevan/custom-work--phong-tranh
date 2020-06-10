<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;
?>
<div class="product_meta">

    <?php do_action('woocommerce_product_meta_start'); ?>

    <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

        <span class="sku_wrapper"><?php esc_html_e('SKU:', 'woocommerce'); ?> <span
                    class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>

    <?php endif; ?>
	
	<span class="posted_in">Mã tác phẩm: <strong><?php echo the_ID(); ?></strong></span>

    <span class="posted_in">Tác giả:
       <?php
       $author_id = get_post_meta($product->get_id(), "author", true);
       if ($author_id) {
           $author = get_post($author_id);
           echo '<a href="' . get_permalink($author) . '"><strong>' . $author->post_title . '</strong></a>';
       }
       ?>
    </span>

    <?php
    $price_origin = price_format(get_post_meta($product->get_id(), "price_origin", true));
    $price_public = price_format(get_post_meta($product->get_id(), "price_public", true));
    $price_vip = price_format(get_post_meta($product->get_id(), "price_vip", true));
    $price_agency = price_format(get_post_meta($product->get_id(), "price_agency", true));
    $price_sold = price_format(get_post_meta($product->get_id(), "price_sold", true));
    $location = get_post_meta($product->get_id(), "location", true);

    if (is_user_logged_in()) {
        $price = $price_sold ? "" : $price_public;
        $user = wp_get_current_user();
        $roles = ( array )$user->roles;
        $role = $roles[0];
        if ($role == "customer_vip") {
            $price = $price_vip;
        } else if ($role == "customer_agency") {
            $price = $price_agency;
        }
    } else {
        $price = "";
    }
    ?>

    <?php
    if (isset($role) && ($role == "administrator" || $role == "editor")) {
        ?>
        <span class="posted_in">Giá gốc: <strong><?php echo $price_origin; ?>₫</strong></span>
        <span class="posted_in">Giá khách thường: <strong><?php echo $price_public; ?>₫</strong></span>
        <span class="posted_in">Giá khách VIP: <strong><?php echo $price_vip; ?>₫</strong></span>
        <span class="posted_in">Giá đại lý: <strong><?php echo $price_agency; ?>₫</strong></span>
        <span class="posted_in">Giá đã bán: <strong><?php echo $price_sold; ?>₫</strong></span>
        <?php
    } else if (isset($role) && ($role == "customer_vip" || $role == "customer_agency")) {
        ?>
        <span class="posted_in"><?php echo $role == "customer_vip" ? "Giá VIP" : "Giá đại lý"; ?>: <strong><?php echo $price ? $price . "₫" : ""; ?></strong> (Giá phổ thông: <?php echo $price_public; ?>₫)</span>
        <?php
    } else {
        ?>
        <span class="posted_in">Giá: <strong><?php echo $price ? $price . "₫" : ""; ?></strong></span>
        <?php
    }
    ?>

    <?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n('Danh mục:', 'Danh mục:', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>'); ?>

    <span class="posted_in">Năm sản xuất:
        <strong>
    <?php
    $terms = get_the_terms($product->get_id(), "publish_year");
    $terms_string = join(', ', wp_list_pluck($terms, 'name'));
    echo $terms_string;
    ?>
            </strong>
    </span>

    <span class="posted_in">Trường phái:
        <strong>
    <?php
    $terms = get_the_terms($product->get_id(), "school");
    $terms_string = join(', ', wp_list_pluck($terms, 'name'));
    echo $terms_string;
    ?>
            </strong>
    </span>

    <span class="posted_in">Kích thước:
        <strong>
    <?php
    $terms = get_the_terms($product->get_id(), "size");
    $terms_string = join(', ', wp_list_pluck($terms, 'name'));
    echo $terms_string;
    ?>
            </strong>
    </span>

    <span class="posted_in">Chất liệu:
        <strong>
    <?php
    $terms = get_the_terms($product->get_id(), "material");
    $terms_string = join(', ', wp_list_pluck($terms, 'name'));
    echo $terms_string;
    ?>
            </strong>
    </span>

    <span class="posted_in">Màu sắc:
        <strong>
    <?php
    $terms = get_the_terms($product->get_id(), "color");
    $terms_string = join(', ', wp_list_pluck($terms, 'name'));
    echo $terms_string;
    ?>
            </strong>
    </span>

    <span class="posted_in">Phiên đấu giá thứ:

        <a href="<?php echo get_post_meta($product->get_id(), "bid_link", true); ?>">
            <strong><?php echo get_post_meta($product->get_id(), "bid_number", true); ?></strong>
        </a>

    </span>

    <span class="posted_in">Tình trạng: <strong><?php echo $price_sold ? "Đã bán" : "Đang bán"; ?></strong></span>
	
	<?php if (isset($role) && $role == "administrator") { ?>
	<span class="posted_in">Vị trí: <strong><?php echo $location; ?></strong></span>
	<?php
	}
	?>

    <?php echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . ' ', '</span>'); ?>

    <?php do_action('woocommerce_product_meta_end'); ?>

</div>
