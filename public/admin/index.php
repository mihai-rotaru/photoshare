<?php
require_once( "../../include/init.php" );
if( !$session->is_logged_in() ) { redirect_to( "login.php" ); }
?>

<?php include_layout_template( "admin_header.php" ); ?>
    <?php
    
    $user = User::find_by_id(1);
    echo $user->full_name();

    echo "<hr/>";
    echo "<h4>All users:</h4><br/>";
    $users = User::find_all();
    foreach( $users as $user ) {
        echo "User: " . $user->username . "<br/>";
        echo "Name: " . $user->full_name() . "<br/><br/>";
    }

    info_message( $message );
    ?>
    <form action="none.php">
    	<a href="upload.php" class="button">Upload</a>
    	<a href="show_photos.php" class="button">View Photos</a>
    </form>
<?php include_layout_template( "admin_footer.php" ); ?>
