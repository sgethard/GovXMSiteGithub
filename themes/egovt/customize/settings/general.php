<?php 
$general_css = '';


/* Primary Font */
$default_primary_font = json_decode( egovt_default_primary_font() );
$primary_font = json_decode( get_theme_mod( 'primary_font' ) ) ? json_decode( get_theme_mod( 'primary_font' ) ) : $default_primary_font;
$primary_font_family = $primary_font->font;


/* General Typo */
$general_font_size = get_theme_mod( 'general_font_size', '17px' );
$general_line_height = get_theme_mod( 'general_line_height', '26px' );
$general_letter_space = get_theme_mod( 'general_letter_space', '0px' );
$general_color = get_theme_mod( 'general_color', '#62718d' );



/* Primary Color */
$primary_color = get_theme_mod( 'primary_color', '#ff3514' );



/* Second Font */
$default_second_font = json_decode( egovt_default_second_font() );
$second_font = json_decode( get_theme_mod( 'second_font' ) ) ? json_decode( get_theme_mod( 'second_font' ) ) : $default_second_font;
$second_font_family = $second_font->font;


$general_css .= <<<CSS

body{
	font-family: {$primary_font_family};
	font-weight: 400;
	font-size: {$general_font_size};
	line-height: {$general_line_height};
	letter-spacing: {$general_letter_space};
	color: {$general_color};
}


h1,h2,h3,h4,h5,h6, .nav_comment_text
{
	font-family: {$second_font_family};
	color: #202b5d;
}
.cal1,.second_font{
	font-family: {$second_font_family} !important;
}
.according-egov .elementor-accordion .elementor-accordion-item .elementor-tab-content,
.egovt-tab .elementor-widget-tabs .elementor-tab-content
{
	font-family: {$primary_font_family};
}

