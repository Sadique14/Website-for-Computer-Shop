    <?php
	$option = new others();
	$result = $option->getOptions();
?>    
        <footer>
            <p style="font-size: 15px;"><?php if($result[0]['email']){echo $result[0]['email'];} ?> • telephone <?php if($result[0]['telephone']){echo $result[0]['telephone'];} ?></p>
            <center>
                    <ul class="footer-nav">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="<?php if($result[0]['press']){ echo $result[0]['press'];} ?>" target="_blank">Press</a></li>
                        <li><a href="<?php if($result[0]['app']){ echo $result[0]['app'];} ?>" target="_blank">App</a></li>
                    </ul>
            </center>
            <div class="row">
                <p style="font-size: 12px;">
                    <?php if($result[0]['copyrightInfo']){echo $result[0]['copyrightInfo'];} ?>
                </p>
            </div>
        </footer>
        
        <script src="vendors/js/script.js"></script>
        <script src="vendors/js/modal.js"></script>
    </body>
    
</html>