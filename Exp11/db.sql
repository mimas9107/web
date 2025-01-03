-- Populate `users` table
INSERT INTO users (id, name, email, age) VALUES
(1, 'Alice Smith', 'alice@example.com', 25),
(2, 'Bob Johnson', 'bob@example.com', 34),
(3, 'Charlie Brown', 'charlie@example.com', 29),
(4, 'David Wilson', 'david@example.com', 22),
(5, 'Eve Davis', 'eve@example.com', 31),
(6, 'Frank White', 'frank@example.com', 27),
(7, 'Grace Hall', 'grace@example.com', 26),
(8, 'Hannah King', 'hannah@example.com', 30),
(9, 'Ian Wright', 'ian@example.com', 28),
(10, 'Julia Green', 'julia@example.com', 33);

-- Populate `projects` table
INSERT INTO projects (id, name, start_date) VALUES
(1, 'Project Alpha', '2023-05-15'),
(2, 'Project Beta', '2023-07-01'),
(3, 'Project Gamma', '2023-09-10'),
(4, 'Project Delta', '2023-11-05'),
(5, 'Project Epsilon', '2024-01-20'),
(6, 'Project Zeta', '2024-03-15'),
(7, 'Project Eta', '2024-05-30'),
(8, 'Project Theta', '2024-07-18'),
(9, 'Project Iota', '2024-09-10'),
(10, 'Project Kappa', '2024-11-25');

-- Populate `assignments` table
INSERT INTO assignments (user_id, project_id, role) VALUES
(1, 1, 'Developer'),
(2, 2, 'Manager'),
(3, 3, 'Tester'),
(4, 4, 'Analyst'),
(5, 5, 'Developer'),
(6, 6, 'Tester'),
(7, 7, 'Manager'),
(8, 8, 'Developer'),
(9, 9, 'Analyst'),
(10, 10, 'Manager'),
(1, 2, 'Analyst'),
(2, 3, 'Developer'),
(3, 4, 'Manager'),
(4, 5, 'Tester'),
(5, 6, 'Developer');
