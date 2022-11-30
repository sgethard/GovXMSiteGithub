<?php if (post_password_required()) return; ?>
       
    <div class="content_comments">
        <div id="comments" class="comments">

            <?php if(have_comments()){ ?>
                <div>
                    <h4 class="number-comments"> 
                        <?php comments_number( esc_html__('0 Comments', 'egovt'), esc_html__( '1 Comment', 'egovt' ), esc_html__( '% Comments', 'egovt' ) ); ?>
                    </h4>
                </div>

            <?php } ?>

            <?php if (have_comments()) { ?>
                <ul class="commentlists">
                    <?php wp_list_comments('callback=egovt_theme_comment'); ?>
                </ul>
                <?php
                // Are there comments to navigate through?

                if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                    <footer class="navigation comment-navigation" role="navigation">
                        <div class="nav_comment_text"><?php esc_html_e( 'Comment navigation', 'egovt' ); ?></div>
                        <div class="previous"><?php previous_comments_link(__('&larr; Older Comments', 'egovt')); ?></div>
                        <div class="next right"><?php next_comments_link(__('Newer Comments &rarr;', 'egovt')); ?></div>
                    </footer><!-- .comment-navigation -->
                <?php endif; // Check for comment navigation ?>

                <?php if (!comments_open() && get_comments_number()) : ?>
                    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'egovt' ); ?></p>
                <?php endif; ?>
                
            <?php } ?>

            <?php

           
            $comment_args = array(
                'title_reply' => wp_kses('<span class="title-comment">' . esc_html__( 'Leave Your Comment', 'egovt' ) . '</span>', true),
                'fields' => apply_filters('comment_form_default_fields', array(
                    'phone' => '<input type="text" name="url" value="' . esc_url($commenter['comment_author_url']) . '"  class="form-control" placeholder="'. esc_attr__('Website','egovt') .'" aria-label="'. esc_attr__('Website','egovt') .'" />',
                    
                    'author' => '<div class="wrap-name-email"><input type="text" name="author" value="' . esc_attr($commenter['comment_author']) . '"  class="form-control author" placeholder="'. esc_attr__('Name','egovt') .'" aria-label="'. esc_attr__('Name','egovt') .'" />',
                    'email' => '<input type="text" name="email" value="' . esc_attr($commenter['comment_author_email']) . '"  class="form-control email" placeholder="'. esc_attr__('Email','egovt') .'" aria-label="'. esc_attr__('Email','egovt') .'" /></div>',
                    
                )),
                'comment_field' => '<textarea class="form-control" rows="7" name="comment" placeholder="'. esc_attr__('Write your comment...','egovt') .'" aria-label="'. esc_attr__('Write your comment...','egovt') .'"></textarea>',
                'label_submit' => esc_html__('Post Comment','egovt'),
                'comment_notes_before' => '',
                'comment_notes_after' => '',
            );
            ?>

            <?php global $post; ?>
            <?php if ('open' == $post->comment_status) { ?>
                <div class="wrap_comment_form">
                        <div class="row">
                            <div class="col-md-12">
                                <?php comment_form($comment_args); ?>        
                            </div>
                        </div>
                        
                    
                </div><!-- end commentform -->
            <?php } ?>


        </div><!-- end comments -->
    </div>