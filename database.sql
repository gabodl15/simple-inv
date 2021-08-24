create table if not exists material(
  id_material int(11) not null primary key auto_increment,
  name_material varchar(50) not null,
  quantity int(100) not null default 0
);
