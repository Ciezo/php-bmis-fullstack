<!-- 
    Filename: config.php
    Description: include() this file if you want to log into browser console.
                 Logging into the browser console can be helpful especially in debugging
    TO USE:
        Example:
            // First, include this inside the php brackets
            include("../console_browser_logger.php"); 

            // Second, simply call the consoleLogger() 
            consoleLogger('String' || $values); 

            // Finally, 
            Press F12, head to the console tab, and see the JS logged message.
 -->

<?php
    function consoleLogger($requestJS) {
        echo "
            <script>
                console.log('$requestJS');
            </script>
        ";
    }

?>