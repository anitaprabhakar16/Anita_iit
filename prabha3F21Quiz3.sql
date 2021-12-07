-- create the tables
CREATE TABLE `myprojects` (
 `number` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `menuName` varchar(100) NOT NULL,
 `menuDesc` varchar(100) NOT NULL,
 `menuURL` varchar(100) NOT NULL,
 PRIMARY KEY (`number`)
);

-- insert data into the tables
INSERT INTO myprojects VALUES
  (1, "Lab 2", "Resume","https://anitaprabhakar16.github.io/Anita_iit/Lab%202/ITWSlab2.html"),
  (2, "Lab 3", "Website","https://anitaprabhakar16.github.io/Anita_iit/index.html"),
  (3, "Lab 4", "XML Files","https://anitaprabhakar16.github.io/Anita_iit/Lab%204/Lab4RSS.xml"),
  (4, "Lab 5", "Form","https://anitaprabhakar16.github.io/Anita_iit/Lab%205/lab5_Anita.html"),
  (5, "Lab 6", "Click function with JS","https://anitaprabhakar16.github.io/Anita_iit/Lab%206/lab6_Anita.html"),
  (5, "Lab 8", "XSS","https://anitaprabhakar16.github.io/Anita_iit/Lab%208/lab8.html"),
  (5, "Lab 9", "JSON file","lab9json.json"),

