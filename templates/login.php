<nav class="nav">
    <ul class="nav__list container"><?php foreach ($data['categories_list'] as $val) : ?>
        <li class="nav__item">
            <a href="all-lots.html"><?php echo $val?></a>
        </li><?php endforeach; ?>
    </ul>
</nav>
<form class="form<?php echo $data['invalid']; ?> container" action="login.php" method="post">
    <h2>Вход</h2>
    <div class="form__item<?php echo $data['e-mail']['invalid']; ?>">
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="e-mail" placeholder="Введите e-mail" value="<?php echo $data['e-mail']['value']; ?>">
        <span class="form__error"><?php echo $data['e-mail']['error']; ?></span>
    </div>
    <div class="form__item<?php echo $data['password']['invalid']; ?> form__item--last">
        <label for="password">Пароль*</label>
        <input id="password" type="password" name="password" placeholder="Введите пароль">
        <span class="form__error"><?php echo $data['password']['error']; ?></span>
    </div>
    <span class="form__error form__error--bottom"><?php echo $data['error']; ?></span>
    <button type="submit" class="button">Войти</button>
</form>