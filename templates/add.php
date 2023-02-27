<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($categories as $value) : ?>
            <li class="nav__item">
                <a href="all-lots.html"><? echo $value ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>
<?php
$classname_invalid = isset($errors) ? 'form--invalid' : '';?>
<form class="form form--add-lot container <? echo $classname_invalid ?>" action="add.php" method="POST" enctype="multipart/form-data">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <?php
        $classname_invalid = isset($errors['lot-name']) ? 'form__item--invalid' : '';
        $value = isset($product['lot-name']) ? $product['lot-name'] : '';
        ?>
        <div class="form__item <? echo $classname_invalid ?>">
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<? echo $value ?>">
            <span class="form__error">Введите наименование лота</span>
        </div>
        <?php
        $classname_invalid = isset($errors['category']) ? 'form__item--invalid' : '';
        $selected = (isset($product['category']) and $product['category']) ? 'selected' : '';
        ?>
        <div class="form__item <? echo $classname_invalid ?>">
            <label for="category">Категория</label>
            <select id="category" name="category">
                <option value="" <? echo $selected ?>>Выберите категорию</option>
                <?php foreach ($categories as $value) : 
                    if ($product['category'] === $value) :
                ?>
                        <option value="<? echo $value ?>" <? echo $selected ?>><? echo $value ?></option>
                    <?php else : ?>
                        <option value="<? echo $value ?>"><? echo $value ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
            <span class="form__error">Выберите категорию</span>
        </div>
    </div>
    <?php
    $classname_invalid = isset($errors['message']) ? 'form__item--invalid' : '';
    $value = isset($product['message']) ? $product['message'] : '';
    ?>
    <div class="form__item form__item--wide <? echo $classname_invalid ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><? echo $value ?></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <?php
    $classname_invalid = isset($errors['lot-image']) ? 'form__item--invalid' : '';
    $classname_uploaded = isset($product['path']) ? 'form__item--uploaded' : '';
    ?>
    <div class="form__item form__item--file <? echo $classname_invalid ?> <? echo $classname_uploaded ?>">
        <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="photo2" name="lot-image" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
        <span class="form__error"><? echo $errors['lot-image'] ?></span>
    </div>
    <div class="form__container-three">
        <?php
        $classname_invalid = isset($errors['lot-rate']) ? 'form__item--invalid' : '';
        $value = isset($product['lot-rate']) ? $product['lot-rate'] : '';
        ?>
        <div class="form__item form__item--small <? echo $classname_invalid ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<? echo $value ?>">
            <span class="form__error">Введите начальную цену</span>
        </div>
        <?php
        $classname_invalid = isset($errors['lot-step']) ? 'form__item--invalid' : '';
        $value = isset($product['lot-step']) ? $product['lot-step'] : '';
        ?>
        <div class="form__item form__item--small <? echo $classname_invalid ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<? echo $value ?>">
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <?php
        $classname_invalid = isset($errors['lot-date']) ? 'form__item--invalid' : '';
        $value = isset($product['lot-date']) ? $product['lot-date'] : '';
        ?>
        <div class="form__item <? echo $classname_invalid ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<? echo $value ?>">
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>
