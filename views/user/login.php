<?php include ROOT.'/views/layouts/header.php'; ?>

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">

                        <!-- Проверяем есть ли ошибки-->
                        <!-- Если есть, то выводим на сайт-->
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="signup-form"><!--sign up form-->
                            <h2>Вход на сайт</h2>
                            <form action="#" method="post">
                                <input type="email" name="email" placeholder="Email Address" value="<?php echo $email; ?>"/>
                                <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                                <input type="submit" name="submit" class="btn btn-default" value="Войти"/>
                            </form>
                        </div><!--/sign up form-->
                        <br/>
                        <p class="user-help-text"><a>Забыли пароль?<a/></p>

                        <p class="user-help-text"><a href="/user/register">Регистрация</a></p>

                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php include ROOT.'/views/layouts/footer.php'; ?>