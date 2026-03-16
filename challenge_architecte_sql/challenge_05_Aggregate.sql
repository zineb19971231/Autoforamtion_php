select sum(price) as totalePricebook from library_books; 
 select   count(*) as SumBooksAvailable from library_books where etat = 'Available'; 
 select min(price) as cheapestPrice  , max(price) as expensivePrice  from library_books  ;
 select avg(price) as averagePrice from library_books;