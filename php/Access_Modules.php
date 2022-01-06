<?php
if(!($_SESSION['PROFILE']['Modules']=="AfficherE")){
    header("location:$_SERVER[HTTP_REFERER]");
}
?>