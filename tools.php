<?php
	define("MAIN_PAGE", "main.php");

	function requestValue($name) {
		return isset($_REQUEST[$name])?$_REQUEST[$name]:"";
	}


	function errorBack($msg) {
	?>
		<script>
			alert('<?= $msg ?>');
			history.back();
		</script>		

	<?php	
		exit();

	}

	function okGo($msg, $url) {
    ?>
		<script>
				alert('<?= $msg ?>');
				location.href = '<?= $url ?>';
		</script>
		
    <?php
    	exit();

	}


	function goNow($url) {
    ?>
		<script>				
				location.href = '<?= $url ?>';
		</script>
		
    <?php
    	exit();

	}



?>
