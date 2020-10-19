-- Listado de operacion de querys Mexflix

-- moviesSeries
    -- crear una movieseries
        INSERT INTO movieseries SET imdb_id = 'tt0167261' , title = 'The Lord of the Rings: The Two Towers',  plot = '', genres = '', authors = '',acthors = '' , country = '', premiere = '2002', poster= '', trailer = '', raiting = '', status = 2, category = 'movie';
    
    -- actualizar una movieseries
        UPDATE  movieseries SET imdb_id = 'tt0167261' , title = 'The Lord of the Rings: The Two Towers', plot = 'While Frodo and Sam, now accompanied by a new guide, continue their hopeless journey towards the land of shadow to destroy the One Ring, each member of the broken fellowship plays their part in the battle against the evil wizard Saruman and his armies of Isengard.', authors = 'Bruce Allpress, Sean Astin, John Bach, Sala Baker',acthors = 'Peter Jackson', genres = 'Action, Adventure, Drama, Fantasy' , premiere = '2002', poster= 'https://m.media-amazon.com/images/M/MV5BZGMxZTdjZmYtMmE2Ni00ZTdkLWI5NTgtNjlmMjBiNzU2MmI5XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg', trailer = 'www.youtube.com', raiting = 8.7 , status = 2, category = 'movie' WHERE imdb_id = 'tt0167261';
    
    -- eliminar una moviesSerie
        DELETE FROM movieseries WHERE imdb_id = 'tt0167261';
    -- buscar todas las moviesSerie
        SELECT  ms.title, ms.plot, ms.genres, ms.authors,ms.acthors, ms.country, ms.premiere, ms.poster,ms.trailer, ms.raiting, ms.raiting, ms.category,s.status
        FROM  movieseries as ms
        INNER JOIN status as s 
        ON ms.status = s.status_id;


    -- buscar moviesSerie por Title,Author,Actor
      SELECT  ms.title, ms.plot, ms.genres, ms.authors,ms.acthors, ms.country, ms.premiere, ms.poster,ms.trailer, ms.raiting, ms.raiting, ms.category,s.status
      FROM  movieseries as ms
      INNER JOIN status as s 
      ON ms.status = s.status_id
      WHERE MATCH(ms.title,ms.authors,ms.acthors,ms.genres)
      AGAINST('drama' IN BOOLEAN MODE);

    -- buscar moviesSerie por categorias
      SELECT  ms.title, ms.plot, ms.genres, ms.authors,ms.acthors, ms.country, ms.premiere, ms.poster,ms.trailer, ms.raiting, ms.raiting, ms.category,s.status
      FROM  movieseries as ms
      INNER JOIN status as s 
      ON movieseries.status = s.status_id
      WHERE ms.category = 'movie';


    -- buscar moviesSerie por status
      SELECT  ms.title, ms.plot, ms.genres, ms.authors,ms.acthors, ms.country, ms.premiere, ms.poster,ms.trailer, ms.raiting, ms.raiting, ms.category,s.status
      FROM  movieseries as ms
      INNER JOIN status as s 
      ON movieseries.status = s.status_id
      WHERE ms.status = 1;


-- status
    
    -- crear status 
    INSERT INTO status SET status_id = 0 , status = 'Otro estreno' ;
    
    -- Salavar un status
    REPLACE INTO status(status_id,status) VALUES(0,'nuevo status');
    REPLACE status SET status_id = 0, status = 'nuevo status';
    -- actualizar status
    UPDATE status SET status = 'Excelente Estreno' WHERE status_id = 6


    -- eliminar status 
    DELETE FROM status WHERE  status_id = 6;
    
    -- bucar todos los status 
    SELECT * FROM status;

    -- buscar un status por status_id
    SELECT * FROM STATUS WHERE status_id = 6;

-- user

    -- crear usuario
    INSERT INTO users SET user = '@aldair05', email = 'alda@gmail.com', name = 'alda', birthday = '1994-05-04', pass = MD5('12345'), role = 'user';

    INSERT INTO users SET user = '@raton05', email = 'raton@gmail.com', name = 'raton', birthday = '1994-05-04', pass = MD5('12345'), role = 'user';


    -- actualizar usuario
    UPDATE users SET name = 'aldair', birthday = '1995-12-02', role = 'admin';
    
        -- actualizar datos generales
    UPDATE users SET name = 'aldair', birthday = '1995-12-02', role = 'admin' WHERE user = '@aldair05' and email = 'alda@gmail.com';
    
        -- password
    UPDATE users SET pass = MD5('123456') WHERE user = '@aldair05' and email = 'alda@gmail.com';

    -- eliminar usuario 
    DELETE FROM users WHERE user = '@aldair05' and email = 'alda@gmail.com';


    -- buscar todos los usuarios
    SELECT * FROM users; 

    -- buscar un usuario por:
        -- usuario
            SELECT FROM users WHERE user = '@aldair05';
        -- email 
            SELECT FROM users WHERE email = 'aldair05@gmail.com'
        -- rol 
            SELECT FROM users  WHERE role = 'admin '