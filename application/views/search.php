<?php 
foreach ($search_res as $row) { ?>
<li>
<?php
    echo $row ->pt_role;
    echo "推荐";
    echo $row ->pt_content;
?>
</li>
<?php } ?>


