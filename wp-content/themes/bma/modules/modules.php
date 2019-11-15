<?php
if (get_row_layout() == 'text') {
    include('_text.php');
} else if (get_row_layout() == 'add_extra_margin') {
    include('_add-extra-margin.php');
} else if (get_row_layout() == 'revolution_slider') {
    include('_rev-slider.php');
} else if (get_row_layout() == 'quote_block') {
    include('_quote.php');
} else if (get_row_layout() == 'content_with_video') {
    include('_content-with-video.php');
} else if (get_row_layout() == 'service_blocks') {
    include('_lean-services.php');
} else if (get_row_layout() == 'latest_blog_posts') {
    include('_latest_blog_posts.php');
} else if (get_row_layout() == 'cta_block_with_button') {
    include('_cta-block-with-button.php');
} else if (get_row_layout() == 'blog_categories') {
    include('_home-category-listing.php');
} else if (get_row_layout() == 'button_cta') {
    include('_landing-button-cta.php');
} else if (get_row_layout() == 'full_width_video') {
    include('_landing-full-width-video.php');
} else if (get_row_layout() == 'meet_our_lean_experts') {
    include('_meet-our-lean-experts.php');
} else if (get_row_layout() == 'manufacturing_consulting_services') {
    include('_manufacturing-consulting-services.php');
} else if (get_row_layout() == 'full_width_cta_with_background_image') {
    include('_fullwidth-cta-with-bg-image.php');
} else if (get_row_layout() == 'category_tags_and_posts_listing') {
    include('_category-tag-posts-listing.php');
}else if (get_row_layout() == 'recent_events') {    
    include('_recent-events.php');
}else if (get_row_layout() == 'cta_block_with_email_capture') {    
    include('_cta-block-with-email-capture.php');
}else if (get_row_layout() == '3_column_cta') {    
    include('_3_column_cta.php');
}else if (get_row_layout() == 'horizontal_rule') {    
    include('_horizontal-rule.php');
}

?>