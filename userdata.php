<?php
return [ [
      'email' => 'ignat.v@gmail.com',
      'name' => 'Игнат',
      // 'password' => 'ugOGdVMi',
      // 'password' => '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka'	
      'password' => password_hash('ugOGdVMi', PASSWORD_BCRYPT )
  ],
  [
      'email' => 'kitty_93@li.ru',
      'name' => 'Леночка',
    //   'password' => 'daecNazD',
    'password' => password_hash('daecNazD', PASSWORD_BCRYPT )
  ],
  [
      'email' => 'warrior07@mail.ru',
      'name' => 'Руслан',
    //   'password' => 'oixb3aL8',
    'password' => password_hash('oixb3aL8', PASSWORD_BCRYPT )
  ]
];	



