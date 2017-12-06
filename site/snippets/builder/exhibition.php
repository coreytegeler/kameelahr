<?php
echo $data->title();
if( $data->title()->notEmpty() ) {
	echo '<strong>' . $data->title() . '</strong>';
}
?>