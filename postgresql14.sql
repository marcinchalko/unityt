CREATE SCHEMA IF NOT EXISTS public;
CREATE SEQUENCE author_id_seq INCREMENT BY 1 MINVALUE 1 START 1;
CREATE SEQUENCE book_id_seq INCREMENT BY 1 MINVALUE 1 START 1;
CREATE SEQUENCE review_id_seq INCREMENT BY 1 MINVALUE 1 START 1;
CREATE TABLE author (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, surname VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id));
CREATE TABLE book (id INT NOT NULL, author_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, year_of_publication INT DEFAULT NULL, isbn_number VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id));
CREATE UNIQUE INDEX UNIQ_CBE5A331185B1BC8 ON book (isbn_number);
CREATE INDEX IDX_CBE5A331F675F31B ON book (author_id);
CREATE TABLE review (id INT NOT NULL, book_id INT DEFAULT NULL, rate SMALLINT DEFAULT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id));
CREATE INDEX IDX_794381C616A2B381 ON review (book_id);
ALTER TABLE book ADD CONSTRAINT FK_CBE5A331F675F31B FOREIGN KEY (author_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE review ADD CONSTRAINT FK_794381C616A2B381 FOREIGN KEY (book_id) REFERENCES book (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

select a.*, count(b.id) as books from author a 
left join book b on a.id = b.author_id 
group by a.id 

select a.*, avg(r.rate) as average from author a 
inner join book b on a.id = b.author_id 
inner join review r on b.id = r.book_id  
group by a.id 
order by average DESC  
limit 5
