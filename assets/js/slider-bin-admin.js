
// JavaScript for Slider Type toggle Functionality
// Add New Slider Page toggle
    (function($) {
        function toggleFields() {
            console.log('Toggling fields...');
            const sliderType = $('#slider_type').val();
            $('.slider-fields').hide();
            if (sliderType === 'hero_same') {
                $('#hero_same_fields').show();
            } else if (sliderType === 'hero_separate') {
                $('#hero_separate_fields').show();
            } else if (sliderType === 'image') {
                $('#image_fields').show();
            } else if (sliderType === 'post') {
                $('#post_fields').show();
            } else if (sliderType === 'video') {
                $('#video_fields').show();
            }
        }

    $(document).ready(function() {
        toggleFields();
        $('#slider_type').on('change', toggleFields);
    });

    })(jQuery);

// Setting Page Toggling Function.
/**
 * Toggling setting fields...
 * Set slider type in LocalStorage:', sliderType
 * Retrieved slider type from LocalStorage:', storedSliderType
 */
    (function ($) {
        function toggleSettingFields() {
            // console.log('');
            const sliderType = $sliderTypeSettings.val();

            if (sliderType) {
                localStorage.setItem('slider_bin_selected_type', sliderType);
                // Hide all settings
                $('.slider-type-settings').hide();

                // Show the specific settings based on slider type
                switch (sliderType) {
                    case 'hero_same':
                        $('#hero-same-settings').show();
                        break;
                    case 'hero_separate':
                        $('#hero-separate-settings').show();
                        break;
                    case 'image':
                        $('#image-slider-settings').show();
                        break;
                    case 'post':
                        $('#post-slider-settings').show();
                        break;
                    case 'video':
                        $('#video-slider-settings').show();
                        break;
                    default:
                        console.log('No matching slider type found.');
                }
            } else {
                console.warn('Slider type is not set or invalid.');
            }
        }

        // Cache jQuery selector for reuse
        const $sliderTypeSettings = $('#slider_type_settings');

        $(document).ready(function () {

            // Retrieve the stored slider type from LocalStorage
            let storedSliderType = localStorage.getItem('slider_bin_selected_type');
            // If no stored value, set a default to 'hero_same'
            if (!storedSliderType || !$sliderTypeSettings.find(`option[value="${storedSliderType}"]`).length) {
                storedSliderType = 'hero_same';
                localStorage.setItem('slider_bin_selected_type', storedSliderType);
            }

            // Set the dropdown value and toggle fields
            $sliderTypeSettings.val(storedSliderType);
            toggleSettingFields();
            // Handle change event
            $sliderTypeSettings.on('change', toggleSettingFields);
        });
    })(jQuery);

// jQuery for Video Repeater fields Group Functionality

    jQuery(document).ready(function ($) {
        // Add More Button Click
        $('#add_more_video_repeater').on('click', function () {
            var index = $('#video_repeater .video_group').length; // Count the current groups
            var newField = `
                <div class="video_group">
                    <div class="inner-field-wrapper">
                        <label for="video_url_${index}">External Video URL:</label>
                        <input type="url" name="video_urls[]" value="">
                        <button type="button" class="button remove-video">Remove</button>
                    </div>
                </div>
            `;
            $('#video_repeater').append(newField);
        });

        // Remove Video URL Field
        $('#video_repeater').on('click', '.remove-video', function () {
            $(this).closest('.video_group').remove();
        });

        // Add real-time video preview functionality for External Video URL
        $(document).on('input', 'input[name="video_urls[]"]', function() {
            const videoUrl = $(this).val();
            const videoGroup = $(this).closest('.video_group');
            let previewContainer = videoGroup.find('.video-preview');

            // Create preview container if it doesn't exist
            if (previewContainer.length === 0) {
                previewContainer = $('<div class="video-preview" style="margin-top: 10px;"></div>');
                videoGroup.append(previewContainer);
            }

            // Clear existing preview
            previewContainer.empty();

            if (videoUrl) {
                // Check if it's a YouTube URL
                if (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be')) {
                    const videoId = extractYouTubeId(videoUrl);
                    if (videoId) {
                        const embedHtml = `
                            <iframe
                                width="200"
                                height="113"
                                src="https://www.youtube.com/embed/${videoId}"
                                frameborder="0"
                                allowfullscreen
                            ></iframe>`;
                        previewContainer.html(embedHtml);
                    }
                }
                // Check if it's a Vimeo URL
                else if (videoUrl.includes('vimeo.com')) {
                    const videoId = extractVimeoId(videoUrl);
                    if (videoId) {
                        const embedHtml = `
                            <iframe
                                width="200"
                                height="113"
                                src="https://player.vimeo.com/video/${videoId}"
                                frameborder="0"
                                allowfullscreen
                            ></iframe>`;
                        previewContainer.html(embedHtml);
                    }
                }
                // For direct video URLs
                else {
                    const videoHtml = `
                        <video
                            width="200"
                            controls
                            style="margin-right: 5px; display: inline-block;"
                        >
                            <source src="${videoUrl}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>`;
                    previewContainer.html(videoHtml);
                }
            }
        });


    });

