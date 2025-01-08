
// JavaScript for Slider Type toggle Functionality
    (function($) {
        function toggleFields() {
            console.log('Toggling fields...');
            const sliderType = $('#slider_type').val();
            localStorage.setItem('slider_bin_selected_type', sliderType);
            $('.slider-fields').hide();
            $('.slider-type-settings').hide();
            if (sliderType === 'hero_same') {
                $('#hero_same_fields').show();
                $('#hero-same-settings').show();
            } else if (sliderType === 'hero_separate') {
                $('#hero_separate_fields').show();
                $('#hero-separate-settings').show();
            } else if (sliderType === 'image') {
                $('#image_fields').show();
                $('#image-slider-settings').show();
            } else if (sliderType === 'post') {
                $('#post_fields').show();
                $('#post-slider-settings').show();
            } else if (sliderType === 'video') {
                $('#video_fields').show();
                $('#video-slider-settings').show();
            }
        }

        // $(document).ready(function() {
        //     toggleFields();
        //     $('#slider_type').on('change', toggleFields);
        // });
        $(document).ready(function() {
            // Retrieve the stored slider type from local storage
            const storedSliderType = localStorage.getItem('slider_bin_selected_type');
            if (storedSliderType) {
                $('#slider_type').val(storedSliderType);
            }
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

            // Update the data-group-index for the new group
            const newIndex = $('.post_group').length;
            newGroup.find('.post-select').attr('data-group-index', newIndex);

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
            const selectedOption = $(this).find('option:selected');
            const permalink = selectedOption.data('permalink'); // Get permalink from data attribute

            if (postId) {
                fetch(`${ajaxurl}?action=get_post_data&post_id=${postId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update fields
                            parentGroup.find('[name="post_heading[]"]').val(data.data.title);
                            parentGroup.find('[name="post_subheading[]"]').val(data.data.excerpt);
                            parentGroup.find('[name="post_image[]"]').val(data.data.image_url);

                            // Store both post ID and permalink
                            parentGroup.find('[name="post_url[]"]').val(postId);
                            parentGroup.find('[name="post_url[]"]').attr('data-permalink', permalink);

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

        // Add debug logging for form submission
        $('form#post').on('submit', function() {
            console.log('Form data being submitted:', $(this).serialize());
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


// jQuery for Post Slider Blog Post data Call ---- Functionality
    document.addEventListener("DOMContentLoaded", function () {
        const ajaxurl = window.ajaxurl || '';

        // Handle post selection changes
        const handlePostChange = async (selectElement) => {
            const postId = selectElement.value; // Selected post ID
            const parentGroup = selectElement.closest(".post_group"); // Find parent group

            if (!postId) return;

            try {
                // Fetch post data via AJAX
                const response = await fetch(`${ajaxurl}?action=get_post_data&post_id=${postId}`);
                const data = await response.json();

                if (data.success) {
                    // Update fields with fetched data
                    parentGroup.querySelector('[name="post_heading[]"]').value = data.data.title || '';
                    parentGroup.querySelector('[name="post_subheading[]"]').value = data.data.excerpt || '';
                    parentGroup.querySelector('[name="post_image[]"]').value = data.data.image_url || '';

                    // Update image preview
                    const previewDiv = parentGroup.querySelector(".image-preview");
                    previewDiv.innerHTML = data.data.image_url
                        ? `<img src="${data.data.image_url}" alt="Preview" style="max-width: 100px;">`
                        : '';
                } else {
                    console.error(data.data.message || 'Failed to fetch post data');
                }
            } catch (error) {
                console.error('Error fetching post data:', error);
            }
        };

        // Attach change event listener to each post select dropdown
        document.querySelectorAll(".post-select").forEach((select) => {
            select.addEventListener("change", function () {
                handlePostChange(this);
            });
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


//toggole Arrow Icon Functionality

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.custom-dropdown').forEach(function (dropdown) {
            const selected = dropdown.querySelector('.dropdown-selected');
            const options = dropdown.querySelector('.dropdown-options');
            const optionItems = options.querySelectorAll('.option');
            const hiddenInput = dropdown.querySelector('input[type="hidden"]');

            // Toggle dropdown visibility
            selected.addEventListener('click', function (e) {
                e.stopPropagation(); // Prevent event bubbling
                options.classList.toggle('active');
            });

            // Handle option selection
            optionItems.forEach(function (option) {
                option.addEventListener('click', function () {
                    const selectedValue = option.getAttribute('data-value');
                    const imgElement = option.querySelector('img');

                    // Update hidden input value
                    if (hiddenInput) {
                        hiddenInput.value = selectedValue;
                    }

                    // Update selected display
                    if (imgElement) {
                        selected.innerHTML = `<img src="${imgElement.src}" alt="${selectedValue}" />`;
                    }

                    // Update selected state
                    optionItems.forEach(item => item.classList.remove('selected'));
                    option.classList.add('selected');

                    // Close dropdown
                    options.classList.remove('active');

                    console.log('Selected Value:', selectedValue);
                });
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (event) {
                if (!dropdown.contains(event.target)) {
                    options.classList.remove('active');
                }
            });
        });
    });

