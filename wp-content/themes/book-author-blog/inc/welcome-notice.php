<?php
/**
 * Getting Started Help Notic
 **/
function book_author_blog_general_admin_notice(){
       $msg = sprintf('<div data-dismissible="disable-done-notice-forever" class="notice notice-info book-author-blog-welcome-notice" style="background: #fffde4;">
              <h3>%1$s</h3>
              <p style="margin-bottom: 15px;">%2$s</p><p style="margin-bottom: 10px;">
              <a href="%6$s" class="button">%7$s</a>
              <a class="book-author-blog-btn-get-started button button-primary book-author-blog-button-padding" href="%4$s" data-name="" data-slug="">%3$s</a>
              <a href="%4$s" target="new" class="button button-highlight" style="background-color: #d9ff78; color: #000; border-color: #d9ff78;">%5$s</a>
              <a href="%9$s" target="new" class="button button-highlight" style="background-color: #e85e61; color: #fff; border-color: #d9ff78;">%10$s</a>
              <a href="?book_author_blog_notice_dismissed" style="text-decoration: none; float: right;" >%8$s</a>
              </p></div>',
              esc_html__('Get Most out of the theme','book-author-blog'),
              esc_html__('Congratulations! You have successfully activated Book Author Blog theme. Go to Appearance->Customize->Global Settings. you will find all options in one panel.','book-author-blog'),
              esc_html__('Live Demo', 'book-author-blog'),
              esc_url('https://rswpthemes.com/author-portfolio-pro-wordpress-theme/'),
              esc_html__('Upgrade To Pro', 'book-author-blog'),
              esc_url(admin_url()."customize.php"),
              esc_html__('Go to Customizer', 'book-author-blog'),
              esc_html__('Dismiss Notice', 'book-author-blog'),
              esc_url('https://rswpthemes.com/author-website-design-with-wordpress-video-course/'),
              esc_html__('Free Video Course To Build Author Website.', 'book-author-blog'));
       echo wp_kses_post($msg);
}

if ( isset( $_GET['book_author_blog_notice_dismissed'] ) ){
          //set notice value false
          update_option('book_author_blog_help_notice', 'notice_book_author_blog_dismissed');
}

$book_author_blog_help_notice = get_option('book_author_blog_help_notice', '');

if (($book_author_blog_help_notice != 'notice_book_author_blog_dismissed' || $book_author_blog_help_notice === '') ){
          add_action('admin_notices', 'book_author_blog_general_admin_notice');
}