-- QUERYS MULTIPLES

SELECT ms.title, ms.category, ms.country, ms.genres, ms.premiere, s.status FROM movieseries as ms INNER JOIN status as s WHERE ms.status= s.status_id ORDER BY ms.premiere DESC;


-- QUERYS FULLTEXT 

SELECT * FROM movieseries
        WHERE WATCH(title,authors,acthors,genres)
        AGAINST('' IN BOLEEAN MODE);

        
SELECT * FROM movieseries
        WHERE WATCH(title,authors,acthors,genres)
        AGAINST('' IN BOLEEAN MODE);

SELECT ms.title, ms.category, ms.country, ms.genres,ms.premiere, s.status 
    FROM movieseries ms 
    INNER JOIN status s
    ON ms.status = s.status_id
    WHERE MATCH(ms.title,ms.authors,ms.acthors,ms.genres)
    AGAINST('drama' IN BOOLEAN MODE)

-- INTEGRIDAD REFERENCIAL

SELECT COUNT(*) FROM movieseries WHERE status = 1