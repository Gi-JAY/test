<?php
include("function.php");
$id = $_GET["id"];
$row = showPost($id);
?>
<?php
include("template/header.php");
include("template/nav.php");
?>
<div class="container justify-content-center">
    <div class="row justfy-content-center">
        <div class="col-md-8 p-4">
            <h2 class="pb-3"><?php echo $row["title"]; ?></h2>
            <div>作者:<?php echo $row["u_id"]; ?></div>
            <div>分類:<?php echo $row["u_id"]; ?></div>
            <div class="py-4">
                <?php echo $row["content"]; ?>
            </div>
            <div>建立時間:<?php echo $row["created_at"]; ?></div>
            <div>更新時間:<?php echo $row["updated_at"]; ?></div>
        </div>
    </div>
</div>
<?php include("template/footer.php"); ?>