.sidebar .widget.recent-posts-widget-with-thumbnails ul li a .rpwwt-post-title,
.sidebar .widget.recent-posts-widget-with-thumbnails ul li .rpwwt-post-date,
.sidebar .widget.widget_tag_cloud .tagcloud a,
.blog_pagination .pagination li.page-numbers a,
.single-post-egovt article.post-wrap .post-tag .post-tags a,
.content_comments .comments ul.commentlists li.comment .comment-details .author-name .name,
.content_comments .comments ul.commentlists li.comment .comment-details .author-name .date,
.content_comments .comments ul.commentlists li.comment .comment-body .ova_reply .comment-reply-link,
.content_comments .comments ul.commentlists li.comment .comment-body .ova_reply .comment-edit-link,
.content_comments .comments .comment-respond .comment-form textarea,
.content_comments .comments .comment-respond .comment-form input[type="text"],
.content_comments .comments .comment-respond .comment-form p.form-submit #submit,
.ova-single-text,
.egovt_counter_team .elementor-counter .elementor-counter-number-wrapper .elementor-counter-number,
.egovt_button .elementor-button-wrapper .elementor-button,
.according-egov .elementor-accordion .elementor-accordion-item .elementor-tab-title a,
.egovt-tab.elementor-widget-tabs .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title a,
.egovt-tab.elementor-widget-tabs .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title,
.egovt-tab.elementor-widget-tabs .elementor-tabs .elementor-tabs-content-wrapper .elementor-tab-title,
.search_archive_event form .select2-selection.select2-selection--single .select2-selection__rendered,
.search_archive_event form .start_date input::placeholder, 
.search_archive_event form .end_date input::placeholder,
.ova_time_countdown .due_date .countdown-section .countdown-amount,
.ova_time_countdown .due_date .countdown-section .countdown-period,
.woocommerce .ova-shop-wrap .content-area ul.products li.product .price,
.woocommerce .ova-shop-wrap .content-area .woocommerce-pagination ul.page-numbers li .page-numbers,
.woocommerce .ova-shop-wrap .content-area .onsale,
.woocommerce .ova-shop-wrap .content-area .woocommerce-result-count,
.woocommerce .ova-shop-wrap .content-area .woocommerce-ordering .select2-container--default .select2-selection--single .select2-selection__rendered,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_products ul.product_list_widget li a .product-title,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_products ul.product_list_widget li .woocommerce-Price-amount,
.woocommerce .ova-shop-wrap .content-area .product .summary .price,
.woocommerce .ova-shop-wrap .content-area .product .summary .stock,
.woocommerce .ova-shop-wrap .content-area .product .summary .cart .quantity input,
.woocommerce .ova-shop-wrap .content-area .product .summary .cart .single_add_to_cart_button,
.woocommerce .ova-shop-wrap .content-area .product .summary .product_meta .posted_in,
.woocommerce .ova-shop-wrap .content-area .product .summary .product_meta .tagged_as,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs ul.tabs li a,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #comments ol.commentlist li .comment_container .comment-text .meta,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #review_form_wrapper #review_form #respond .comment-reply-title,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #review_form_wrapper #review_form #respond .comment-form label,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_price_filter .price_slider_wrapper .price_slider_amount .button,
.woocommerce .woocommerce-cart-form table.shop_table thead tr th,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.product-quantity input,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.actions .coupon .button,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.actions .button,
.woocommerce .cart-collaterals .cart_totals .shop_table th,
.woocommerce .cart-collaterals .cart_totals .shop_table td,
.woocommerce .cart-collaterals .cart_totals .shop_table tr.woocommerce-shipping-totals ul#shipping_method li label,
.woocommerce .cart-collaterals .cart_totals .shop_table tr.woocommerce-shipping-totals .woocommerce-shipping-destination,
.woocommerce .cart-collaterals .cart_totals .shop_table tr.woocommerce-shipping-totals .woocommerce-shipping-calculator .shipping-calculator-button,
.woocommerce .cart-collaterals .cart_totals .shop_table tr.woocommerce-shipping-totals .woocommerce-shipping-calculator .button,
.woocommerce .cart-collaterals .cart_totals .checkout-button,
.woocommerce-checkout .woocommerce-billing-fields .form-row label,
.woocommerce-checkout table.shop_table td,
.woocommerce-checkout table.shop_table th,
.woocommerce-checkout .woocommerce-checkout-payment ul.wc_payment_methods li label,
.woocommerce-checkout #payment .place-order #place_order,
.woocommerce-checkout .woocommerce-additional-fields .form-row label,
.woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info,
.woocommerce .ova-shop-wrap .content-area .product .summary form.cart table.variations tr td,
.woocommerce-checkout form.checkout_coupon .button,
.ova_toggle_custom_egovt .elementor-toggle-item .elementor-tab-title a,
.egovt_404_page .search-form input[type="submit"],
.ova_egovt_counter.elementor-widget-counter .elementor-counter-number-wrapper,
.ova_egovt_counter.elementor-widget-counter .elementor-counter-title,
.egovt_form_mail_comming_soon .mailchimp_custom .ova_mcwp_mail input[type="email"],
.woocommerce #customer_login .woocommerce-form .form-row label,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_product_tag_cloud .tagcloud a,
.single_event .event_content .tab-Location .tab-content .contact .info-contact li span:nth-child(1),
.ova_menu_page a,
.ovatheme_header_default nav.navbar li a,
.ovatheme_header_default nav.navbar li a,
.ova_shortcode_donation.type2 .give-form-wrap .give-form #give-donation-level-button-wrap .give-donation-level-btn,
.ova_shortcode_donation .give-form-wrap .give-form .give-btn,
form[id*=give-form] #give-final-total-wrap .give-donation-total-label,
form[id*=give-form] #give-final-total-wrap .give-final-total-amount,
#give-recurring-form .form-row label, form.give-form .form-row label, form[id*=give-form] .form-row label,
#give-recurring-form h3.give-section-break, #give-recurring-form h4.give-section-break, #give-recurring-form legend, form.give-form h3.give-section-break, form.give-form h4.give-section-break, form.give-form legend, form[id*=give-form] h3.give-section-break, form[id*=give-form] h4.give-section-break, form[id*=give-form] legend,
form[id*=give-form] #give-gateway-radio-list>li label.give-gateway-option,
.ova_single_give_form .give_forms .summary .donation .give-form-wrap .give-donation-levels-wrap button,
form[id*=give-form] .give-donation-amount #give-amount, form[id*=give-form] .give-donation-amount #give-amount-text,
.ova_single_give_form .give_forms .summary .donation .give-form-wrap .give-currency-symbol,
.give-donor__image,
.ova_single_give_form .give_forms .summary .give_form_info #donor .give-grid .give-donor__total

{
	font-family: {$second_font_family};
}

