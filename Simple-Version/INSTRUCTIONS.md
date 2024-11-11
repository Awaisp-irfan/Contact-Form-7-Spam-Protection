**Spam Protection for Contact Form 7 - Simple Version**

This code snippet provides basic spam protection for Contact Form 7 by blocking submissions that contain certain spam keywords. The snippet is designed to be user-friendly, requiring minimal setup and technical knowledge.

**Setup Instructions**

**Step 1: Copy the Code**

Copy the code and paste it into your WordPress theme's functions.php file or add it using a plugin like **Code Snippets** (recommended for ease and safety):

**Step 2: Save and Test**

After adding the code to your site:

Save the changes in your functions.php file or activate the snippet if using a plugin.
Test the form by submitting messages with and without the listed spam words to confirm the code is working as expected


**Customization**
Add or remove keywords: To customize the spam words, simply update the $spam_words array in the code. Add words in quotes and separate them with commas:

$spam_words = array('spam', 'viagra', 'cialis', 'xanax', 'loan', 'credit', 'claim', 'won', 'selected', 'congratulations', 'newword');

Adjust the error message: If you want to change the message shown to users, modify the text in this line:

$result->invalidate($tag, 'Please remove inappropriate words from your message.');


**Troubleshooting**
If the form isn’t blocking spam as expected, ensure that:
-The code is properly saved and active.
-Contact Form 7 and any required plugins are up-to-date.
-If errors occur after saving, double-check that the code was copied and pasted correctly, with no missing characters or syntax errors.
