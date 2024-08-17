<?php if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_REQUEST['ok'])){ 

        showMessage($_REQUEST['ok']);

}