article.post-wrap .post-meta .post-meta-content .post-date .left i,
article.post-wrap .post-meta .post-meta-content .wp-categories a:hover,
article.post-wrap .post-meta .post-meta-content .wp-author a:hover,
.sidebar .widget.recent-posts-widget-with-thumbnails ul li a .rpwwt-post-title:hover,
article.post-wrap .carousel .carousel-control-prev:hover i, 
article.post-wrap .carousel .carousel-control-next:hover i,
article.post-wrap .post-title a:hover h2,
.blog-grid article.post-wrap .post-meta-grid .post-meta-content-grid .categories a:hover,
.blog-grid article.post-wrap .post-footer .egovt-post-readmore a:hover,
.default article.post-wrap .post-footer .socials-inner .share-social .share-social-icons li a:hover,
.single-post-egovt article.post-wrap .post-tag .post-tags a:hover,
.content_comments .comments .comment-respond small a,
.ova-search-page .page-title span,
.switch-lang .current-lang .lang-text:hover,
.switch-lang .current-lang .lang-text:hover:after,
.switch-lang .lang-dropdown .selecting-lang .lang-text:hover,
.elementor-widget-ova_header .wrap_ova_header .ova_header_el .ovatheme_breadcrumbs .breadcrumb a:hover,
.ova-contact-info.type2 .address .text_link a:hover,
.ova-contact-info.type2 .icon svg,
.ova-contact-info.type2 .icon i,
.sidebar .widget.recent-posts-widget-with-thumbnails ul li .rpwwt-post-date::before,
.content_comments .comments ul.commentlists li.comment .comment-body .ova_reply .comment-reply-link:hover,
.content_comments .comments ul.commentlists li.comment .comment-body .ova_reply .comment-edit-link:hover,
.ovatheme_header_default nav.navbar li a:hover,
.ova_wrap_search_popup i:hover,
.elementor-widget-ova_menu .ova_nav ul.menu > li > a:hover,
.elementor-widget-ova_menu .ova_nav ul.menu .dropdown-menu li a:hover,
.elementor-widget-ova_menu .ova_nav ul.menu > li.active > a,
.elementor-widget-ova_menu .ova_nav ul.menu > li.current-menu-parent > a,


