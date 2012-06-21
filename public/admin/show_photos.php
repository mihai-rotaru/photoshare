<?php
require_once( "../../include/init.php" );
if( !$session->is_logged_in() ) { redirect_to( "login.php" ); }
include_layout_template( "admin_header.php" );
?>

<?php
$photos = array();
$photos = Photograph::find_all();

info_message( $message );

if( !empty( $photos )) {
    // table header
    echo( "
        <table> 
        <tr>
        <th>Name</th>
        <th>Size</th>
        <th>Caption</th>
        <th colspan='3'>Actions</th>
        </tr>
        " );
    foreach( $photos as $photo ) {
        echo( "
            <tr>
            <td><img src=\"" . $photo->image_path() . "\" width=100 /></td>
            <td>" . $photo->filename . "</td>" . "
            <td>" . $photo->human_readable_size() . "</td>
            <td>" . $photo->caption . "</td>" . "
            <td><a href=\"#\">Rename</a></td>
            <td><a href=\"delete.php?id=" . $photo->id . "\">Delete</a></td>
            <td><a href=\"#\">Download</a></td>
            </tr>
            ");
    }
    echo( "</table>" );
} else {
    echo( "<p>There are no photos to display.</p>" );
}
?>
<div class="actions">
    <a href="upload.php" class="link-button">Upload photo</a>
</div>
<?php include_layout_template( "admin_footer.php" ); ?>