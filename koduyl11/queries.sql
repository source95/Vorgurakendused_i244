# new tabel 
CREATE TABLE ffjodoro_loomaaed (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  nimi VARCHAR(30),
  vanus INT(11),
  liik VARCHAR(30),
  puur INT(11)
);

# insert into tabel
INSERT INTO ffjodoro_loomaaed (nimi, vanus, liik, puur) VALUES
  ('Raak', 18, 'dsd', 4),
  ('Fass', 20, 'kass', 7),
  ('Barsik', 21, 'koer', 2),
  ('Revolver', 26, 'koer', 2),
  ('Test', 39, 'fre', 4);

#queries
SELECT nimi, puur FROM `ffjodoro_loomaaed` WHERE puur=2;
SELECT MAX(vanus) AS max_vanus, MIN(vanus) AS min_vanus FROM `ffjodoro_loomaaed`;
SELECT puur, COUNT(puur) AS count_puur FROM `ffjodoro_loomaaed` GROUP BY puur;
UPDATE `ffjodoro_loomaaed` SET `vanus`=`vanus`+1;

