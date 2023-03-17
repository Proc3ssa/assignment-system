create table users( name varchar(40), index_number varchar(10)PRIMARY key, email varchar(30), paswrd varchar(16), img_link varchar(70))


create table notes(
course varchar(40),
uploaded_date varchar(10),
link varchar(20));

create table assignments(
title varchar(40),
asscode varchar(10),
deadline varchar(20),
link varchar(10));

create table assessment( index_number varchar(10), mark varchar(3), asscode varchar(5), course varchar(40),foreign key(index_number) references users(index_number) on delete cascade)

create table submissions( index_number varchar(10), submission_date varchar(10), course varchar(40), asscode varchar(10), link varchar(30), foreign key(index_number) references users(index_number) on delete cascade)


create table information(
lecturer varchar(20),
uploaded_date varchar(20),
message varchar(1000),
title varchar(20));

