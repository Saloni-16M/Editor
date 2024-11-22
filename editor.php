<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor with AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script> <!-- CKEditor CDN -->
</head>
<body>

<h1>Content Editor</h1>
<textarea id="editor" rows="10" cols="50" placeholder="Write your content here..."></textarea><br>
<button id="submit">Submit</button>

<div id="response"></div>

<!-- <h2>Submitted Content</h2> -->
<!-- <div id="content-area"> -->
    <!-- <?php ; ?> Include the fetching script -->
<!-- </div> -->

<script>
$(document).ready(function() {
    // Initialize CKEditor
    CKEDITOR.replace('editor');

    $('#submit').click(function() {
        // Get the data from CKEditor
        var content = CKEDITOR.instances.editor.getData();

        $.ajax({
            url: 'submit_content.php',
            type: 'POST',
            data: {content: content},
            success: function(response) {
                $('#response').html(response);
                CKEDITOR.instances.editor.setData(''); // Clear CKEditor after submission
                // Refresh the content area
                $('#content-area').load('fetch_data.php');
            },
            error: function() {
                $('#response').html('Error occurred while submitting.');
            }
        });
    });
});
</script>

</body>
</html>