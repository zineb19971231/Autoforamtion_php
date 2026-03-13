select title , author , price from library_books ;
select price from library_books where price between 100 and 300 ;
select published_year from library_books where year(published_year) > 2020;
select title from library_books where title like '%php%'; 
select * from library_books where etat != 'Lost'  order by  published_year ;
select distinct author from library_books ;
select upper(title) , round(price) as rounded_price from library_books ;