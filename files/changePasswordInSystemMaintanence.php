<?php
    include_once "access_control.php";
?>
<div class="container mt-5" id="administrationPasswordPage" style="min-height: 50vh;">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form class="needs-validation" role="form" method="post" autocomplete="off" novalidate>

                <!-- Başlık -->
                <label class="textInSettings fw-bold fs-5">
                <?php
                    if ($rowAccount["type"] != "administrator") {
                        echo _CHANGEPASSWORD;
                    } else {
                        echo _CHANGEADMINPASSWORD;
                    }
                ?>:
                </label>

                <!-- Açıklama -->
                <div class="mb-3">
                <?php
                    $password = _PASSWORDTYPEEXPLANATIONLEVEL;
                    if ($rowAccount['passwordLevel'] == 2) {
                        $password = _PASSWORDTYPEEXPLANATIONLEVEL2;
                    } else {
                        $password = _PASSWORDTYPEEXPLANATIONLEVEL3;
                    }
                    echo "<p class='explanationSystemMaintanence'>$password</p>";
                ?>
                </div>

                <!-- Mevcut Şifre -->
                <div class="mb-4">
                <label class="textInSettings"><?= _CURRENTPASSWORD ?></label>
                <div class="input-group">
                    <input type="password" name="currentPassSys" id="currentPassSys" class="form-control" data-validate="<?= _CURRENTPASSWORDREQUIRED ?>">
                    <button class="btn btn-outline-primary btn-show-pass" type="button">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                <span class="error text-danger">*</span>
                </div>

                <!-- Yeni Şifre -->
                <div class="mb-4">
                <label class="textInSettings"><?= _NEWPASSWORD ?></label>
                <div class="input-group">
                    <input type="password" name="passSys" id="passSys" class="form-control" data-validate="<?= _CURRENTPASSWORDREQUIRED ?>">
                    <button class="btn btn-outline-primary btn-show-pass" type="button">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                <span class="error text-danger">*</span>
                </div>

                <!-- Şifre Onay -->
                <div class="mb-4">
                <label class="textInSettings"><?= _CONFIRMNEWPASSWORD ?></label>
                <div class="input-group">
                    <input type="password" name="repassSys" id="repassSys" class="form-control" data-validate="<?= _CURRENTPASSWORDREQUIRED ?>">
                    <button class="btn btn-outline-primary btn-show-pass" type="button">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                <span class="error text-danger">*</span>
                </div>

                <!-- Hata Mesajı -->
                <div class="mb-3">
                <span class="alert d-block text-end small text-danger" id="passwordErrorSys" name="passwordErrorSys"></span>
                </div>

                <!-- Buton -->
                <div class="text-center mt-4">
                <button type="button" class="btn btn-primary px-4 py-2" id="change_password_button" name="change_password_button" onclick="check_db_password()">
                    <?= _CHANGE ?>
                </button>
                </div>

                <input type="submit" id="button_change_passwordSys" name="button_change_passwordSys" hidden>
            </form>
        </div>
    </div>
</div>
