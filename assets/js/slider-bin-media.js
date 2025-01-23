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

         // Handle media selection for image-slider images
        $('.slider-bin-select-is-images').on('click', function (e) {
            e.preventDefault();

            var button = $(this);
            var fieldContainer = button.closest('.slider-fields');
            var hiddenInput = fieldContainer.find('input[type="hidden"]');
            var previewContainer = fieldContainer.find('.image-preview');

            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media({
                title: 'Select Images',
                button: {
                    text: 'Use Images'
                },
                library: {
                    type: 'image'
                },
                multiple: true
            });

            mediaUploader.on('select', function () {
                var attachments = mediaUploader.state().get('selection').toJSON();
                var urls = attachments.map(function (attachment) {
                    return attachment.url;
                });

                // Store URLs in the hidden input field
                hiddenInput.val(urls.join(','));

                // Display selected images as a preview with caption fields
                var previewHtml = urls.map(function (url) {
                    return `
                        <div class="image-preview-container">
                            <img src="${url}" style="max-width: 100px; margin: 5px;" />
                            <input type="text"
                                   class="image-caption"
                                   name="image_captions[${url}]"
                                   placeholder="Enter image caption"
                                   style="width: 100%; max-width: 300px; margin: 5px 0;" />
                            <button type="button" class="button remove-image-button" data-image-url="${url}">Remove</button>
                        </div>
                    `;
                }).join('');

                previewContainer.html(previewHtml);
            });

            mediaUploader.open();
        });

        // Handle remove image button for image-slider
        $(document).on('click', '.remove-image-button', function() {
            var button = $(this);
            var container = button.closest('.image-preview-container');
            var imageUrl = button.data('image-url');
            var fieldContainer = button.closest('.slider-fields');
            var hiddenInput = fieldContainer.find('input[type="hidden"]');

            // Remove the image container
            container.remove();

            // Update the hidden input with remaining images
            var currentUrls = hiddenInput.val().split(',');
            var newUrls = currentUrls.filter(url => url !== imageUrl);
            hiddenInput.val(newUrls.join(','));
        });

        // Handle WordPress Media Uploader for Videos
        $(document).on('click', '.slider-bin-select-videos', function(e) {
            e.preventDefault();
            const button = $(this);
            const videoGroup = button.closest('.inner-field-wrapper').parent();

            // Create the media frame
            const mediaUploader = wp.media({
                title: 'Select Videos',
                button: {
                    text: 'Use these videos'
                },
                multiple: true, // Allow multiple selection
                library: {
                    type: 'video' // Restrict to video files only
                }
            });

            // When videos are selected
            mediaUploader.on('select', function() {
                const attachments = mediaUploader.state().get('selection').toJSON();

                // Get or create video preview container
                let previewContainer = videoGroup.find('.video-preview');
                if (previewContainer.length === 0) {
                    previewContainer = $('<div class="video-preview" style="margin-top: 10px;"></div>');
                    videoGroup.append(previewContainer);
                }

                // Get existing videos
                let uploadedVideos = $('#slider_bin_videos').val();
                uploadedVideos = uploadedVideos ? uploadedVideos.split(',') : [];

                // Process each selected video
                attachments.forEach(function(attachment) {
                    // Create video preview
                    const videoWrapper = $('<div class="video-wrapper" style="display: inline-block; margin: 10px;"></div>');
                    const videoHtml = `
                        <video
                            width="200"
                            controls
                            style="margin-bottom: 5px; display: block;"
                        >
                            <source src="${attachment.url}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <button type="button" class="button remove-video-preview" style="display: block; margin: 0 auto;">Remove</button>`;

                    videoWrapper.html(videoHtml);
                    previewContainer.append(videoWrapper);

                    // Add to uploaded videos array if not already present
                    if (!uploadedVideos.includes(attachment.url)) {
                        uploadedVideos.push(attachment.url);
                    }
                });

                // Update hidden input with all video URLs
                $('#slider_bin_videos').val(uploadedVideos.join(','));
            });

            // Open the uploader dialog
            mediaUploader.open();
        });

        // Add remove button functionality for uploaded videos
        $(document).on('click', '.remove-video-preview', function() {
            const videoWrapper = $(this).closest('.video-wrapper');
            const videoUrl = videoWrapper.find('video source').attr('src');

            // Remove from hidden input
            let uploadedVideos = $('#slider_bin_videos').val().split(',');
            uploadedVideos = uploadedVideos.filter(url => url !== videoUrl);
            $('#slider_bin_videos').val(uploadedVideos.join(','));

            // Remove preview
            videoWrapper.remove();

            // If no videos left, show placeholder or remove container
            const previewContainer = $('.video-preview');
            if (previewContainer.children().length === 0) {
                previewContainer.remove();
            }
        });

        // Initialize existing video previews on page load
        function initializeVideoPreview() {
            const uploadedVideos = $('#slider_bin_videos').val();
            if (uploadedVideos) {
                const videoUrls = uploadedVideos.split(',');
                const previewContainer = $('.video-preview');

                videoUrls.forEach(url => {
                    if (url.trim()) {
                        const videoWrapper = $('<div class="video-wrapper" style="display: inline-block; margin: 10px;"></div>');
                        const videoHtml = `
                            <video
                                width="200"
                                controls
                                style="margin-bottom: 5px; display: block;"
                            >
                                <source src="${url}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <button type="button" class="button remove-video-preview" style="display: block; margin: 0 auto;">Remove</button>`;

                        videoWrapper.html(videoHtml);
                        previewContainer.append(videoWrapper);
                    }
                });
            }
        }

        // Call initialization on page load
        initializeVideoPreview();


        // Initialize the preview section when the page loads
        $('#hero_image_slider_preview').each(function () {
            var previewContainer = $(this);
            var hiddenInput = $('#hero_images');
            var imageUrls = hiddenInput.val().split(',');

            if (imageUrls.length > 0 && imageUrls[0] !== '') {
                var previewHtml = imageUrls.map(function (url) {
                    return '<img src="' + url + '" style="max-width: 100px; margin-right: 5px;">';
                }).join('');
                previewContainer.html(previewHtml);
            }
        });

    });

// jQuery for Repeater fields Group -- Upload Image -- Functionality

    jQuery(document).ready(function ($) {
        // Handle the "Upload Image" button For repeater Field
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

// Shortcode Copy Functionality
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

