<?php
if (!isset($lang)) {
    header("Location: index.php?page=deposit");
    exit();
}

$deposit      = 0;
$currency     = 'Riel';
$duration     = 12;
$interestrate = 0;
$interest     = 0;
$total        = 0;
$monthlyinterest = 0;
$submitted    = false;

if (isset($_POST['dep_submit'])) {
    $submitted = true;
    $deposit   = (float)$_POST['deposit'];
    $currency  = $_POST['currency'];
    $duration  = (int)$_POST['duration'];

    if ($duration == 12) {
        $interestrate = 0.035;
    } else if ($duration == 24) {
        $interestrate = 0.04;
    } else if ($duration == 36) {
        $interestrate = 0.045;
    } else {
        $interestrate = 0.0675;
    }

    $interest = ($deposit * $interestrate) - (($deposit * $interestrate) * 0.06);
    $total    = $deposit + $interest;
    $monthlyinterest = $interest / $duration;
}

$sym = 'R';
if ($currency == 'Dollar') {
    $sym = '$';
} else if ($currency == 'Yuan') {
    $sym = '¥';
}
?>

<div class="page-bar">
    <h1><?php echo $lang['DEP_TITLE']; ?></h1>
</div>

<div class="tbl-wrap">
    <h3><?php echo $lang['DEP_COND_TITLE']; ?></h3>
    <table class="tbl">
        <thead>
            <tr>
                <th><?php echo $lang['DEP_DURATION']; ?></th>
                <th>Riel</th>
                <th>Dollar</th>
                <th>Yuan</th>
            </tr>
        </thead>
        <tbody>
            <tr><td><?php echo $lang['DEP_12M']; ?></td><td>3.5%</td><td>3.5%</td><td>3.5%</td></tr>
            <tr><td><?php echo $lang['DEP_24M']; ?></td><td>4%</td><td>4%</td><td>4%</td></tr>
            <tr><td><?php echo $lang['DEP_36M']; ?></td><td>4.5%</td><td>4.5%</td><td>4.5%</td></tr>
            <tr><td><?php echo $lang['DEP_48M']; ?></td><td>6.75%</td><td>6.75%</td><td>6.75%</td></tr>
        </tbody>
    </table>
</div>

<div class="card">
    <form method="POST" action="index.php?page=deposit&lang=<?php echo $lang_code; ?>">
        <div class="frow">
            <div class="fgroup">
                <label><?php echo $lang['DEP_AMOUNT']; ?></label>
                <input type="number" name="deposit" min="0" step="0.01" value="<?php echo $deposit > 0 ? $deposit : ''; ?>" placeholder="e.g. 10000">
            </div>
            <div class="fgroup">
                <label><?php echo $lang['DEP_DURATION']; ?></label>
                <select name="duration">
                    <option value="12" <?php echo ($duration==12?'selected':''); ?>><?php echo $lang['DEP_12M']; ?></option>
                    <option value="24" <?php echo ($duration==24?'selected':''); ?>><?php echo $lang['DEP_24M']; ?></option>
                    <option value="36" <?php echo ($duration==36?'selected':''); ?>><?php echo $lang['DEP_36M']; ?></option>
                    <option value="48" <?php echo ($duration==48?'selected':''); ?>><?php echo $lang['DEP_48M']; ?></option>
                </select>
            </div>
        </div>
        <div class="fgroup">
            <label><?php echo $lang['DEP_CURRENCY']; ?></label>
            <div class="radios">
                <label><input type="radio" name="currency" value="Riel"   <?php echo ($currency=='Riel'  ?'checked':''); ?>> Riel</label>
                <label><input type="radio" name="currency" value="Dollar" <?php echo ($currency=='Dollar'?'checked':''); ?>> Dollar</label>
                <label><input type="radio" name="currency" value="Yuan"   <?php echo ($currency=='Yuan'  ?'checked':''); ?>> Yuan</label>
            </div>
        </div>
        <div class="btns">
            <button type="submit" name="dep_submit" class="btn btn-blue"><?php echo $lang['DEP_SUBMIT']; ?></button>
            <button type="reset" class="btn btn-gray"><?php echo $lang['DEP_RESET']; ?></button>
        </div>
    </form>
</div>

<?php if ($submitted) { ?>
<div class="result">
    <h3><?php echo $lang['DEP_RESULT']; ?></h3>
    <table>
        <tr><td><?php echo $lang['DEP_RES_AMOUNT']; ?></td><td><strong><?php echo number_format($deposit, 2); ?> <?php echo $sym; ?></strong></td></tr>
        <tr><td><?php echo $lang['DEP_RES_CURRENCY']; ?></td><td><strong><?php echo $currency; ?></strong></td></tr>
        <tr><td><?php echo $lang['DEP_RES_DURATION']; ?></td><td><strong><?php echo $duration; ?> <?php echo $lang['DEP_MONTHS']; ?></strong></td></tr>
        <tr class="green"><td><?php echo $lang['DEP_RES_INTEREST']; ?></td><td><strong><?php echo number_format($interest, 2); ?> <?php echo $sym; ?></strong></td></tr>
        <tr class="green"><td><?php echo $lang['DEP_RES_TOTAL']; ?></td><td><strong><?php echo number_format($total, 2); ?> <?php echo $sym; ?></strong></td></tr>
        <tr class="yellow"><td><?php echo $lang['DEP_RES_MONTHLY']; ?></td><td><strong><?php echo number_format($monthlyinterest, 2); ?> <?php echo $sym; ?></strong></td></tr>
    </table>
</div>
<?php } ?>