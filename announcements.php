<?php
header("Content-Type:text/html; charset=utf-8");

// 載入配置文件
$link = require('config.php');

mysqli_set_charset($link, "utf8");

// 獲取特定公告的內容和相關附件
if (isset($_GET['announcement_id'])) {
    $announcement_id = $_GET['announcement_id'];
    // 檢索公告的資料
    $announcement_query = "SELECT * FROM announcements WHERE id = $announcement_id";
    $announcement_result = mysqli_query($link, $announcement_query);

    if ($announcement_result && $announcement_result->num_rows > 0) {
        $announcement_row = $announcement_result->fetch_assoc();
        $title = $announcement_row['title'];
        $publish_date = $announcement_row['publish_date'];
        $expiration_date = $announcement_row['expiration_date'];
        $issuing_unit = $announcement_row['issuing_unit'];
        $category = $announcement_row['category'];
        $content = $announcement_row['content'];
        $related_url = $announcement_row['related_url'];

        // 檢索相關附件
        $attachments_query = "SELECT * FROM attachments WHERE announcement_id = $announcement_id";
        $attachments_result = mysqli_query($link, $attachments_query);
    } else {
        echo "找不到指定的公告。";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width,initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/nav.js"></script>
    <title>公告內容</title>

    <style>
        .announcement {
            text-align: left;
            font-size: 20px;
            margin: 20px;
            line-height: 2;
        }

        .bold {
            font-weight: bold;
            display: inline;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="header">
            <div class="fontpage">
                <a href="index.php">
                    <img src="./assets/images/A007校徽A款.png" alt="" class="logo">
                    <h2> 德明財經科技大學|資訊管理學系</h2>
                    <h4>Department of Management Information System</h4>
                </a>
            </div>

            <div class="navbar navbar-expand-lg   bg-red text-black">
                <ul class="navbar-nav  ">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="about.html" id="navbarDropdownMenuLink1"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                關於本系
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                <a class="dropdown-item" href="hist.html">歷史沿革</a>
                                <a class="dropdown-item" href="cha.html">系所特色</a>
                                <a class="dropdown-item" href="career.html">職涯發展</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="news.html" id="navbarDropdownMenuLink2"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                最新消息
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                <a class="dropdown-item" href="gene.php">一般公告</a>
                                <a class="dropdown-item" href="stud.php">招生公告</a>
                                <a class="dropdown-item" href="invite.php">徵才資訊</a>
                                <a class="dropdown-item" href="glory.php">榮譽榜</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="course.html" id="navbarDropdownMenuLink3"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                課程資訊
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                                <a class="dropdown-item" href="course_planning.html">課程規劃</a>
                                <a class="dropdown-item" href="course_guidelines.html">修業規定</a>
                                <a class="dropdown-item" href="map.html">課程地圖</a>
                                <a class="dropdown-item" href="course-standards.html">課程基準表</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="admissions.html" id="navbarDropdownMenuLink4"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                招生資訊
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink4">
                                <div class="dropdown dropdown-submenu">
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item dropdown-toggle" href="un.html">大學部</a>
                                        <a class="dropdown-item" href="un1.html">甄選入學</a>
                                        <a class="dropdown-item" href="un2.html">聯合登記分發</a>
                                        <a class="dropdown-item" href="un3.html">繁星計畫</a>
                                        <a class="dropdown-item" href="un4.html">特殊選才入學</a>
                                        <a class="dropdown-item" href="un5.html">技優甄審</a>
                                        <a class="dropdown-item" href="un6.html">申請入學</a>
                                        <a class="dropdown-item" href="un7.html">身障生入學</a>
                                        <a class="dropdown-item" href="un8.html">日四技單獨招生</a>
                                        <a class="dropdown-item" href="un9.html">備審資料準備指引(技優、申請、甄選)</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item dropdown-toggle" href="gra.html">碩士班</a>
                                        <a class="dropdown-item" href="gra1.html">碩士班甄試招生</a>
                                        <a class="dropdown-item" href="gra2.html">碩士班考試暨碩士在職專班甄試招生</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="faculty.html" id="navbarDropdownMenuLink5"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                師資簡介
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink5">
                                <a class="dropdown-item" href="teac.php">專任教師</a>
                                <a class="dropdown-item" href="teac2.php">兼任教師</a>
                                <a class="dropdown-item" href="teac3.php">退休教師</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="student.html" id="navbarDropdownMenuLink6"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                學生專區
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink6">
                                <a class="dropdown-item" href="loans.html">就學貸款</a>
                                <a class="dropdown-item" href="scholarships.html">獎助學金</a>
                                <a class="dropdown-item" href="graduation.html">畢業門檻</a>
                                <a class="dropdown-item" href="certification.html">考證資訊</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="intern.html" id="navbarDropdownMenuLink7"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                企業實習
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink7">
                                <a class="dropdown-item" href="intern_notice.html">實習注意事項</a>
                                <a class="dropdown-item" href="intern_web.html">實習平台(學生端)操作影片</a>
                                <a class="dropdown-item" href="intern_form.html">實習表單</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="other.html" id="navbarDropdownMenuLink8"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                其他資源
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink8">
                                <a class="dropdown-item" href="calendar.php">行事曆</a>
                                <a class="dropdown-item" href="plan.html">校內平面圖</a>
                                <a class="dropdown-item" href="traffic.html">交通資訊</a>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="food.php">美食推薦</a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>

        <div class="href">
            <ol>
                <li class="a1"><a href="index.php">首頁</a></li>
                <li class="a2"><a href="news.html">最新消息</a></li>
                <li class="a3"><a href="#">公告內容</a></li>
            </ol>
        </div>

        <div class="main">
            <p><?php echo $title; ?></p>
            <div class="announcement">
                <h1><div class="bold">發佈日期：</div><?php echo $publish_date; ?></h1>
                <h1><div class="bold">發佈單位：</div><?php echo $issuing_unit; ?></h1>
                <h1><div class="bold">分類：</div><?php echo $category; ?></h1>
                <h1><div class="bold">內容：</div></h1>
                <h1><?php echo $content; ?></h1>

                <?php
                // 顯示相關附件
                if ($attachments_result && $attachments_result->num_rows > 0) {
                    echo "<h1><div class='bold'>相關附件：</div></h1>";
                    while ($attachment_row = $attachments_result->fetch_assoc()) {
                        $attachment_title = $attachment_row['title'];
                        $file_path = $attachment_row['file_path'];
                        echo "<a href='$file_path' target='_blank'>$attachment_title</a><br>";
                    }
                } else {
                    echo "<h1><div class='bold'>相關附件：</div>無</h1>";
                }
                ?>
            </div>
        </div>

        <div class="footer">
            <table>
                <tr>
                    <td class="ftitle">聯絡資訊</td>
                    <td class="ftitle">學校地理位置</td>
                </tr>
                <tr>
                    <td>
                        <p>Tel:02-26585801轉2761(大學部)</p>
                        <p>Tel: (02)-2658-5801轉2120-2125、2102-2103</p>
                        <p>Fax: (02)8751-5018</p>
                        <p>地址:台北市內湖區環山路一段56號</p>
                    </td>
                    <td>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14453.80864966052!2d121.5654923!3d25.0865509!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442ac6bd0b368c1%3A0xfa88e4f9afa56d76!2z5b635piO6LKh57aT56eR5oqA5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1695189154495!5m2!1szh-TW!2stw"
                            width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>