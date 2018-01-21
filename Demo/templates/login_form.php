<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Welcome back</h1>
            <div class="account-wall">
                <img class="profile-img" src="../templates/images/account.png"
                    alt="" width = "150" height="150">
                <form class="form-signin" action="../public/login.php" method="post">
                <input type="text" class="form-control" name="username" placeholder="Username" maxlength="10" required autofocus>
                <input type="password" class="form-control" name="password" placeholder="Password" maxlength="10" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                
                </form>
                <?php
                    echo $errortext;
                ?>
            </div>
            
        </div>
    </div>
</div>
