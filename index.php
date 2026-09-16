<?php include_once 'common.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang_code; ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $lang['PAGE_TITLE']; ?></title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Battambang:wght@400;700&display=swap" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="header">
    <div class="header-inner header-container">
        <div class="logo logo-box">
            <div>
                <div class="logo-name brand-title"><?php echo $lang['HEADER_TITLE']; ?></div>
                <div class="logo-sub brand-slogan"><?php echo $lang['SLOGAN']; ?></div>
            </div>
        </div>
        <div class="lang lang-switcher">
            <a href="index.php?page=<?php echo $_SESSION['page']; ?>&lang=kh" class="lang-btn <?php echo ($lang_code=='kh'?'on active':''); ?>">
                <img src="images/kh.jpg" alt="KH"> KH
            </a>
            <a href="index.php?page=<?php echo $_SESSION['page']; ?>&lang=en" class="lang-btn <?php echo ($lang_code=='en'?'on active':''); ?>">
                <img src="images/en.png" alt="EN"> EN
            </a>
            <a href="index.php?page=<?php echo $_SESSION['page']; ?>&lang=fr" class="lang-btn <?php echo ($lang_code=='fr'?'on active':''); ?>">
                <img src="images/fr.png" alt="FR"> FR
            </a>
        </div>
    </div>
</div>

<div class="nav nav-wrapper">
    <ul class="nav-menu">
        <li class="<?php echo ($_SESSION['page']=='home'?'on active':''); ?>">
            <a href="index.php?page=home"><?php echo $lang['MENU_HOME']; ?></a>
        </li>
        <li class="<?php echo ($_SESSION['page']=='salary_tax'?'on active':''); ?>">
            <a href="index.php?page=salary_tax"><?php echo $lang['MENU_SALARY_TAX']; ?></a>
        </li>
        <li class="<?php echo ($_SESSION['page']=='deposit'?'on active':''); ?>">
            <a href="index.php?page=deposit"><?php echo $lang['MENU_DEPOSIT']; ?></a>
        </li>
    </ul>
</div>

<div class="content" id="main-content">
<?php
$page = $_SESSION['page'];
if ($page == 'salary_tax') {
    include 'salary_tax.php';
} else if ($page == 'deposit') {
    include 'deposit.php';
} else {
    include 'home.php';
}
?>
</div>

<div class="footer">
    <p><?php echo $lang['FOOTER']; ?></p>
</div>

</body>
</html>