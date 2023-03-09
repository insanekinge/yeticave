<div class="container">
    <section class="lots">
        <?php if (isset($data)) : ?>
            <h2>История просмотров</h2>
            <ul class="lots__list">
                <?php foreach ($data as $key => $value) : ?>
                    <li class="lots__item lot">
                        <div class="lot__image">
                        <img src="<?= $value['picture'] ?>" width="730" height="548" alt="<?= $value['name'] ?>"></div>
                        <div class="lot__info">
                            <span class="lot__category"><?= $data['categories_list'][$data['lots_list'][$data['id']]['category']] ?></span>
                            <h3 class="lot__title"><a class="text-link" href="lot.php?index=<?= $key ?>"><?= $value['name'] ?></a></h3>
                            <div class="lot__state">
                                <div class="lot__rate">
                                    <span class="lot__amount">Стартовая цена</span>
                                    <span class="lot__cost"><?= $value['price']; ?><b class="rub">р</b></span>
                                </div>
                                <div class="lot__timer timer">
                                <?= remaining($data['remaining']); ?>                           
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
