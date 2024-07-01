<?php
header("Content-Type:text/html; charset=utf-8");

// 載入配置文件
$link = require('config.php');

mysqli_set_charset($link, "utf8");

// 設定每頁最多顯示的資料數
$items_per_page = 4;

// 獲取當前頁碼，如果未指定，默認為第1頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// 查詢總餐廳數
$total_restaurants = mysqli_query($link, "SELECT COUNT(*) as total FROM restaurants");
$total_data = mysqli_fetch_assoc($total_restaurants);
$total = $total_data['total'];

// 計算總頁數
$total_pages = ceil($total / $items_per_page);

// 計算每頁的起始索引
$offset = ($page - 1) * $items_per_page;
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script
        src="https: //cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>
    <script src="./assets/js/nav.js"></script>
    <title>美食推薦</title>

    <style>
        /* 分頁容器 */
        .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        }

        /* 分頁連結 */
        .pagination a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        margin: 0 5px;
        border: 1px solid #333;
        text-decoration: none;
        color: #333;
        border-radius: 50%;
        transition: background-color 0.3s, color 0.3s, transform 0.3s;
        }

        /* 活動頁碼 */
        .pagination span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        margin: 0 5px;
        border: 1px solid #333;
        background-color: #333;
        color: #fff;
        border-radius: 50%;
        }

        /* 頁碼連結的悬停樣式 */
        .pagination a:hover {
        background-color: #baa6c9;
        color: #fff;
        transform: scale(1.2);
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
                <li class="a3"><a href="food.php">美食推薦</a></li>
            </ol>
        </div>

        <div class="main">
            <p>美食推薦</p>

            <?php
            $sql = "SELECT * FROM restaurants LIMIT $offset, $items_per_page";
            $result = mysqli_query($link, $sql);

            // 計數器，用於跟蹤每兩筆資料
            $count = 0;

            // 遍歷結果集，生成 HTML
            while ($row = mysqli_fetch_assoc($result)) {
                // 如果計數器為0，表示新的一組，則開始新的 content-wrapper
                if ($count % 2 == 0) {
                    echo '<div class="content-wrapper">';
                }

                echo '<div class="content-container">';
                echo '<div class="phohograph-5">';
                echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '" />';
                echo '</div>';
                echo '<div class="bdtext-4">';
                echo '<h1>' . $row['name'] . '</h1><br>';
                echo '<a href="https://www.google.com/maps?q=' . $row['name'] . '">';
                echo '<i class="material-icons">place</i>';
                echo '<span>' . $row['address'] . '</span><br><br>';
                echo '</a>';
                echo '<i class="material-icons">call</i>';
                echo '<span>' . $row['phone'] . '</span><br><br>';
                echo '<i class="material-icons">access_time</i>';
                echo '<span>' . $row['hours'] . '</span><br><br>';
                echo '<i class="material-icons">list</i>';
                echo '<span>' . $row['cuisine'] . '</span><br><br>';
                echo '<i class="material-icons">thumb_up</i>';
                echo '<span>' . $row['rating'] . '</span>';
                echo '</div>';
                echo '</div>';

                // 如果計數器為1，表示一組結束，則關閉 content-wrapper
                if ($count % 2 == 1) {
                    echo '</div>';
                }

                // 增加計數器
                $count++;
            }

            // 如果最後一組僅有一筆資料，請關閉 content-wrapper
            if ($count % 2 == 1) {
                echo '</div>';
            }

            // 顯示頁碼
            echo '<div class="pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    echo '<span>' . $i . '</span>';
                } else {
                    echo '<a href="?page=' . $i . '">' . $i . '</a>';
                }
            }
            echo '</div>';
            ?>
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