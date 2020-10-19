-- Mexflix :Bases de datos de peliculas 

DROP DATABASE IF EXISTS mexflix;

CREATE DATABASE  IF NOT EXISTS mexflix;

USE mexflix;


-- Tabla Catalogo
CREATE TABLE status(
    status_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    status VARCHAR (20) NOT NULL
);

-- Tabla de Datos
CREATE TABLE movieseries(
    imdb_id CHAR (9) PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    plot TEXT,
    genres VARCHAR(50) NOT NULL,
    authors VARCHAR(100) DEFAULT 'pending',
    acthors VARCHAR(100) DEFAULT 'pending',
    country VARCHAR(30) DEFAULT 'unknown',
    premiere YEAR(4) NOT NULL,
    poster VARCHAR(150) DEFAULT 'no-poster.jpg',
    trailer VARCHAR(150) DEFAULT 'no-trailer.jpg ',
    raiting DECIMAL(2,1),
    status INTEGER UNSIGNED NOT NULL,
    category ENUM('movie','serie') NOT NULL,
    FULLTEXT KEY search(title,authors,acthors,genres),
    FOREIGN KEY(status) REFERENCES status(status_id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE users(
    user VARCHAR(50) PRIMARY KEY,
    email VARCHAR(80) UNIQUE NOT NULL,
    name  VARCHAR(100) NOT NULL,
    birthday DATE NOT NULL,
    pass CHAR(32) NOT NULL,
    role ENUM('admin','user') NOT NULL

);


-- 'coming soon', 'realese', 'In Issue', 'Finished','cancel'

INSERT INTO status(status_id,status) VALUES
    (1,'coming soon'),
    (2,'realese'),
    (3,'In Issue'),
    (4,'Finished'),
    (5,'cancel');
    
INSERT INTO users(user,email,name,birthday,pass,role) VALUES
    ('@aldair','aldair.uaem@gmail.com','Aldair','1994-05-04',MD5('alda'),'admin'),
    ('@carlos','carlo.trabajo@gmail.com','Carlos','1996-05-25',MD5('carlillos'),'user');

INSERT INTO movieseries(imdb_id,title,plot,genres,authors,acthors,country,premiere,poster,trailer,raiting,status,category) VALUES
    ('tt1392190', 'Mad Max: Fury Road', 'An apocalyptic story set in the furthest reaches of our planet, in a stark desert landscape where humanity is broken, and almost everyone is crazed fighting for the necessities of life. Within this world exist two rebels on the run who just might be able to restore order. There\'s Max, a man of action and a man of few words, who seeks peace of mind following the loss of his wife and child in the aftermath of the chaos. And Furiosa, a woman of action and a woman who believes her path to survival may be achieved if she can make it across the desert back to her childhood homeland.', 'Action, Adventure', 'George Miller', 'Tom Hardy, Charlize Theron', 'Australia, South Africa', '2015', 'https://m.media-amazon.com/images/M/MV5BN2EwM2I5OWMtMGQyMi00Zjg1LWJkNTctZTdjYTA4OGUwZjMyXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=hEJnMQG9ev8', 10, 1, 'Movie'),
	('tt4154796', 'Avengers: Infinity War - Part II', 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', 'Action, Sci-Fi', 'Anthony Russo, Joe Russo', 'Robert Downey Jr., Chris Hemsworth', 'USA', '2019', 'https://m.media-amazon.com/images/M/MV5BMjMxNjY2MDU1OV5BMl5BanBnXkFtZTgwNzY1MTUwNTM@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=6ZfuNTqbHE8', 8.4, 1, 'Movie'),
    ('tt0816692','Interstellar','Earths future has been riddled by disasters, famines, and droughts. There is only one way to ensure mankind\'s survival: Interstellar travel. A newly discovered wormhole in the far reaches of our solar system allows a team of astronauts to go where no man has gone before, a planet that may have the right environment to sustain human life.','Adventure, Drama, SciFi, Thriller','Ellen Burstyn, Matthew McConaughey, Mackenzie Foy','Ellen Burstyn, Matthew McConaughey, Mackenzie Foy, John Lithgow','USA, UK, Canada,Awards',2018,'https://m.media-amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg','https://www.youtube.com/watch?v=NqniWGlg5kU',8.1,2,'movie'),
   ('tt1520211', 'The Walking Dead', 'Rick Grimes is a former Sheriff\'s deputy who has been in a coma for several months after being shot while on duty. When he awakens he discovers that the world has been ravished by a zombie epidemic of apocalyptic proportions, and that he seems to be the only person still alive. After returning home to discover his wife and son missing, he heads for Atlanta to search for his family. Narrowly escaping death at the hands of the zombies on arrival in Atlanta he is aided by another survivor, Glenn, who takes Rick to a camp outside the town. There Rick finds his wife Lori and his son, Carl, along with his partner/best friend Shane and a small group of survivors who struggle to fend off the zombie hordes; as well as competing with other surviving groups who are prepared to do whatever it takes to survive in this harsh new world.', 'Drama, Horror', 'Frank Darabont', 'Andrew Lincoln, Steven Yeun, Chandler Riggs, Norman Reedus', 'USA', '2010', 'https://m.media-amazon.com/images/M/MV5BYTUwOTM3ZGUtMDZiNy00M2I3LWI1ZWEtYzhhNGMyZjI3MjBmXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=R1v0uFms68U', 8.6, 3, 'Serie'),
	('tt0479143', 'Rocky Balboa', 'Thirty years after the ring of the first bell, Rocky Balboa comes out of retirement and dons his gloves for his final fight; against the reigning heavyweight champ Mason \'The Line\' Dixon.', 'Drama, Sport', 'Sylvester Stallone', 'Sylvester Stallone, Burt Young, Antonio Tarver, Geraldine Hughes', 'USA','2006', 'https://m.media-amazon.com/images/M/MV5BNWIyNmQyNjctYmVmMS00MGI4LWIxMmUtNjA0ODYzOTA0Yjk0L2ltYWdlXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=8tab8fK2_3w', 7.2, 2, 'Movie'),
	('tt4158110', 'Mr. Robot', 'Elliot Alderson, a young cyber-security engineer living in New York who assumes the role of a vigilante hacker by night. Elliot meets a mysterious anarchist known as "Mr. Robot" who recruits Elliot to join his team of hackers, "fsociety". Elliot, who has a social anxiety disorder and connects to people by hacking them, is intrigued but uncertain if he wants to be part of the group. The show follows Mr. Robot\'s attempts to engage Elliot in his mission to destroy the corporation Elliot is paid to protect. Compelled by his personal beliefs, Elliot struggles to resist the chance to take down the multinational CEOs that are running (and ruining) the world.', 'Crime, Drama', ' Sam Esmail', 'Rami Malek, Carly Chaikin, Portia Doubleday, Martin Wallström', 'USA', '2015', 'https://m.media-amazon.com/images/M/MV5BMzgxMmQxZjQtNDdmMC00MjRlLTk1MDEtZDcwNTdmOTg0YzA2XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=Ug4fRXGyIak', 9.0, 3, 'Serie'),
	('tt0468569', 'The Dark Knight', 'Batman raises the stakes in his war on crime. With the help of Lieutenant Jim Gordon and District Attorney Harvey Dent, Batman sets out to dismantle the remaining criminal organizations that plague the city streets. The partnership proves to be effective, but they soon find themselves prey to a reign of chaos unleashed by a rising criminal mastermind known to the terrified citizens of Gotham as The Joker.', 'Action, Crime, Drama', 'Christopher Nolan', 'Christian Bale, Heath Ledger, Aaron Eckhart, Michael Caine', 'USA, UK', '2008', 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=EXeTwQWrcwY', 9.0, 2, 'Movie'),
	('tt2431438', 'Sense8', 'Sense8 tells the story of eight strangers: Will (Smith), Riley (Middleton), Capheus (Ameen), Sun (Bae), Lito (Silvestre), Kala (Desai), Wolfgang (Riemelt), and Nomi (Clayton). Each individual is from a different culture and part of the world. In the aftermath of a tragic death they all experience through what they perceive as dreams or visions, they suddenly find themselves growing mentally and emotionally connected. While trying to figure how and why this connection happened and what it means, a mysterious man named Jonas tries to help the eight. Meanwhile, another stranger called Whispers attempts to hunt them down, using the same sensate power to gain full access to a sensate\'s mind (thoughts/sight) after looking into their eyes. Each episode reflects the views of the characters interacting with each other while delving deeper into their backgrounds and what sets them apart and brings them together with the others.', 'Drama, Mystery, Sci-Fi', 'J. Michael Straczynski, Andy Wachowski, Lana Wachowski', 'Aml Ameen, Doona Bae, Jamie Clayton, Tina Desai', 'USA', '2015', 'https://m.media-amazon.com/images/M/MV5BMjA4MTEyMzcwMl5BMl5BanBnXkFtZTgwMTIwODczNTM@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=riLgCIvE9aU', 8.4, 3, 'Serie'),
	('tt6189022', 'Angel Has Fallen', 'It\s been two years since the massive terrorist attack in London had taken place, and, just as Mike Banning had thought they were out of the woods, he was proven wrong. On a flight with the president aboard Air Force One, terrorists see it as a new plan of attack, and take the opportunity. Now Mike has to protect the president once again, with higher stakes than ever before.', 'Action, Thriller', 'Ric Roman Waugh', 'Tony Dalton, Ana Claudia Talancon, Pedro Armendariz Jr., Kristoff', 'USA', '2019', 'https://m.media-amazon.com/images/M/MV5BYmRmMWZhZGItYzA4MC00ZDYyLWE0OTMtYmM0MWRiN2Q4NGU2XkEyXkFqcGdeQXVyMjMxOTE0ODA@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=isVtXH7n9lI', 7.6, 2, 'Movie'),
	('tt2654620', 'The Strain', 'A thriller that tells the story of Dr. Ephraim Goodweather, the head of the Center for Disease Control Canary Team in New York City. He and his team are called upon to investigate a mysterious viral outbreak with hallmarks of an ancient and evil strain of vampirism. As the strain spreads, Eph, his team, and an assembly of everyday New Yorkers, wage war for the fate of humanity itself.', 'Drama, Horror, Thriller', 'Guillermo del Toro, Chuck Hogan', 'Corey Stoll, David Bradley, Kevin Durand, Richard Sammel', 'USA', '2014', 'https://m.media-amazon.com/images/M/MV5BNjQxNzVlNjQtMTg3YS00MzBmLThkNzAtMzMyNDUyMTVlNzg0XkEyXkFqcGdeQXVyOTQxNzM2MjY@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=RiN8Edb4X2w', 7.5, 3, 'Serie'),
	('tt3076658', 'Creed', 'The former World Heavyweight Champion Rocky Balboa serves as a trainer and mentor to Adonis Johnson, the son of his late friend and former rival Apollo Creed.', 'Drama, Sport', 'Ryan Coogler', 'Sylvester Stallone, Michael B. Jordan, Tessa Thompson, Graham McTavish', 'USA', '2015', 'https://m.media-amazon.com/images/M/MV5BNmZkYjQzY2QtNjdkNC00YjkzLTk5NjUtY2MyNDNiYTBhN2M2XkEyXkFqcGdeQXVyMjMwNDgzNjc@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=Uv554B7YHk4', 7.9, 2, 'Movie'),

	('tt2575988', 'Silicon Valley', 'In the high-tech gold rush of modern Silicon Valley, the people most qualified to succeed are the least capable of handling success. A comedy partially inspired by Mike Judge\'s own experiences as a Silicon Valley engineer in the late 1980s.', 'Comedy', 'John Altschuler, Mike Judge, Dave Krinsky', 'Thomas Middleditch, T.J. Miller, Josh Brener, Martin Starr', 'USA', '2014', 'https://m.media-amazon.com/images/M/MV5BOTcwNzU2MGEtMzUzNC00MzMwLWJhZGItNDY3NDllYjU5YzAyXkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=69V__a49xtw', 8.5, 3, 'Serie'),

	('tt0851851', 'Terminator: The Sarah Connor Chronicles', 'This series is set after the events of Terminator 2: Judgment Day (1991). After the sacrifices of Dr. Miles Dyson and T-800 Model 101 Terminator, the Connors find themselves once again being stalked by Skynet\'s agents from the future. Realizing their nightmare isn\'t over, they decide to stop running and focus on preventing the birth of Skynet. With the aid of Cameron Phillips, a beautiful girl who has a mysterious past also linked to the future; Derek Reese, a Tech-Com soldier from the future whose past is linked with the Connors; Riley, a beautiful schoolfriend of John; and FBI Agent James Ellison, who was assigned to capture the Connors but joins them after his own encounter with one of the machines. They begin a quest to stop the United States military and a shadowy conspiracy from the future from creating the program that will stop at nothing to bring humanity to an end.', 'Action, Drama, Sci-Fi', 'Josh Friedman', 'Lena Headey, Thomas Dekker, Summer Glau, Richard T. Jones', 'USA', '2008', 'https://m.media-amazon.com/images/M/MV5BZGE2ZDgyOWUtNzdiNS00OTI3LTkwZGQtMTMwNzM4YWUxNGNhXkEyXkFqcGdeQXVyNjU2NjA5NjM@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=i0fXTDI1egY', 7.7, 5, 'Serie'),
	
    ('tt6924650', 'Midway', 'The story of the Battle of Midway, told by the leaders and the sailors who fought it.', 'Action, Adventure, Fantasy', 'Roland Emmerich', 'Ed Skrein, Patrick Wilson, Woody Harrelson, Luke Evans', 'USA', '2019', 'https://m.media-amazon.com/images/M/MV5BYzA5Y2Q2YjktZDYwMi00NTdmLThlMjctMmY5NDgwOWRhZDUxXkEyXkFqcGdeQXVyODE5NzE3OTE@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=1qkuieXeHbg', 8.0, 1, 'Movie'),

	('tt0455275', 'Prison Break', 'Due to a political conspiracy, an innocent man is sent to death row and his only hope is his brother who makes it his mission to deliberately get himself sent to the same prison in order to break the both of them from the inside out.', 'Action, Crime, Drama', 'Paul Scheuring', 'Dominic Purcell, Wentworth Miller, Amaury Nolasco, Robert Knepper', 'USA', '2005', 'https://m.media-amazon.com/images/M/MV5BMTg3NTkwNzAxOF5BMl5BanBnXkFtZTcwMjM1NjI5MQ@@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=AL9zLctDJaU', 8.5, 4, 'Serie'),
	('tt1010048', 'Slumdog Millionaire', '', 'Drama, Romance', 'Danny Boyle, Loveleen Tandan', 'Dev Patel, Saurabh Shukla, Anil Kapoor, Rajendranath Zutshi', 'UK, USA', '2008', 'https://m.media-amazon.com/images/M/MV5BZmNjZWI3NzktYWI1Mi00OTAyLWJkNTYtMzUwYTFlZDA0Y2UwXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=AIzbwV7on6Q', 8.0, 2, 'Movie'),
	('tt1442449', 'Spartacus', 'Watch the story of history\'s greatest gladiator unfold with graphic violence and the passions of the women that love them. This is Spartacus.', 'Action, Adventure, Biography', 'Steven S. DeKnight', 'Andy Whitfield, Manu Bennett, Daniel Feuerriegel, Peter Mensah, Lucy Lawless', 'USA, New Zealand', '2013', 'https://m.media-amazon.com/images/M/MV5BZTEwZTM3MzUtMzk3Yy00YWI4LWI1ZTktOTc1MmRjZWM5ZDhmXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=ptX_pjz5s2k', 8.6, 4, 'Serie'),
	('tt2356180', 'Bhaag Milkha Bhaag', 'The true story of the "Flying Sikh" - world champion runner and Olympian Milkha Singh -- who overcame the massacre of his family, civil war during the India-Pakistan partition, and homelessness to become one of India\'s most iconic athletes.', 'Action, Biography, Drama', 'Rakeysh Omprakash Mehra', 'Farhan Akhtar, Sonam Kapoor, Pavan Malhotra, Art Malik', 'India', '2013', 'https://m.media-amazon.com/images/M/MV5BMTY1Nzg4MjcwN15BMl5BanBnXkFtZTcwOTc1NTk1OQ@@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=u71swQ4ksgI', 8.3, 2, 'Movie'),
	('tt3489184', 'Constantine', 'A man struggling with his faith is haunted by the sins of his past but is suddenly thrust into the role of defending humanity from the gathering forces of darkness.', 'Drama, Fantasy, Horror', 'Daniel Cerone, David S. Goyer', 'Matt Ryan, Harold Perrineau, Angélica Celaya, Charles Halford', 'USA', '2014', 'https://m.media-amazon.com/images/M/MV5BMTQ2MzQzMjA2NF5BMl5BanBnXkFtZTgwODg1MTI4MjE@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=CNPIG40KcbU', 7.5, 5, 'Serie'),
	('tt1606384', 'My Way', 'In World War II-era Korea, rival runners, one Korean (Jang Dong-gun) and one Japanese (Joe Odagiri), go to war together against the Soviets.', 'Action, Drama, History', 'Je-kyu Kang', 'Dong-gun Jang, Joe Odagiri, Bingbing Fan, In-kwon Kim', 'South Korea', '2011', 'https://m.media-amazon.com/images/M/MV5BMjM2MTI4OTc5OF5BMl5BanBnXkFtZTgwNDk1MTAzMjE@._V1_SX300.jpg', 'https://www.youtube.com/watch?v=HpYk5ww8Jjc', 7.8, 2, 'Movie');

	