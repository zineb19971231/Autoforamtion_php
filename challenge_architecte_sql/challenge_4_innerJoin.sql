
create table categories ( id int  primary key , 
nom varchar(15)
);
insert into categories (id , nom )
values(1 , 'Finance'),(2 , 'Littérature') ;
alter table library_books add category_id int ; 
update library_books set category_id = 1 where id in (1,3);
select  * from library_books;
select title , nom from library_books L inner join categories G on L.category_id = G.id ;