<?php if(!isset($uid) && !isset($bizActId)){?>
<h2 class="userAreaToggle"><i class="fa fa-user"></i> Sign In or Register</h2>
<?php }else{ ?>
<h2 class="userAreaToggle"><i class="fa fa-user"></i>
    <?php 
    if(isset($uid)){
    echo $uname;
    } else {
     echo $bizName;
    }
    ?>
</h2>
<?php } ?>


<div class="userArea">
    <?php if(!isset($uid) && !isset($bizActId)):?>

    <form class="signInForm">
        <div class="fgrp">
            <input type="email" id="userEmail" class="text-input" placeholder="email"/>
        </div>
        <div class="fgrp">
            <input type="password" id="userPassword" class="text-input" placeholder="password"/>
        </div>
        <div class="errbox userLoginErrbox">

        </div>
        <div class="fgrp">
            <button type="submit" id="userLoginBtn" class="btn btn--blue btn--wide">Login</button>
        </div>
        <div class="fgrp">
            <a class="btn btn--blue btn--wide">Create Account</a>
        </div>
        <div class="m-rem1-tb"><a class="rem15">Forgot Password? Click here</a></div>
        <div class="m-rem1-tb"><a class="rem15 bizLoginLink">Business Login</a></div>
    </form>

    <form class="bizSignInForm hide">
        <div class="fgrp">
            <input type="email" class="text-input" placeholder="email"/>
        </div>
        <div class="fgrp">
            <input type="password" class="text-input" placeholder="password"/>
        </div>
        <div class="fgrp">
            <button type="submit" class="btn btn--blue btn--wide">Login as Business</button>
        </div>
        <div class="m-rem1-tb"><a class="rem15">Forgot Password? Click here</a></div>
        <div class="m-rem1-tb"><a class="rem15 userLoginLink">User Login</a></div>
    </form>

    <script>
        var userLoginForm = document.querySelector('.signInForm');
        var bizLoginForm = document.querySelector('.bizSignInForm');
        var userLoginErrbox = document.querySelector('.userLoginErrbox');


        document.querySelector('.bizLoginLink').addEventListener('click',function(){
            userLoginForm.classList.add('hide');
            bizLoginForm.classList.remove('hide');
        });
        document.querySelector('.userLoginLink').addEventListener('click',function(){
            userLoginForm.classList.remove('hide');
            bizLoginForm.classList.add('hide');
        });

        document.querySelector('#userLoginBtn').addEventListener('click',function(e){
            e.preventDefault();
            userLoginErrbox.innerHTML = '';
            
            var fields = {
                email : document.querySelector('#userEmail').value.trim(), 
                password : document.querySelector('#userPassword').value.trim()
            }

            $.ajax({
                url : '../proc/userLoginProcess.php', 
                type : 'POST', 
                data : {
                    email : fields.email, 
                    password : fields.password
                }, 
                success : function(data){
                    if(data == 1){
                        userLoginErrbox.innerHTML = '<p><i class="fa fa-exclamation-triangle"></i> The email or password you entered does not exist or is invalid</p>';
                    } else {
                        window.location.reload();
                    }
                }
            });

        });
    </script>

    <?php else: ?>

        <div class="userArea__mgr">
            <a href="#" class="userArea__mgrLink"><i class="fa fa-cog"></i> Account Settings</a>
            <a href="profile.php?id=<?= $uid  ?>" class="userArea__mgrLink"><i class="fa fa-eye"></i> View Profile</a>
            <a href="editProfile.php" class="userArea__mgrLink"><i class="fa fa-edit"></i> Edit Profile</a>
            <a href="#" class="userArea__mgrLink"><i class="fas fa-bell"></i> Notifications</a>
            <a href="#" class="userArea__mgrLink"><i class="fa fa-envelope"></i> Messages</a>
            <a href="#" class="userArea__mgrLink"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

    <?php endif; ?>
</div>