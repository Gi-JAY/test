<?php
include("function.php");
$rows = showAllPosts();
include("template/header.php");
include("template/nav.php");
include("template/footer.php");
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-4">
            <h2>文章列表</h2>
        </div>
        <?php foreach ($rows as $row) { ?>
            <div class="col-md-8 p-4 border mb-5">
                <h3><?php echo $row["title"]; ?></h3>
                <div>作者<?php echo $row["u_id"]; ?></div>
                <div>分類<?php echo $row["c_id"]; ?></div>
                <div class="py-4">
                    <?php echo mb_substr($row["content"], 0, 200, "utf-8") . "..."; ?>
                </div>
                <a href="showPost.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">繼續閱讀</a>
                <a href="deletePost.php?id=<?php echo $row["id"] ?>" class="btn btn-danger" onclick="return confirm('確認刪除?')">刪除</a>
                <a href="editPost.php?id=<?php echo $row["id"]; ?>" class="btn btn-success">編輯</a>
                <div>建立時間:<?php echo $row["created_at"]; ?></div>
                <div>更新時間:<?php echo $row["updated_at"]; ?></div>
            </div>
        <?php } ?>
    </div>
</div>