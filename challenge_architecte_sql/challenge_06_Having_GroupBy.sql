select etat ,count(id)  as TotalBook from library_books group by etat;
select author , sum(price) as totalValueBooks from library_books  group by author ;
select author , sum(price) as totalPrice from library_books group by author having sum(price) > 500; 