.ova-contact-info .address a:hover,
.ova_menu_page .menu li a:hover,
.ova_menu_page .menu li.active a,
.ova-info-content .ova-email a:hover,
.ova-info-content .ova-phone a:hover,
.archive_team .content .items .content_info .ova-info-content .ova-social ul li a:hover i,
.archive_team .ova-info-content .name:hover,
.egovt_list_single_team .elementor-icon-list-items .elementor-icon-list-item .elementor-icon-list-icon i,
.ova_team_single .ova_info .ova-info-content .ova-email a:hover,
.ova_team_single .ova_info .ova-info-content .ova-phone a:hover,
.egovt_counter_team .elementor-counter .elementor-counter-number-wrapper .elementor-counter-number,
.ova-testimonial .slide-testimonials .client_info .icon-quote span::before,
.ova_doc_wrap .ova-doc-sidebar .ova_info .ova-list-cat ul li a:hover,
.ova_doc_wrap .ova_doc_content .doc-meta .doc-categories .cat-doc a:hover,
.ova_doc_wrap .ova_doc_content .ova-list-attachment li .ova-download a,
.ova_doc_wrap.archive-doc .ova_doc_content .items-doc .doc-icon-title .doc-title-item .doc-title a:hover,
.egov_editor_check svg,
.ova_dep_wrap .ova-dep-sidebar .ova_info .ova-list-dep ul li a:hover,
.ova_dep_wrap .ova-dep-sidebar .ova_info .dep-file-sidebar .ova-file-name-size .ova-file-name a:hover,
.ova_list_dep .content .icon-dep span::before,
.ova_list_dep .content .title-dep a:hover,
.ova_list_dep .content .dep-content-sub .dep-readmore:hover,
.ova_dep_wrap .ova_dep_content .ova-list-attachment li .ova-download a,
.archive_dep .content .ova-content .title a:hover,
.archive_dep .content .items:hover .ova-content .icon span i::before,
.ova_list_checked ul li svg,
.ova_feature .title a:hover,
.ova_feature .content-sub .readmore:hover,
.ova_feature .icon span::before,
.ova_sev_wrap .ova-sev-sidebar .ova_info .sev-file-sidebar .ova-file-name-size .ova-file-name a:hover,
.ova_sev_list_file .ova-list-attachment li .ova-download a:hover,
.ova_sev_wrap .ova-sev-sidebar .ova_info .ova-list-sev ul li a:hover,
.egovt-tab.elementor-widget-tabs .elementor-tabs .elementor-tabs-content-wrapper .elementor-tab-title.elementor-active,
.ova_feature.version_2 .items .title a:hover,
.ova_sev_list_file .ova-list-attachment li .ova-file-name-size .ova-file-name a:hover,
.archive_sev .items .icon span::before,
.archive_sev .items .title a:hover,
.archive_sev .items .content-sub .readmore:hover,
.ovaev-content.content-grid .desc .event_post .post_cat a.event_type:hover,
.ovaev-content.content-grid .desc .event_post .event_title a:hover,
.ovaev-content.content-grid .desc .event_post .post_cat a.event_type:hover,
.ovaev-content.content-list .desc .event_post .event_title a:hover,
.ovaev-content.content-list .date-event .date-month,
.ovaev-content.content-list .desc .event_post .post_cat a.event_type:hover,
.ovaev-content.content-list .content .desc .event_post .event_title a:hover,
.sidebar-event .widget_list_event .list-event .item-event .ova-content .title a:hover,
.sidebar-event .widget_feature_event .event-feature .item-event .desc .event_post .event_title a:hover,
.sidebar-event .widget_feature_event .event-feature .item-event .desc .event_post .post_cat .event_type:hover,
.sidebar-event .widget_list_event .button-all-event a:hover,
.single_event .event_content .event-tags a:hover,
.single_event .event_content .event-related .item-event .desc .event_post .post_cat .event_type:hover,
.single_event .event_content .event-related .item-event .desc .event_post .event_title a:hover,
.ova-team-slider .content .items .ova-info a.name:hover,
.single_event .event_content .tab-Location .tab-content .contact .info-contact li a.info:hover,
.ovaev-event-element .title-event,
.ovaev-event-element .item .title a:hover,
.wrap-portfolio .archive-por .content-por .ovapor-item .content-item .category a:hover,
.wrap-portfolio .archive-por .content-por .ovapor-item .content-item .title a:hover,
.wrap-portfolio .single-por .wrap-content-por .info-por a:hover,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .pre .num-2 span,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .next .num-2 span,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .pre .num-1 a:hover i,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .next .num-1 a:hover i,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .pre .num-2 a:hover,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .next .num-2 a:hover,
.wrap-related-por .related-por .ovapor-item .content-item .category a:hover,
.wrap-related-por .related-por .ovapor-item .content-item .title a:hover,
.wrap-portfolio .single-por .info-por a:hover,
.woocommerce .ova-shop-wrap .content-area ul.products li.product .woocommerce-loop-product__title a:hover,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_products ul.product_list_widget li a .product-title:hover,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_product_tag_cloud .tagcloud a:hover,
.woocommerce .ova-shop-wrap .content-area .product .summary .product_meta .posted_in a:hover,
.woocommerce .ova-shop-wrap .content-area .product .summary .product_meta .tagged_as a:hover,
.woocommerce .ova-shop-wrap .content-area .product .summary .woocommerce-product-rating .star-rating span,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #comments ol.commentlist li .comment_container .comment-text .star-rating,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #review_form_wrapper #review_form #respond .comment-form .comment-form-rating .stars:hover a,
.woocommerce ul.products li.product .star-rating,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_products ul.product_list_widget li .star-rating,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.product-name a:hover,
.woocommerce .ova-shop-wrap .content-area .product .summary form.cart table.variations tr td .reset_variations:hover,
.woocommerce .ova-shop-wrap .content-area .product .summary form.cart table.group_table td a:hover,
.ova-history .wp-item .wp-year .year,
.egovt_icon_couter.elementor-widget-html .elementor-widget-container i::before,
.ova-document-list .list-doc .item h3.title a:hover,
.ova-document-list .readmore a:hover,
.ovaev-event-element .desc .event_post .post_cat .event_type:hover,
.ovaev-event-element .desc .event_post .event_title a:hover,
.ovaev-event-element.version_2 .title-readmore .read-more:hover,
.ova_feature_box.version_1 .ova-content .title a:hover,
.ova_feature_box.version_1 .ova-content .readmore a:hover,
.ova_feature_box.version_2 .ova-content .title a:hover,
.ova_feature_box.version_3 .ova-content .readmore a:hover,
.ova_por_slide.por_element .ovapor-item .content-item .category a:hover,
.ova_por_slide.por_element .ovapor-item .content-item .title a:hover,
.ova_box_resource .title a,
.ova_box_contact .phone a,
.ova_contact_slide .owl-carousel .owl-nav > button:hover i,
.ova_contact_slide .slide-contact .item .mail a:hover,
.ova_contact_slide .slide-contact .item .phone a:hover,
.woocommerce #customer_login .woocommerce-form.woocommerce-form-login .form-row.woocommerce-form-row.rememberme_lost_password a:hover,
.woocommerce ul.egovt-login-register-woo li.active a,
.woocommerce form.woocommerce-form-login.login .form-row.woocommerce-form-row.rememberme_lost_password a:hover,
.ova_dep_wrap .ova-dep-sidebar .ova_info .ova-list-dep ul li.active a,
.ova_sev_wrap .ova-sev-sidebar .ova_info .ova-list-sev .title-list-sev a:hover,
.ova_doc_wrap .ova-doc-sidebar .ova_info .ova-list-cat ul li.active a,
.ova_dep_wrap .ova-dep-sidebar .ova_info .ova-list-dep .title-list-dep:hover,
.ova_sev_wrap .ova-sev-sidebar .ova_info .ova-list-sev ul li.active a,
.ova_menu_page.type1.show-arrow a:hover:before,
.single-post-egovt article.post-wrap .ova-next-pre-post .pre:hover .num-2 .title, 
.single-post-egovt article.post-wrap .ova-next-pre-post .next:hover .num-2 .title,
.single-post-egovt article.post-wrap .ova-next-pre-post .pre .num-2 span.text-label,
.single-post-egovt article.post-wrap .ova-next-pre-post .next .num-2 span.text-label,
.single_event .event_content .ova-next-pre-post .pre:hover .num-2 .title,
.single_event .event_content .ova-next-pre-post .next:hover .num-2 .title,
.single_event .event_content .ova-next-pre-post .pre .num-2 span.text-label,
.single_event .event_content .ova-next-pre-post .next .num-2 span.text-label,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .pre:hover .num-2 .title,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .next:hover .num-2 .title,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .pre span.text-label,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .next span.text-label,
.ova-contact-info.type3 .address a:hover,
.ova-contact-info.type1 .icon svg,
.ova-contact-info.type1 .address a:hover,
.blogname,
.ovatheme_header_default nav.navbar li.active a,
article.post-wrap.sticky .post-meta-content .post-date .ova-meta-general,
article.post-wrap.sticky .post-meta-content .wp-categories .categories a,
article.post-wrap.sticky .post-meta-content .wp-author .post-author a,
article.post-wrap.sticky .post-meta-content .comment .right span,
.ova_box_signature .name-job .name,
.ova_box_feature_2 .icon i:before,
.ova_archive_dep_slide .ova_dep_slide.content .owl-item .items:hover .ova-content .title a:hover,
.ova_box_resource_2 .list-link li a:hover,
.ova_box_resource_2 .title,
.ova_feature_box_2 .ova-content .number,
.ova_box_feature_2:hover .readmore a:hover,
article.post-wrap .post-title h2.post-title a:hover,

