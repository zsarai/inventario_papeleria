use inventario_papeleria;

describe resguardo_prod;

drop table resguardo_prod;

describe romp;
drop table romp;

describe gencod_producto;

create table if not exists romp(
	id_gencod_prod_fk int(11) not null,
    id_resguardo_fk int(11) not null,
    
    
    index(id_gencod_prod_fk),
    foreign key(id_gencod_prod_fk) references gencod_producto(id_gencod_prod),
    
    index(id_resguardo_fk),
    foreign key(id_resguardo_fk) references resguardo_prod(id_resguardo)
    
) engine = Innodb charset = utf8;

drop table resguardo_prod

create table if not exists resguardo_prod(
	id_resguardo int(11) auto_increment,
    pers_cod varchar(23) not null,
    are_cod varchar(20) not null,
    fecha_entrega datetime not null,
    users_cod varchar(100) not null,
    
    primary key(id_resguardo)
    
) engine = Innodb charset = utf8 auto_increment = 1;

show tables;
use rechum;
describe areas;

alter table resguardo_prod change are_cod are_cod varchar(20) not null

alter table resguardo_prod add index(are_cod);

ALTER TABLE resguardo_prod ADD
	CONSTRAINT `areas_ibfk_105` FOREIGN KEY (`are_cod`) REFERENCES `rechum`.`areas` (`are_cod`) ON UPDATE CASCADE;