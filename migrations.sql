create table person(
    id    binary(16)   primary key,
    nick  varchar(32)  not null,
    name  varchar(100) not null,
    birth date         not null,
    stack json
);
