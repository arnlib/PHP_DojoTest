
-- number of pokers
SELECT user_id, count(distinct user_id) pokes  from pokes
where friend_id=3
group by user_id;

SELECT user_id) pokes  from pokes
where friend_id=3;

-- pokes per friend
SELECT poker.id, COUNT(pokes.friend_id) pokes, poker.alias FROM users
JOIN pokes ON users.id = pokes.friend_id
JOIN users AS poker ON poker.id = pokes.user_id
where users.id=4
group by user_id;

SELECT count(distinct user_id) pokes, user_id FROM pokes WHERE friend_id=4;

SELECT user_id FROM pokes WHERE friend_id=4;

-- not yet poked by you
SELECT users.id from USERS
LEFT JOIN pokes on pokes.user_id = users.id
WHERE pokes.user_id is NULL;


-- list of all users not friended by user
SELECT u.id
FROM users u
    LEFT JOIN friendships f
        ON u.id = f.friend_id AND 2 IN (f.user_id)
WHERE f.friend_id IS NULL
AND u.id <> 2;


id, name, alias, email from users
where users.id NOT IN
	(select user_id from pokes
		where friend_id = 2)
AND users.id <> 2 ;



SELECT users.id, users.name, users.alias. users.email, count(friend_id) pokeHistory
FROM users
JOIN pokes ON users.id = pokes.friend_id
WHERE users.id <> 4;



GROUP BY users.id;