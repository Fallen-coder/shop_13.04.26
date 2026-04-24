INSERT INTO customers (id, Fname,Lname,password,role, email, born_at, points) VALUES
(1, 'Barbara',' MacCaffrey',null,2, 'babara@gmail.com', '1986-03-28', 0),
(2, 'Alex',' Dufvey',null,2, 'Alex@gmail.com', '1986-03-28', 0),
(3, 'Epstein',' Montvids',null,2, 'Epstein@gmail.com', '1986-03-28', 0),
(4, 'Rodolf',' Reindier',null,2, 'Rodolf@gmail.com', '1999-03-28', 0);


INSERT INTO orders (id, customers_id, order_date, status, arival_date) VALUES
(1, 1, '2026-04-07', 'processing', '2026-04-12'),
(2, 1, '2025-04-07', 'shipped', '2025-04-12'),
(3, 2, '2026-04-07', 'processing', '2026-04-12'),
(4, 2, '2025-04-07', 'shipped', '2025-04-12'),
(5, 3, '2026-04-07', 'processing', '2026-04-12'),
(6, 3, '2025-04-07', 'shipped', '2025-04-12'),
(7, 3, '2026-04-07', 'processing', '2026-04-12');