.sidebar .widget ul li a:hover

{
	color: {$primary_color};
}

.single-post-egovt article.post-wrap .ova-next-pre-post .pre:hover .num-1 .icon , 
.single-post-egovt article.post-wrap .ova-next-pre-post .next:hover .num-1 .icon,
.single_event .event_content .ova-next-pre-post .pre:hover .num-1 .icon,
.single_event .event_content .ova-next-pre-post .next:hover .num-1 .icon,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .pre:hover .num-1 .icon,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .next:hover .num-1 .icon,
.ovatheme_header_default nav.navbar ul.dropdown-menu li.active > a,
.ovatheme_header_default nav.navbar ul.dropdown-menu li > a:hover,
.ova_box_feature_2 .readmore a:hover,
.sidebar .widget.widget_tag_cloud .tagcloud a:hover
{
	border-color: {$primary_color};
	background-color: {$primary_color};
}

.egov-link-color a:hover,
.egov-link-color a:hover span
{
	color: {$primary_color} !important;
}

.default article.post-wrap .post-footer .egovt-post-readmore .btn-readmore,
.blog-grid article.post-wrap .post-meta-date .post-meta-content-date,
.content_comments .comments .comment-respond .comment-form p.form-submit #submit,
.ova-single-text,
.ova_wrap_search_popup .ova_search_popup .search-form .search-submit,
.ova-skill-bar .cove-killbar .skillbar-bar,
.ova_social .content a:hover,
.egovt_button .elementor-button-wrapper .elementor-button,
.ova-testimonial .slide-testimonials .owl-dots .owl-dot.active span,
.archive_dep .content .ova-content .icon span,
.ova_box_learnmore .content,
.ovaev-content.content-grid .date-event .date,
.sidebar-event .widget_feature_event .event-feature .item-event .date-event .date,
.single_event .event_content .event_intro .wrap-date-time-loc .wrap-date,
.single_event .event_content .event_intro .wrap-date-time-loc .wrap-time,
.single_event .event_content .event_intro .wrap-date-time-loc .wrap-loc,
.single_event .event_content .tab-Location ul.nav li.nav-item a.active::after,
.single_event .event_content .tab-Location ul.nav li.nav-item a:hover::after,
.single_event .event_content .event-related .item-event .date-event .date,
.ova_time_countdown .ova-button a:hover,
.ova-team-slider .owl-dots .owl-dot.active span,
.archive_event_type3 .filter-cat-event ul li.active a,
.archive_event_type3 .filter-cat-event ul li a:hover,
.wrap-portfolio .archive-por .content-por .ovapor-item .content-item .readmore a,
.wrap-portfolio .archive-por ul.list-cat-por li:hover a,
.wrap-portfolio .archive-por ul.list-cat-por li.active a,
.wrap-portfolio .archive-por .ova_more_por .ova-load-more-por,
.wrap-portfolio .archive-por .ova-nodata span,
.woocommerce .ova-shop-wrap .content-area ul.products li.product .button,
.woocommerce .ova-shop-wrap .content-area ul.products li.product a.added_to_cart,
.woocommerce .ova-shop-wrap .content-area .product .summary .cart .single_add_to_cart_button,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs .woocommerce-Tabs-panel #reviews #review_form_wrapper #review_form #respond .comment-form .form-submit input,
.woocommerce .ova-shop-wrap .woo-sidebar .widget_price_filter .price_slider_wrapper .price_slider .ui-slider-range,.woocommerce .ova-shop-wrap .woo-sidebar .widget_price_filter .price_slider_wrapper .price_slider_amount .button:hover,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.actions .button,
.woocommerce .cart-collaterals .cart_totals .shop_table tr.woocommerce-shipping-totals .woocommerce-shipping-calculator .button:hover,
.woocommerce .cart-collaterals .cart_totals .checkout-button,
.woocommerce-checkout #payment .place-order #place_order,
.woocommerce-checkout form.checkout_coupon .button,
.egovt_404_page .egovt-go-home a:hover,
.ova-history .wp-item .wp-year .dot .dot2,
.ova_feature.version_3 .items:hover,
.ova-document-list .icon-doc,
.ovaev-event-element .date-event .date,
.ova_feature.version_2 .items:hover .icon,
.egovt_heading_border_left:after,
.ova_list_link,
.ova_por_slide.por_element .ovapor-item .content-item .readmore a:hover,
.ova_por_slide.por_element .owl-dots .owl-dot.active span,
.ova_contact_slide .slide-contact .item h3,
.ova_contact_slide .owl-dots .owl-dot.active span,
.woocommerce #customer_login .woocommerce-form.woocommerce-form-login .woocommerce-form-login__submit,
.woocommerce #customer_login .woocommerce-form.woocommerce-form-register .woocommerce-form-register__submit,
.woocommerce ul.egovt-login-register-woo li.active a::after,
.woocommerce .woocommerce-message a.button,
.woocommerce form.woocommerce-form-login.login .woocommerce-form-login__submit,
#scrollUp,
.ova_feature_box.version_2:hover,
.ova_feature_box.version_2:hover .ova-image a:after,
.single-post-egovt article.post-wrap .ova-next-pre-post .ova-slash:hover span,
.single_event .event_content .ova-next-pre-post .ova-slash:hover span,
.wrap-portfolio .single-por .single-foot-por .ova-next-pre-post .ova-slash:hover span,
.wrap-portfolio .archive-por .content-por.grid-portfolio .ovapor-item .content-item .readmore a:hover,
.wrap-related-por .related-por .ovapor-item .content-item .readmore a:hover,
.elementor-widget-ova_menu .ova_nav ul.menu .dropdown-menu li.active > a,
.elementor-widget-ova_menu .ova_nav ul.menu .dropdown-menu li > a:hover,
.elementor-widget-ova_menu .ova_nav ul.menu .dropdown-menu li a:after,
.ovatheme_header_default nav.navbar ul.dropdown-menu li a:before,
.sidebar .widget.widget_categories li > a:before, 
.sidebar .widget.widget_archive li > a:before,
.sidebar .widget.widget_links li > a:before,
.sidebar .widget.widget_meta li > a:before,
.sidebar .widget.widget_nav_menu li > a:before,
.sidebar .widget.widget_pages li > a:before,
.sidebar .widget.widget_recent_entries li > a:before,
.sidebar .widget.widget_product_categories li > a:before,
.ova_archive_dep_slide .ova_dep_slide .owl-dots .owl-dot.active span,
.ova-team-slider-2 .owl-dots .owl-dot.active span,
.ovaev-event-element.ovaev-event-slide .owl-nav button.owl-prev:hover,
.ovaev-event-element.ovaev-event-slide .owl-nav button.owl-next:hover,
.ova-blog-slide.blog-grid .owl-nav button:hover,
.ovaev-event-element.ovaev-event-slide .owl-dots .owl-dot.active span,
.ova-blog-slide.blog-grid .owl-dots .owl-dot.active span,
.ova_feature_box_2 .ova-content:hover .icon,
.ova_feature_box_3 .readmore a,
.ova_box_feature_2:hover,
.ova_box_resource_2 .list-link li a:before,
.pagination-wrapper .blog_pagination .pagination li.active a,
.pagination-wrapper .blog_pagination .pagination li a:hover

