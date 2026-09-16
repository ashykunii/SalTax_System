<?php
if (!isset($lang)) {
    header("Location: index.php?page=home");
    exit();
}
?>
<div class="welcome">
    <div>
        <h1><?php echo $lang['HOME_WELCOME']; ?></h1>
        <p><?php echo $lang['HOME_DESC']; ?></p>
    </div>
    <div class="welcome-img">
        <img src="images/campus.jpg" alt="<?php echo $lang['HOME_IMG_ALT']; ?>" onerror="this.style.display='none'">
        <p><?php echo $lang['HOME_IMG_ALT']; ?></p>
    </div>
</div>

<div class="reg-grid">
    <div class="card">
        <h2><?php echo $lang['REG_TITLE']; ?></h2>

        <?php
        $ok = false;
        if (isset($_POST['reg_submit'])) {
            $fn = trim($_POST['firstname']);
            $ln = trim($_POST['lastname']);
            $un = trim($_POST['username']);
            $pw = trim($_POST['password']);
            $em = trim($_POST['email']);
            if ($fn != '' && $ln != '' && $un != '' && $pw != '' && $em != '') {
                $ok = true;
            }
        }
        if ($ok) {
            echo '<div class="ok">&#10003; ' . $lang['REG_SUCCESS'] . '</div>';
        }
        ?>

        <form method="POST" action="index.php?page=home&lang=<?php echo $lang_code; ?>">
            <div class="fgroup">
                <label><?php echo $lang['REG_FIRSTNAME']; ?></label>
                <input type="text" name="firstname" placeholder="<?php echo $lang['REG_FIRSTNAME_PH']; ?>" value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>">
            </div>
            <div class="fgroup">
                <label><?php echo $lang['REG_LASTNAME']; ?></label>
                <input type="text" name="lastname" placeholder="<?php echo $lang['REG_LASTNAME_PH']; ?>" value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>">
            </div>
            <div class="fgroup">
                <label><?php echo $lang['REG_USERNAME']; ?></label>
                <input type="text" name="username" placeholder="<?php echo $lang['REG_USERNAME_PH']; ?>" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            </div>
            <div class="fgroup">
                <label><?php echo $lang['REG_PASSWORD']; ?></label>
                <input type="password" name="password" placeholder="<?php echo $lang['REG_PASSWORD_PH']; ?>">
            </div>
            <div class="fgroup">
                <label><?php echo $lang['REG_EMAIL']; ?></label>
                <input type="email" name="email" placeholder="<?php echo $lang['REG_EMAIL_PH']; ?>" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            <div class="btns">
                <button type="submit" name="reg_submit" class="btn btn-blue"><?php echo $lang['REG_SUBMIT']; ?></button>
                <button type="reset" class="btn btn-gray"><?php echo $lang['REG_RESET']; ?></button>
            </div>
        </form>
    </div>
</div>
