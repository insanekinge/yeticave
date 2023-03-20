USE yeticave;

INSERT INTO categories SET id = 'boards', name = 'Доски и лыжи';
INSERT INTO categories SET id = 'attachment', name = 'Крепления';
INSERT INTO categories SET id = 'boots', name = 'Ботинки';
INSERT INTO categories SET id = 'clothing', name = 'Одежда';
INSERT INTO categories SET id = 'tools', name = 'Инструменты';
INSERT INTO categories SET id = 'other', name = 'Разное';

INSERT INTO users SET name = 'Игнат', email = 'ignat.v@gmail.com', <?php password_hash = password_hash('ugOGdVMi', PASSWORD_BCRYPT ) ?>;
INSERT INTO users SET name = 'Леночка', email = 'kitty_93@li.ru', <?php password_hash = password_hash('daecNazD', PASSWORD_BCRYPT ) ?>;
INSERT INTO users SET name = 'Руслан', email = 'warrior07@mail.ru', <?php password_hash = password_hash('oixb3aL8', PASSWORD_BCRYPT ) ?>;

INSERT INTO lots SET name = '2014 Rossignol District Snowboard', description = 'Описание временно отсутствует.', price = 10999, step = 500, img = 'img/lot-1.jpg', category_id = 'boards', user_id = 1;
INSERT INTO lots SET name ='DC Ply Mens 2016/2017 Snowboard' , description = 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', price = 159999, step = 500, img = 'img/lot-image.jpg', category_id = 'boards', user_id = 1;
INSERT INTO lots SET name = 'Крепления Union Contact Pro 2015 года размер L/XL', description = 'Описание временно отсутствует.', price = 8000, step = 500, img = 'img/lot-3.jpg', category_id = 'attachment', user_id = 1;
INSERT INTO lots SET name = 'Ботинки для сноуборда DC Mutiny Charocal', description = 'Описание временно отсутствует.', price = 10999, step = 500, img = 'img/lot-4.jpg', category_id = 'boots', user_id = 1;
INSERT INTO lots SET name = 'Куртка для сноуборда DC Mutiny Charocal', description = 'Описание временно отсутствует.', price = 7500, step = 500, img = 'img/lot-5.jpg', category_id = 'clothing', user_id = 1;
INSERT INTO lots SET name = 'Маска Oakley Canopy', description = 'Описание временно отсутствует.', price = 5400, step = 500, img = 'img/lot-6.jpg', category_id = 'other', user_id = 1;

INSERT INTO bets SET create_ts = 1679051283, price = 8600, lot_id = 3, user_id = 2;
INSERT INTO bets SET create_ts = 1679051283, price = 9400, lot_id = 3, user_id = 3;


/* получить список из всех категорий */
SELECT name FROM categories;

/* получить самые новые, открытые лоты */
SELECT * FROM lots WHERE expire_ts > 1679051283;

/* найти лот по его названию или описанию */
SELECT * FROM lots WHERE name LIKE 'Маска%' OR description LIKE '% и %';

/* обновить название лота по его идентификатору */
SELECT name FROM lots WHERE id = 3;

/* получить список самых свежих ставок для лота по его идентификатору */
SELECT * FROM bets WHERE lot_id = 3;