{
	background-color: {$primary_color};
}

.elementor-widget-ova_menu .ova_nav ul.menu .dropdown-menu li.active
{
	border-bottom-color: {$primary_color} !important;
}

.blog_pagination .pagination li.active a,
.blog_pagination .pagination li a:hover,
.blog_pagination .pagination li a:focus,
.sidebar .widget.widget_custom_html .ova_search form .search button,
.mailchimp_custom input[type="submit"],
.contact-form-egovt input[type="submit"],
.ova-form-mail input[type="submit"],
.ova_doc_wrap.archive-doc .ova_doc_content .items-doc .doc-readmore a:hover,
.archive_dep .content .ova-content .readmore:hover,
.search_archive_event form .wrap-ovaev_submit .ovaev_submit,
.ovaev-content.content-list .event-readmore a:hover,
.sidebar-event .widget_feature_event .event-feature .item-event .desc .event_post .button_event .view_detail:hover,
.single_event .event_content .event-related .item-event .desc .event_post .button_event .view_detail:hover,
.woocommerce .ova-shop-wrap .content-area .woocommerce-pagination ul.page-numbers li .page-numbers.current,
.woocommerce .ova-shop-wrap .content-area .woocommerce-pagination ul.page-numbers li .page-numbers:hover,
.woocommerce .ova-shop-wrap .content-area .woocommerce-pagination ul.page-numbers li .page-numbers:focus,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.product-remove a:hover,
.woocommerce .woocommerce-cart-form table.shop_table tbody tr td.actions .coupon .button:hover,
.egovt_404_page .search-form input[type="submit"],
.ova-history .wp-item:hover .wp-year .dot span.dot1,
.ovaev-content.content-grid .desc .event_post .button_event .view_detail:hover
{
	background-color: {$primary_color};
	border-color: {$primary_color};
}

article.post-wrap.sticky,
.egovt-border-color .elementor-element-populated,
.ova_contact_slide .owl-carousel .owl-nav > button:hover,
blockquote,
blockquote.has-text-align-right
{
	border-color: {$primary_color};
}
.egovt-button-color-border-general.elementor-widget-button .elementor-button:hover,
.egovt-button-color-border-header.elementor-widget-button .elementor-button:hover,
.ovaev-event-element .desc .event_post .button_event .view_detail:hover
{
	color: {$primary_color};
	border-color: {$primary_color};
}

.egovt-tab.elementor-widget-tabs .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.elementor-tab-desktop-title.elementor-active,
.wrap-portfolio .archive-por .ova_more_por .ova-loader,
.woocommerce .ova-shop-wrap .content-area .product .woocommerce-tabs ul.tabs li.active
{
	border-top-color: {$primary_color};
}

.wp-block-button.is-style-outline{
	
	
	
		color: {$primary_color};
	
}
.wp-block-button a{
	background-color: {$primary_color};
}


CSS;



return $general_css;


