<?php
if (!defined('INCLUDED')) {
    die('Access denied');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $currentpass = $_POST['currentpass'];
    $newpass = $_POST['newpass'];
    $validatepass = $_POST['validatepass'];


    $userID = Session::get('user')['id'];
    $userPasswordHash = Database::db()->table('users')->where('id', $userID)->get();

    if (!password_verify($currentpass, $userPasswordHash->password)) {
        echo '<p style="color:tomato"> * Current passwords is incorrect.<p>';
    } elseif ($newpass !== $validatepass) {
        echo '<p style="color:tomato"> * Validation passwords dose not match.<p>';
    } else {
        $newPasswordHash = password_hash($newpass, PASSWORD_DEFAULT);
        Database::db()->table('users')->where('id', $userID)->update(['password' => $newPasswordHash]);
        echo '<h3>Your password is changed</h3>';
        exit();
    }

    
}

?>

<div class="contailer">
    <div class="card">
        <div class="card-header">
            <h3>Change password</h3>
        </div>
        <div class="card-body">
            <form method="post" action="index.php?p=changePassword">
                <div class="form-group">
                    <label>Currentpassword *</label>
                    <input type="password" class="form-control" name="currentpass" placeholder="Enter email" required>
                </div>
                <hr>
                <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control" name="newpass" minlength="6" required>
                </div>
                <div class="form-group">
                    <label>Validate new password *</label>
                    <input type="password" class="form-control" name="validatepass" minlength="6" required>
                </div>
                <input type="submit" class="btn btn-primary" />
            </form>
        </div>
    </div>
</div>