
// Add action hook
add_action('wpcf7_validate_textarea', 'custom_textarea_validation_filter', 10, 2);

function custom_textarea_validation_filter($result, $tag) {
    // Get the form input
    $form_input = $_POST[$tag->name];

    // Define spam words
    $spam_words = array('spam', 'viagra', 'cialis', 'xanax', 'loan', 'credit', 'claim', 'won', 'selected', 'congratulations');

    // Check if any spam word exists in the input
    foreach($spam_words as $spam_word) {
        if(stripos($form_input, $spam_word) !== false) {
            // Add validation error
            $result->invalidate($tag, 'Please remove inappropriate words from your message.');
            break;
        }
    }
    return $result;
}

