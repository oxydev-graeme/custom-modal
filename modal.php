<?php
/*
Plugin Name: Custom Modal Plugin
Description: A simple WordPress plugin that creates a shortcode to display a button opening a modal.
Version: 1.0
Author: TopFire Media
*/

// Register the shortcode
function custom_modal_shortcode() {
    ob_start();
    ?>
    <button class="custom-modal-button">Open Modal</button>
    <div id="custom-modal" class="custom-modal">
        <div class="custom-modal-content">
            <!-- Content goes here -->
            <?php echo do_shortcode('[custom_modal_content]'); ?>
        </div>
    </div>
    <style>
        /* Add your modal styles here */
        .custom-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .custom-modal-content {
            background: #fff;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 5px;
            position: relative;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('custom-modal');
            var modalButton = document.querySelector('.custom-modal-button');

            modalButton.addEventListener('click', function () {
                modal.style.display = 'flex';
            });

            window.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_modal', 'custom_modal_shortcode');

// Register the shortcode for modal content
function custom_modal_content_shortcode($atts, $content = null) {
    return '<div class="custom-modal-inner-content">' . do_shortcode($content) . '</div>';
}
add_shortcode('custom_modal_content', 'custom_modal_content_shortcode');
