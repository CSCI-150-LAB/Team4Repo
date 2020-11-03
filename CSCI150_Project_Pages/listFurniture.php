<?php
    include 'header.php';
    session_start();
    include 'generateListings.php';
?>
<body onload="initialListings()">
	<div class="mainHolder">
        <div>
		    <h1 style="text-align:center">Furniture Listings:</h1>
            <div id="listingHolder">
            <?php
                if ($_SESSION['role'] == 'admin') {
                    echo "
                    <script type='text/html'>
                        <button type='button' onclick='deleteThisListing()' /> 
                    </script>"
                }
            ?>
            </div>

            <div class="pageSwap">
                <div class="prevPage">
                    <a href="#">&lt;&lt;</a>
                </div>
                <div class="pageNumbers"></div>
                <div class="nextPage">
                    <a href="#">&gt;&gt;</a>
                </div>
            </div>
	    </div>
	</div>
</body>
<script type="text/javascript">
    function initialListings() {
        var arr = "<?php echo json_encode(loadEntries('initial')); ?>"

        for (var i = 0; i < arr.length; i++) {
            // going through the holder of the Listings
            var le = document.createElement("div");
            le.cl

        }
    }

</script>