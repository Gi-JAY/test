<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="res.php" method="post">
        <fieldset>
            <legend>post</legend>
            <div>
                <label for="user">USER</label>
                <input type="text" name="user" id="user">
            </div>
            <div>
                <label for="email">EMAIL</label>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label for="edu">EDU</label>
                <select name="edu" id="edu">
                    <option value="">--請選擇--</option>
                    <option value="國小">國小</option>
                    <option value="國中">國中</option>
                    <option value="高中職">高中職</option>
                    <option value="大專院校">大專院校</option>
                    <option value="研究所以上">研究所以上</option>
                </select>
            </div>
            <div>
                GENDER
                <input type="radio" name="gender" value="男" id="male">
                <label for="male">男</label>

                <input type="radio" name="gender" value="女" id="female">
                <label for="female">女</label>
            </div>
            <div>
                SKILL
                <input type="checkbox" name="skills[]" id="design" value="設計">
                <label for="design">設計</label>

                <input type="checkbox" name="skills[]" id="web" value="網頁">
                <label for="web">網頁</label>

                <input type="checkbox" name="skills[]" id="threed" value="3D">
                <label for="threed">設計</label>
            </div>
            <div>
                <label for="comment">備註</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" value="送出">
        </fieldset>
    </form>
    <?php
    // if (isset($_GET["error"])) {
    //     if ($_GET["error"] == 0) {
    //         echo "請輸入user內容";
    //     }
    //     if ($_GET["error"] == 1) {
    //         echo "請輸入email內容";
    //     }
    // }
    switch ($_GET["error"]) {
        case 0:
            echo "請輸入user內容";
            break;
        case 1:
            echo "請輸入email內容";
            break;
        case 2:
            echo "請輸入學歷內容";
            break;
    }
    ?>
        <!-- <form action="res.php" method="get">
            <fieldset>
                <legend>get</legend>
                帳號:<input type="text" name="user"></br>
                信箱:<input type="text" name="email"></br>
                <input type="submit" value="送出">
            </fieldset>
        </form> -->
</body>

</html>