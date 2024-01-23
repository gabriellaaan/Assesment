<?php

include 'function.php';

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
			<script>
			alert('Data $id was Deleted');
			document.location.href='index.php';
			</script>

	";
} else {
    echo "
			<script>
			alert('Data Could not be Deleted');
			document.location.href='index.php';
			</script>

	";
}
