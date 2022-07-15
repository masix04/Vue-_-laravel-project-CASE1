
-- teams which are showing more than 1 in single tournament are anomalies
-- Shows (Count) & tournament_id & teams_id of them

SELECT tt.`tournament_id`, tt.`team_id`, COUNT(tt.team_id) AS teams_count FROM tournament_team tt
GROUP BY tt.`team_id`,tt.`tournament_id`
HAVING teams_count > 1
-- order by team_id

-- team_id IN(1,2,4,5,8,18,28,35,52)

SELECT  t.name, t.slug,t.id AS team_id, tt.`tournament_id`,tt.`id` AS tour_team_id FROM teams t
JOIN tournament_team tt ON tt.`team_id` = t.id
WHERE tt.`team_id` IN (1,2,4,5,8,18,28,35,52)
ORDER BY team_id, tournament_id