SELECT users.id, users.name, users.alias, users.email, count(friend_id) pokeHistory
FROM users
LEFT JOIN pokes ON users.id = pokes.friend_id
WHERE users.id <> 4
GROUP BY users.id;


