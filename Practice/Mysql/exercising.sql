select * from country where name = "kosovo";

insert into country (Code,Name,Continent,Region,SurfaceArea,Population,LocalName,GovernmentForm,Code2)
values ('KOS', 'Kosovo', 'Europe', 'Region', 123,1,'LocalName','GovermmentForm','12');


insert into city (Name,CountryCode,District,Population) values('Priština', 'KOS','District',12531);

select * from city where id = 4081;


update city set Name= "Priština_U" where ID = 4081;

DELETE FROM city WHERE ID =4081;

delete from country where code ="KOS";



###################################################################################



select * from mjesto where postanskibroj like '31%';

select * from mjesto where naziv like '%a';

####################################################################################


select * from autor where datumrodenja is null;

update autor set datumrodenja = '1983-2-7' where sifra = 3;

select * from autor where sifra=3;

select * from autor where ime = "Ante";

select * from izdavac where naziv like '%d.o.o%' or naziv like '%d.oo%' or naziv like '%do.o%';

####################################################################################

select ime as name, "something" as prezime from autor;


#############################################################################

select * from autor where datumrodenja < now(); 




##################################################################################


select autor, naslov from katalog;


##########################################################
##########################################################
##########################################################



#1. Write a query to display the names (first_name, last_name) using alias name “First Name", "Last Name Go to the editor

select first_Name, last_name from employees;

#2. Write a query to get unique department ID from employee table

select distinct department_id from employees;


#3. Write a query to get all employee details from the employee table order by first name, descending.

select * from employees order by first_name desc;

#4. Write a query to get the names (first_name, last_name), salary, PF of all the employees 
#(PF is calculated as 15% of salary).

select first_name, last_name,salary,salary*0.15 from employees;

#5. Write a query to get the employee ID, names (first_name, last_name), 
#salary in ascending order of salary.Go to the editor

select employee_ID, first_name, last_name ,salary
from employees
order by salary;


#7. Write a query to get the maximum and minimum salary from employees table.

select MIN(salary), MAX(salary) 
from employees;


#8. Write a query to get the average salary and number of employees in the employees table.

select avg(salary), count(id) from employees;


#9. Write a query to get the number of employees working with the company.

select count(*) from employees;


#10. Write a query to get the number of jobs available in the employees table

select distinct count(job_id) from employees;


#11. Write a query get all first name from employees table in upper case. 

select upper(first_name) from employees;

#12. Write a query to get the first 3 characters of first name from employees table

#odgovor - SELECT SUBSTRING(first_name,1,3) FROM employees;



#13.Write a query to calculate 171*214+625.

select 171*214+625 result;



jztjzd








#------------------------------------



1. Write a query to display all salesmen and customer located in London.


SELECT name FROM salesman WHERE city ='London'
UNION 
(SELECT cust_name FROM customer WHERE city='London');



2. Write a query to display distinct salesman and their cities.

SELECT salesman_id, city FROM customer
UNION
(SELECT salesman_id, city FROM salesman)



3. Write a query to display all the salesmen and customer involved in this inventory management system.

SELECT  customer_id, salesman_id FROM ORDER
UNION (SELECT  customer_id, salesman_id FROM customer);



4. Write a query to make a report of which salesman produce the largest and smallest orders on each date. 

SELECT a.salesman_id, name, ord_no, 'highest on', ord_date FROM salesman a, orders b 
WHERE a.salesman_id =b.salesman_id
AND b.purch_amt=
	(SELECT MAX (purch_amt)
	FROM orders c
	WHERE c.ord_date = b.ord_date)
UNION
(SELECT a.salesman_id, name, ord_no, 'lowest on', ord_date
FROM salesman a, orders b
WHERE a.salesman_id =b.salesman_id
AND b.purch_amt=
	(SELECT MIN (purch_amt)
	FROM orders c
	WHERE c.ord_date = b.ord_date))
	
	
	
	
create table test
select status , amount from orders 
union 
select name , lastname from users;

select * from test;

insert into test
select status , amount from orders 
union 
select name , lastname from users;


# Na koji datum narudžbe je prodan najskuplji (priceEach) proizvod?
select a.order_date, b.price
from orders a 
inner join bought b on a.id = b.orders
where b.price = (select max(b.price) from bought b);

# obrisati sve proizvode koji nisu niti na jednoj narudÅ¾bi

delete from products where id not in 
(select distinct product from bought);
	


















	
	
