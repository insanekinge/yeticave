<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($categories as $value) : ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="all-lots.html"><? echo $value ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach ($products as $key => $value) : ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src=<? echo $value['image-path'] ?> width="350" height="260" alt=<? echo $value['lot-name'] ?>>
                </div>
                <div class="lot__info">
                    <span class="lot__category"><? echo $value['category'] ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?index=<? echo $key ?>"><? echo $value['lot-name'] ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><? echo format_price($value['lot-rate']) ?><b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer">
                            <? echo $time_to_end ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</section>