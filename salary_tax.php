<?php
if (!isset($lang)) {
    header("Location: index.php?page=salary_tax");
    exit();
}

$grosssalary = 0;
$children    = 0;
$has_wife    = 0;
$taxrate     = 0;
$payback     = 0;
$bonus       = 0;
$tax         = 0;
$netsalary   = 0;
$submitted   = false;

if (isset($_POST['sal_submit'])) {
    $submitted   = true;
    $grosssalary = (float)$_POST['grosssalary'];
    $children    = (int)$_POST['children'];
    $has_wife    = isset($_POST['has_wife']) ? 1 : 0;

    if ($grosssalary <= 1500000) {
        $taxrate = 0;
        $payback = 0;
    } else if ($grosssalary <= 2000000) {
        $taxrate = 0.05;
        $payback = 75000;
    } else if ($grosssalary <= 8500000) {
        $taxrate = 0.10;
        $payback = 172500;
    } else if ($grosssalary <= 12500000) {
        $taxrate = 0.15;
        $payback = 600000;
    } else {
        $taxrate = 0.20;
        $payback = 1225000;
    }

    if ($children > 5) {
        $children = 5;
    }

    $bonus       = ($has_wife * 150000) + ($children * 150000);
    $taxable     = $grosssalary - $bonus;
    $tax         = ($taxable * $taxrate) - $payback;

    if ($tax < 0) {
        $tax = 0;
    }

    $netsalary = $grosssalary - $tax;
}
?>

<div class="page-bar">
    <h1><?php echo $lang['SAL_TITLE']; ?></h1>
</div>

<div class="tbl-wrap">
    <h3><?php echo $lang['SAL_COND_TITLE']; ?></h3>
    <table class="tbl">
        <thead>
            <tr>
                <th><?php echo $lang['SAL_COND_GROSS']; ?></th>
                <th><?php echo $lang['SAL_COND_RATE']; ?></th>
                <th><?php echo $lang['SAL_COND_PAYBACK']; ?></th>
            </tr>
        </thead>
        <tbody>
            <tr><td>0 - 1,500,000 R</td><td>0%</td><td>0 R</td></tr>
            <tr><td>1,500,001 - 2,000,000 R</td><td>5%</td><td>75,000 R</td></tr>
            <tr><td>2,000,001 - 8,500,000 R</td><td>10%</td><td>172,500 R</td></tr>
            <tr><td>8,500,001 - 12,500,000 R</td><td>15%</td><td>600,000 R</td></tr>
            <tr><td>12,500,000+ R</td><td>20%</td><td>1,225,000 R</td></tr>
        </tbody>
    </table>
</div>

<div class="card">
    <form method="POST" action="index.php?page=salary_tax&lang=<?php echo $lang_code; ?>">
        <div class="frow">
            <div class="fgroup">
                <label><?php echo $lang['SAL_GROSS']; ?></label>
                <input type="number" name="grosssalary" min="0" value="<?php echo $grosssalary > 0 ? $grosssalary : ''; ?>" placeholder="e.g. 2000000">
            </div>
            <div class="fgroup">
                <label><?php echo $lang['SAL_CHILDREN']; ?></label>
                <input type="number" name="children" min="0" max="10" value="<?php echo $submitted ? $children : ''; ?>" placeholder="e.g. 1">
            </div>
        </div>
        <div class="fgroup">
            <label><?php echo $lang['SAL_WIFE']; ?></label>
            <div class="radios">
                <label>
                    <input type="checkbox" name="has_wife" value="1" <?php echo ($has_wife ? 'checked' : ''); ?>>
                    <?php echo $lang['SAL_WIFE_YES']; ?>
                </label>
            </div>
        </div>
        <div class="btns">
            <button type="submit" name="sal_submit" class="btn btn-blue"><?php echo $lang['SAL_SUBMIT']; ?></button>
            <button type="reset" class="btn btn-gray"><?php echo $lang['SAL_RESET']; ?></button>
        </div>
    </form>
</div>

<?php if ($submitted) { ?>
<div class="result">
    <h3><?php echo $lang['SAL_RESULT']; ?></h3>
    <table>
        <tr><td><?php echo $lang['SAL_RES_GROSS']; ?></td><td><strong><?php echo number_format($grosssalary, 2); ?> R</strong></td></tr>
        <tr><td><?php echo $lang['SAL_RES_CHILD']; ?></td><td><strong><?php echo $children; ?></strong></td></tr>
        <tr class="green"><td><?php echo $lang['SAL_RES_NET']; ?></td><td><strong><?php echo number_format($netsalary, 2); ?> R</strong></td></tr>
        <tr class="yellow"><td><?php echo $lang['SAL_RES_TAX']; ?></td><td><strong><?php echo number_format($tax, 2); ?> R</strong></td></tr>
    </table>
</div>
<?php } ?>
