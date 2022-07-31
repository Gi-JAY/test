<?php
include("function.php");
$row = showPost($_GET["id"]);
?>
<?php include("template/header.php"); ?>
<?php include("template/nav.php"); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <h2>編輯文章</h2>
        </div>
        <div class="col-md-8 py-4">
            <form action="updatePost.php" method="post">
                <div class="form-group">
                    <label for="title">文章標題</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo $row["title"]; ?>">
                </div>
                <div class="form-group">
                    <label for="content">文章內容</label>
                    <textarea name="content" id="content" rows="10" class="form-control"><?php echo $row["content"]; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="c_id">分類</label>
                    <select name="c_id" id="c_id" class="form-control">
                        <option value="1" <?php echo $row["c_id"] == 1 ? "selected" : "" ?>>體育</option>
                        <option value="2" <?php echo $row["c_id"] == 2 ? "selected" : "" ?>>科技</option>
                        <option value="3" <?php echo $row["c_id"] == 3 ? "selected" : "" ?>>生活</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <input type="submit" class="btn btn-primary" value="儲存" name="submit">
                <input type="button" class="btn btn-danger" value="取消" onclick="history.back()">
            </form>

        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>