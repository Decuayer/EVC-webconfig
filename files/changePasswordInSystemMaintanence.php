<?php
    include_once "access_control.php";
?>
<div style="left:30%; width: 60vw; margin-top:50px; position:absolute; z-index: 1;" id="administrationPasswordPage">
    <form class="login100-form validate-form flex-sb flex-w" role="form" method="post" autocomplete="off">

        <label class="titleForSystemMaintanencePassword">
            <?php
                if($rowAccount["type"] != "administrator"){
                    echo _CHANGEPASSWORD;
                }
                else{
                    echo _CHANGEADMINPASSWORD;
                }
            ?>:
            </label>
            <div style="margin-top:1%;margin-bottom:1%;">
                    <?php
                            $password =  _PASSWORDTYPEEXPLANATIONLEVEL;
                            if($rowAccount['passwordLevel'] == 2){
                                $password =  _PASSWORDTYPEEXPLANATIONLEVEL2;
                            }else{
                                $password =  _PASSWORDTYPEEXPLANATIONLEVEL3;
                            }
                            echo"<p class='explanationSystemMaintanence'>$password</p>"
                    ?>
            </div>

        
        
        <div id="changePasswordInputArea">
            <label class="generalSubTitle"><?= _CURRENTPASSWORD ?></label>
            <br></br>
            <div class="wrap-input100 validate-input" data-validate="<?= _CURRENTPASSWORDREQUIRED ?>">
                <span class="btn-show-pass" id="administrationPasswordShowPass">
                    <i class="fa fa-eye"></i>
                </span>
                <input class="textarea1" style="width: 36vw;" type="password" name="currentPassSys" id="currentPassSys">
                <span class="error">*</span>
            </div>

            <label class="generalSubTitle"><?= _NEWPASSWORD ?></label>
            <br></br>
            <div class="wrap-input100 validate-input" data-validate="<?= _CURRENTPASSWORDREQUIRED ?>">
                <span class="btn-show-pass" id="administrationPasswordShowPass">
                    <i class="fa fa-eye"></i>
                </span>
                <input class="textarea1" style="width: 36vw;" type="password" name="passSys" id="passSys">
                <span class="error">*</span>
            </div>

            <label class="generalSubTitle"><?= _CONFIRMNEWPASSWORD ?></label>
            <br></br>
            <div class="wrap-input100 validate-input" data-validate="<?= _CURRENTPASSWORDREQUIRED ?>">
                <span class="btn-show-pass" id="administrationPasswordShowPass">
                    <i class="fa fa-eye"></i>
                </span>
                <input class="textarea1" type="password" style="width: 36vw;" name="repassSys" id="repassSys">
                <span class="error">*</span>
            </div>
            <div style='width:36vw; height:30px; margin-bottom:1%;'><span class="alert" style="float:right; margin:0 0;font-size:0.8vw;" id='passwordErrorSys' name='passwordErrorSys' style='float:right;'></span></div>
        </div>

        <button type="button" class="changeButton" name="change_password_button" id="change_password_button" style="margin-left:17%;margin-top:3%; text-transform: uppercase;" onclick="check_db_password()"> <?= _CHANGE ?> </button>
        <input type="submit" id="button_change_passwordSys" name="button_change_passwordSys" hidden>
    </form>
</div>