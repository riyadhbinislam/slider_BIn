// JavaScript for Select Image And Video From Media Functionality

    jQuery(document).ready(function ($) {
        var mediaUploader;

        // Handle media selection for images
        $('.slider-bin-select-images').on('click', function (e) {
            e.preventDefault();

            var button = $(this); // The button that was clicked
            var fieldContainer = button.closest('.slider-fields'); // Parent field container
            var hiddenInput = fieldContainer.find('input[type="hidden"]'); // Related hidden input
            var previewContainer = fieldContainer.find('.image-preview'); // Related preview container

            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media({
                title: 'Select Images', // Title for media modal
                button: {
                    text: 'Use Images' // Button text
                },
                library: {
                    type: 'image' // Filter for images
                },
                multiple: true // Allow multiple selection
            });

            mediaUploader.on('select', function () {
                var attachments = mediaUploader.state().get('selection').toJSON();
                var urls = attachments.map(function (attachment) {
                    return attachment.url;
                });

                // Store URLs in the hidden input field
                hiddenInput.val(urls.join(','));

                // Display selected images as a preview
                var previewHtml = urls.map(function (url) {
                    return '<img src="' + url + '" style="max-width: 100px; margin-right: 5px;">';
                }).join('');
                previewContainer.html(previewHtml);
            });

            mediaUploader.open();
        });

        // Handle media selection for videos
        $('.slider-bin-select-videos').on('click', function (e) {
            e.preventDefault();

            var button = $(this); // The button that was clicked
            var fieldContainer = button.closest('.slider-fields'); // Parent field container
            var hiddenInput = fieldContainer.find('input[type="hidden"]'); // Related hidden input
            var previewContainer = fieldContainer.find('.video-preview'); // Related preview container

            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media({
                title: 'Select Videos', // Title for media modal
                button: {
                    text: 'Use Videos' // Button text
                },
                library: {
                    type: ['video'] // Filter for videos
                },
                multiple: true // Allow multiple selection
            });

            mediaUploader.on('select', function () {
                var attachments = mediaUploader.state().get('selection').toJSON();
                var urls = attachments.map(function (attachment) {
                    return attachment.url;
                });

                // Store URLs in the hidden input field
                hiddenInput.val(urls.join(','));

                // Display selected videos as a preview
                var previewHtml = urls.map(function (url) {
                    return '<video src="' + url + '" controls style="max-width: 200px; margin-right: 5px;"></video>';
                }).join('');
                previewContainer.html(previewHtml);
            });

            mediaUploader.open();
        });

    });

// jQuery for Repeater fields Group -- Upload Image -- Functionality

    jQuery(document).ready(function ($) {
        // Event delegation for the "Upload Image" button
        $(document).on('click', '.slider-bin-select-image', function () {
            const button = $(this);

            // Use closest() to find the appropriate image preview div
            const hiddenInput = button.siblings('input[type="hidden"]');
            const imagePreview = button.closest('.inner-field-wrapper').siblings('.image-preview');

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
                imagePreview.html('<img src="' + attachment.url + '" style="max-width: 100px; height: auto;" />'); // Show the image preview
            });

            // Open the media uploader
            mediaUploader.open();
        });
    });

// JavaScript for Slider Type toggle Functionality

    (function($) {
        function toggleFields() {
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

// jQuery for Post Repeater fields Group Functionality

    jQuery(document).ready(function ($) {
        $(document).on('click', '#add_more_repeater', function () {
            console.log('Add More button clicked');
            const lastGroup = $('#post_repeater .post_group:last');
            console.log('Last group:', lastGroup);

            if (lastGroup.length === 0) {
                console.error('No post_group elements found!');
                return;
            }

            const newGroup = lastGroup.clone();
            newGroup.find('input[type="text"], input[type="hidden"], textarea, select').val('');
            newGroup.find('.image-preview').html('');

            $('#post_repeater').append(newGroup);
            console.log('New group added');
        });
        // Remove repeater group
        $(document).on('click', '.remove-repeater', function () {
            const groupToRemove = $(this).closest('.post_group');

            if ($('#post_repeater .post_group').length > 1) {
                groupToRemove.remove();
                console.log('Group removed');
            } else {
                alert('At least one post group must remain.');
            }
        });

        // Event delegation for dynamically added .post-select dropdowns
        $(document).on('change', '.post-select', function () {
            const postId = $(this).val(); // Selected post ID
            const parentGroup = $(this).closest('.post_group'); // Parent group to update fields

            if (postId) {
                fetch(`${ajaxurl}?action=get_post_data&post_id=${postId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update fields
                            parentGroup.find('[name="post_heading[]"]').val(data.data.title);
                            parentGroup.find('[name="post_subheading[]"]').val(data.data.excerpt);
                            parentGroup.find('[name="post_image[]"]').val(data.data.image_url);
                            parentGroup.find('[name="post_url[]"]').val(data.data.link);

                            // Update Image Preview
                            const previewDiv = parentGroup.find('.image-preview');
                            previewDiv.html(`<img src="${data.data.image_url}" alt="Preview" style="max-width: 100px;">`);
                        } else {
                            console.error(data.message);
                        }
                    })
                    .catch(error => console.error("Error fetching post data:", error));
            }
        });
    });

// jQuery for Video Repeater fields Group Functionality

    jQuery(document).ready(function ($) {
        // Add More Button Click
        $('#add_more_video_repeater').on('click', function () {
            var index = $('#video_repeater .video_group').length; // Count the current groups
            var newField = `
                <div class="video_group">
                    <div class="inner-field-wrapper">
                        <label for="video_url_${index}">Custom Video URL:</label>
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
    });

// jQuery for Hero Repeater fields Group Functionality

    jQuery(document).ready(function ($) {
        $(document).on('click', '#add_more_hero_repeater', function () {
            console.log('Hero Add More button clicked');
            const lastGroup = $('#hero_repeater .hero_group:last');
            console.log('Last group:', lastGroup);

            if (lastGroup.length === 0) {
                console.error('No post_group elements found!');
                return;
            }

            const newGroup = lastGroup.clone();
            newGroup.find('input[type="text"], input[type="hidden"], textarea, select').val('');
            newGroup.find('.image-preview').html('');

            $('#hero_repeater').append(newGroup);
            console.log('New group added');
        });
    });


// jQuery for Post Slider Blog Post data Call ---- Functionality

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".post-select").forEach(function (select) {
        select.addEventListener("change", function () {
            const postId = this.value; // Selected post ID
            const parentGroup = this.closest(".post_group"); // Parent group to update fields

            if (postId) {
                fetch(`${ajaxurl}?action=get_post_data&post_id=${postId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update fields
                            parentGroup.querySelector('[name="post_heading[]"]').value = data.data.title;
                            parentGroup.querySelector('[name="post_subheading[]"]').value = data.data.excerpt;
                            parentGroup.querySelector('[name="post_image[]"]').value = data.data.image_url;

                            // Update Image Preview
                            const previewDiv = parentGroup.querySelector(".image-preview");
                            previewDiv.innerHTML = `<img src="${data.data.image_url}" alt="Preview" style="max-width: 100px;">`;
                        } else {
                            console.error(data.message);
                        }
                    })
                    .catch(error => console.error("Error fetching post data:", error));
            }
        });
    });
});