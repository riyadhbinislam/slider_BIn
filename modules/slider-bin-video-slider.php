<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<div class="slider-wrapper video-slider">
    <div id="arrow-left" class="arrow"></div>

    <div id="slider">
        <?php
        // Render videos from '_video_urls'
        // Check if '_video_urls' is set and not empty, and render video URLs
        // Loop through each video URL and display it
        if (!empty($video_urls) && is_array($video_urls)) {
            foreach ($video_urls as $video_url) {
                $video_url = esc_url(trim($video_url)); // Sanitize and trim the URL

                if ($video_url) {
                    // Check if URL is a YouTube video
                    if (strpos($video_url, 'youtube.com') !== false || strpos($video_url, 'youtu.be') !== false) {
                        // Extract the YouTube video ID
                        $parsed_url = parse_url($video_url);
                        parse_str($parsed_url['query'] ?? '', $query_params);

                        $youtube_video_id = $query_params['v'] ?? ''; // Get the 'v' parameter from the query string
                        if (!$youtube_video_id && strpos($video_url, 'youtu.be') !== false) {
                            // For shortened youtu.be URLs, extract the path
                            $youtube_video_id = ltrim($parsed_url['path'], '/');
                        }

                        if ($youtube_video_id) {
                            // Convert to YouTube embed URL with autoplay
                            $video_url = "https://www.youtube.com/embed/{$youtube_video_id}?autoplay=1";
                        }
                    }

                    // Check if URL is a Vimeo video
                    if (strpos($video_url, 'vimeo.com') !== false) {
                        // Extract Vimeo video ID using regex
                        preg_match('/(?:vimeo\.com\/(?:video\/)?(\d+))/', $video_url, $matches);
                        $vimeo_video_id = isset($matches[1]) ? $matches[1] : '';
                        if ($vimeo_video_id) {
                            // Convert to Vimeo embed URL with autoplay
                            $video_url = "https://player.vimeo.com/video/{$vimeo_video_id}?autoplay=1";
                        }
                    }

                    ?>

                    <div class="slide video-slide">
                        <iframe
                            width="100%"
                            height="100%"
                            src="<?php echo $video_url; ?>"
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen>
                        </iframe>
                    </div>

                    <?php
                }
            }
        }

        // Render videos from '_slider_bin_videos'
        if (!empty($slider_bin_videos)) {
            $slider_bin_videos = explode(',', $slider_bin_videos);
            foreach ($slider_bin_videos as $media_url) {
                $media_url = esc_url(trim($media_url));
                if ($media_url) {
                    if (strpos($media_url, '.mp4') !== false) {
                        // Render .mp4 videos using <video> tag
                        ?>
                        <div class="slide media-slide">
                            <video width="100%" autoplay muted loop>
                                <source src="<?php echo $media_url; ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <?php
                    } else {
                        // Render other media using <iframe>
                        ?>
                        <div class="slide media-slide">
                            <iframe
                                width="100%"
                                height="auto"
                                src="<?php echo $media_url; ?>?autoplay=1"
                                frameborder="0"
                                allow="autoplay; encrypted-media"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <?php
                    }
                }
            }
        }
        ?>
    </div>

    <div id="arrow-right" class="arrow"></div>
</div>