// jQuery for Hero Repeater fields Group Functionality
// Different Hero Heading Slider Type Functionality

    jQuery(document).ready(function ($) {
        // Add a new repeater group
        //Hero Repeater Group Functionality
        $(document).on('click', '#add_more_hero_repeater', function () {
            const lastGroup = $('#hero_repeater .hero_group:last');

            if (lastGroup.length === 0) {
                console.error('No hero_group elements found!');
                return;
            }

            // Clone the last group
            const newGroup = lastGroup.clone();

            // Clear all input values and reset the preview
            newGroup.find('input[type="text"], input[type="hidden"], textarea, input[type="url"], select').val('');
            newGroup.find('.hero-image-preview').html(''); // Clear the image preview

            // Add a unique ID or clear attributes (if IDs are being used)
            newGroup.find('.slider-bin-select-hero-image').off('click'); // Remove old event handlers

            // Append the "Remove" button if missing
            if (!newGroup.find('.remove-hero-group').length) {
                newGroup.append('<button type="button" class="button remove-hero-group">Remove</button>');
            }

            // Append the new group
            $('#hero_repeater').append(newGroup);
        });

        // Remove a repeater group
        $(document).on('click', '.remove-hero-group', function () {
            if ($('#hero_repeater .hero_group').length > 1) {
                $(this).closest('.hero_group').remove();
            } else {
                alert('At least one group is required.');
            }
        });

        // Add the "Remove" button to existing groups dynamically if missing
        $('#hero_repeater .hero_group').each(function () {
            if (!$(this).find('.remove-hero-group').length) {
                $(this).append('<button type="button" class="button remove-hero-group">Remove</button>');
            }
        });

        // Handle the "Upload Image" button for Hero Repeater fields Group Functionality
        $(document).on('click', '.slider-bin-select-hero-image', function () {
            const button = $(this);

            // Find the associated hidden input and image preview container
            const hiddenInput = button.siblings('input[type="hidden"]');
            const heroimagePreview = button.closest('.hero_group').find('.hero-image-preview');

            // Use WordPress media uploader
            const mediaUploader = wp.media({
                title: 'Upload Image',
                button: {
                    text: 'Use this image'
                },
                multiple: false // Set to true to allow multiple images to be selected
            });

            mediaUploader.on('select', function () {
                const attachment = mediaUploader.state().get('selection').first().toJSON();
                hiddenInput.val(attachment.url); // Set the hidden input value to the image URL
                heroimagePreview.html('<img src="' + attachment.url + '" style="max-width: 100px; height: auto;" />'); // Show the image preview
            });

            // Open the media uploader
            mediaUploader.open();
        });

    });


//Shortcode Copy Functionality

    jQuery(document).ready(function($) {
        // Handle copy button click using event delegation
        $(document).on('click', '.copy-shortcode', function(e) {
            e.preventDefault();

            var $button = $(this);
            var shortcode = $button.data('shortcode');

            // Create temporary textarea
            var $temp = $('<textarea>');
            $('body').append($temp);
            $temp.val(shortcode).select();

            try {
                // Copy the text
                document.execCommand('copy');

                // Update button text temporarily
                var originalText = $button.text();
                $button.text('Copied!');

                setTimeout(function() {
                    $button.text(originalText);
                }, 2000);

            } catch (err) {
                console.error('Failed to copy text:', err);
            }

            // Remove temporary textarea
            $temp.remove();
        });
    });

// Post Slider By Texonomy - Ajax

    jQuery(document).ready(function ($) {
        // Fetch posts when a category or tag is selected
        $('#category_select, #tag_select').on('change', function () {
            const selectedCategory = $('#category_select').val();
            const selectedTag = $('#tag_select').val();

            // AJAX call
            $.ajax({
                url: ajaxurl, // Default WordPress AJAX URL
                method: 'POST',
                data: {
                    action: 'fetch_posts_by_taxonomy',
                    category_id: selectedCategory,
                    tag_id: selectedTag
                },
                success: function (response) {
                    if (response.success) {
                        $('.slider-preview').html(response.data);
                    } else {
                        $('.slider-preview').html('<p>No posts found.</p>');
                    }
                },
                error: function () {
                    $('.slider-preview').html('<p>An error occurred. Please try again.</p>');
                }
            });
        });
    });
