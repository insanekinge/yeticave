<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php 
            $category_list = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
            ?>
            <!--заполните этот список из массива категорий-->
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html">Доски и лыжи</a>
            </li>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html">Крепления</a>
            </li>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html">Ботинки</a>
            </li>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html">Одежда</a>
            </li>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html">Инструменты</a>
            </li>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html">Разное</a>
            </li>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <?php foreach($data['product_list'] as $key => $product) { ?>
            <!--заполните этот список из массива с товарами-->
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?php echo $product['url']; ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?php echo $product['category']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?php echo $key ?>"><?php echo $product['name']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount"><?php 

                            if($product['price'] > 1000) {
                                echo number_format(($product['price']), 0, '  ' , ' ');
                            }else{
                                echo ceil($product['price']);
                            }
                            
                            ?></span>
                            <span class="lot__cost">цена<b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer">
                            <? echo timeLeft('%H:%M:%S'); ?>
                        </div>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </section>
</main>