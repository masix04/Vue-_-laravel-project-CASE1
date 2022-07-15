-- brought count for more than 1 which has 
SELECT COUNT(pt.player_id), pt.`team_id`, pt.`player_id` FROM player_team pt 
GROUP BY pt.`player_id` HAVING COUNT(pt.`player_id`) > 1

-- Updated [more accurate & ordered So easy Deletion]
SELECT COUNT(pt.player_id),pt.`team_id`, pt.`player_id` FROM player_team pt 
GROUP BY pt.`player_id`,pt.`team_id` HAVING COUNT(pt.`player_id`) > 1

-- Brought Player_ids for count more than 1
SELECT  pt.`player_id` FROM player_team pt 
GROUP BY pt.`player_id` HAVING COUNT(pt.`player_id`) > 1


SELECT COUNT(pt.player_id), pt.`player_id` FROM player_team pt 
GROUP BY pt.`player_id`

SELECT `COUNT(player_id)` AS `aggregate`, `player_id` FROM `player_team` 
GROUP BY `player_id` HAVING `aggregate` > 2