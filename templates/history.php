<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($categories as $value) : ?>
            <li class="nav__item nav__item--current">
                <a href="all-lots.html"><?php echo $value ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>
<div class="container">
    <section class="lots">
        <?php if (isset($products_hist)) : ?>
            <h2>История просмотров</h2>
            <ul class="lots__list">
                <?php foreach ($products_hist as $key => $value) : ?>
                    <li class="lots__item lot">
                        <div class="lot__image">
                            <img src=<?php echo $value['image-path'] ?> width="350" height="260" alt=<?php echo $value['lot-name'] ?>>
                        </div>
                        <div class="lot__info">
                            <span class="lot__category"><?php echo $value['category'] ?></span>
                            <h3 class="lot__title"><a class="text-link" href="lot.php?index=<?php echo $key ?>"><?php echo $value['lot-name'] ?></a></h3>
                            <div class="lot__state">
                                <div class="lot__rate">
                                    <span class="lot__amount">Стартовая цена</span>
                                    <span class="lot__cost"><?php echo format_price($value['lot-rate']) ?><b class="rub">р</b></span>
                                </div>
                                <div class="lot__timer timer">
                                    <?php echo $ts ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
    </section>
    <ul class="pagination-list">
        <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
        <li class="pagination-item pagination-item-active"><a>1</a></li>
        <li class="pagination-item"><a href="#">2</a></li>
        <li class="pagination-item"><a href="#">3</a></li>
        <li class="pagination-item"><a href="#">4</a></li>
        <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>
<?php else : ?>
    <h2>Истории просмотров не найдено</h2>
<?php endif ?>
</div>
