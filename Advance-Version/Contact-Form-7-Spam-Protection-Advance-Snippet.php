// Add action hook for Contact Form 7 textarea validation
add_action('wpcf7_validate_textarea', 'custom_textarea_validation_filter', 10, 2);

function custom_textarea_validation_filter($result, $tag) {
    // Get the message input from the form
    $form_input = isset($_POST[$tag->name]) ? $_POST[$tag->name] : '';
    $honeypot = isset($_POST['honeypot']) ? $_POST['honeypot'] : ''; // honeypot field

    // Reject submission if honeypot field is filled (indicates a bot)
    if (!empty($honeypot)) {
        $result->invalidate($tag, 'Spam detected. Please try again.');
        return $result;
    }

    // Define spam words to block
    $spam_words = array(
        '/\bspam\b/i', '/\bviagra\b/i', '/\bcialis\b/i', '/\bxanax\b/i',
        '/\bloan\b/i', '/\bcredit\b/i', '/\bclaim\b/i', '/\bwon\b/i',
        '/\bselected\b/i', '/\bcongratulations\b/i'
    );

    // Check if any spam word is present in the message
    foreach ($spam_words as $pattern) {
        if (preg_match($pattern, $form_input)) {
            $result->invalidate($tag, 'Please remove inappropriate words from your message.');
            return $result;
        }
    }

    // Check for URLs in the message (blocks links to prevent spam)
    if (preg_match('/https?:\/\/[^\s]+/i', $form_input)) {
        $result->invalidate($tag, 'Links are not allowed in the message.');
        return $result;
    }

    return $result;
}

// Add a hidden honeypot field to the Contact Form 7 form (place this in the form editor)
// Example Contact Form 7 form shortcode: [text honeypot id:honeypot class:hidden]
