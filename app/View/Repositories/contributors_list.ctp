<?php
if (!empty($contributors)) {
    foreach ($contributors as $contributor) {
        ?>
    <li><?php echo $contributor['login'];?></li>
    <?php
    }
} else {
    echo "<li>No Users</li>";
}
?>