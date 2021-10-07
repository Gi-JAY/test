    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">文章列表<span class="sr-only">(current)</span></a>
                </li>
                <?php if (isset($_SESSION["ID"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="createPost.php">新增文章</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>