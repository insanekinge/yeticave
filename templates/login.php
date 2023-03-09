<form class="form<?= $data['invalid']; ?> container" action="login.php" method="post">
    <h2>Вход</h2>
    <div class="form__item<?= $data['e-mail']['invalid']; ?>">
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="e-mail" placeholder="Введите e-mail" value="<?= $data['e-mail']['value']; ?>">
        <span class="form__error"><?= $data['e-mail']['error']; ?></span>
    </div>
    <div class="form__item<?= $data['password']['invalid']; ?> form__item--last">
        <label for="password">Пароль*</label>
        <input id="password" type="password" name="password" placeholder="Введите пароль">
        <span class="form__error"><?= $data['password']['error']; ?></span>
    </div>
    <span class="form__error form__error--bottom"><?= $data['error_main']; ?></span>
    <button type="submit" class="button">Войти</button>
</form>