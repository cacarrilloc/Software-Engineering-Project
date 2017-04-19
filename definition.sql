-- Authors: Carlos Carrillo, Stephanie Creamer
-- CS_361_OSU
-- Date:   07/26/2016
-- Description: Queries to create the tables needed


-- DROP TABLE IN PROPER ORDER
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `userAccounts`;
DROP TABLE IF EXISTS `userBallot`;
DROP TABLE IF EXISTS `offices`;


CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
    `SSN` VARCHAR(255) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
	`last_name` VARCHAR(255) NOT NULL,
    `DOB` date NOT NULL,
    `party` VARCHAR(255),
    `street` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `zip` INT(11),
    `phone` VARCHAR(255),
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`),
    UNIQUE (`DOB`, `SSN`, `username`, `password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`SSN`, `first_name`, `last_name`, `DOB`, `party`, `street`, `city`, `state`, `zip`, `phone`, `username`, `password`)

VALUES
    ('355-84-5214', 'Sara', 'Smith', '1978-6-2', 'Republican', '956 Jackson St.', 'Miami', 'FL', 60075, '315-288-4574', 'SaraSmith', 'Hola123'),
    ('102-87-4619', 'David', 'Atkins', '1985-6-9', 'Democratic', '2857 Clinton Ave.', 'Corvallis', 'OR', 40075, '415-223-4544', 'DavidAtkins', 'Hello991'),
    ('497-23-6518', 'Lauren', 'Jensen', '1975-7-2', 'Republican', '124 Clark St.', 'Milwaukee', 'WI', 50784, '615-743-4324', 'LaurenJensen', 'Lola548'),
    ('988-74-8527', 'Carlos', 'Carrillo', '1988-3-5', 'Democratic', '9180 Castle Ave.', 'Chicago', 'IL', 89722, '564-269-7956', 'CarlosCarrillo', '0485freedom'),
    ('541-98-4675', 'Donald', 'Sanders', '1990-6-26', 'Republican', '762 Main St.', 'Tucson', 'AZ', 23075, '213-298-4784', 'DonaldSanders', '548Sanders'),
    ('355-65-7426', 'Sasha', 'Simpson', '1984-2-19', 'Democratic', '2247 Madison Ave.', 'Seattle', 'WA', 76075, '465-213-4564', 'SashaSimpson', 'Seattle53'),
    ('788-56-8423', 'Franz', 'Griffin', '1972-7-12', 'Republican', '734 Ralph St.', 'Dallas', 'TX', 98784, '785-773-4984', 'FranzGriffin', 'Patios$%&&'),
    ('266-78-9478', 'Tanner', 'England', '1968-8-6', 'Democratic', '247 Wilson St.', 'Iowa City', 'IA', 50003, '891-263-4716', 'TannerEngland', '&yellow78'),
    ('488-52-9845', 'Katie', 'Thompson', '1989-5-15', 'Republican', '976 Wabash Ave.', 'Urbana', 'IL', 63722, '984-239-7236', 'KatieThompson', '7809%66'),
    ('854-96-3215', 'Thomas', 'Roggers', '1991-9-16', 'Democratic', '243 Central St.', 'Lawrence', 'KS', 89003, '341-223-3416', 'ThomasRoggers','Bike/89');


CREATE TABLE `userAccounts` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `SSN` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `userAccounts` (`SSN`, `username`, `password`)

VALUES
    ((SELECT `SSN` FROM `users` WHERE id=1), (SELECT `username` FROM `users` WHERE id=1), (SELECT `password` FROM `users` WHERE id=1)),
    ((SELECT `SSN` FROM `users` WHERE id=2), (SELECT `username` FROM `users` WHERE id=2), (SELECT `password` FROM `users` WHERE id=2)),
    ((SELECT `SSN` FROM `users` WHERE id=3), (SELECT `username` FROM `users` WHERE id=3), (SELECT `password` FROM `users` WHERE id=3)),
    ((SELECT `SSN` FROM `users` WHERE id=4), (SELECT `username` FROM `users` WHERE id=4), (SELECT `password` FROM `users` WHERE id=4)),
    ((SELECT `SSN` FROM `users` WHERE id=5), (SELECT `username` FROM `users` WHERE id=5), (SELECT `password` FROM `users` WHERE id=5)),
    ((SELECT `SSN` FROM `users` WHERE id=6), (SELECT `username` FROM `users` WHERE id=6), (SELECT `password` FROM `users` WHERE id=6)),
    ((SELECT `SSN` FROM `users` WHERE id=7), (SELECT `username` FROM `users` WHERE id=7), (SELECT `password` FROM `users` WHERE id=7)),
    ((SELECT `SSN` FROM `users` WHERE id=8), (SELECT `username` FROM `users` WHERE id=8), (SELECT `password` FROM `users` WHERE id=8)),
    ((SELECT `SSN` FROM `users` WHERE id=9), (SELECT `username` FROM `users` WHERE id=9), (SELECT `password` FROM `users` WHERE id=9)),
    ((SELECT `SSN` FROM `users` WHERE id=10), (SELECT `username` FROM `users` WHERE id=10), (SELECT `password` FROM `users` WHERE id=10));


CREATE TABLE `userBallot` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `oklahoma` VARCHAR(255) NOT NULL,
    `illinois` VARCHAR(255) NOT NULL,
    `wisconsin` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `offices` (
    name VARCHAR(50) NOT NULL UNIQUE PRIMARY KEY,
    tlength VARCHAR(15) NOT NULL,
    tlimit VARCHAR(30),
    duties VARCHAR(500),
    state VARCHAR(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
 
INSERT INTO offices (name, tlength, tlimit, duties, state) VALUES
    ('Alabama State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'AL'),
    ('Alaska State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'AK'),
    ('Arizona State Senator', '2', '8', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'AZ'),
    ('Arkansas State Senator', '2-4-4', '16 cumulative total', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'AR'),
    ('California State Senator', '4', '12 cumulative total', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'CA'),
    ('Colorado State Senator', '4', '8 years', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'CO'),
    ('Connecticut State Senator', '2', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'CT'),
    ('Delaware State Senator', '2-4-4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'DE'),
    ('Florida State Senator', '2-4-4', '8', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'FL'),
    ('Georgia State Senator', '2', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'GA'),
    ('Hawaii State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'HI'),
    ('Idaho State Senator', '2', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'ID'),
    ('Illinois State Senator', '2-4-4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'IL'),
    ('Indiana State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'IN'),
    ('Iowa State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'IA'),
    ('Kansas State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'KS'),
    ('Kentucky State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'KY'),
    ('Louisiana State Senator', '4', '12', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'LA'),
    ('Maine State Senator', '2', '8', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'ME'),
    ('Maryland State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'MD'),
    ('Massachusetts State Senator', '2', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'MA'),
    ('Michigan State Senator', '4', '8', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'MI'),
    ('Minnesota State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'MN'),
    ('Mississippi State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'MS'),
    ('Missouri State Senator', '4', '8', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'MO'),
    ('Montana State Senator', '4', '8', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'MT'),
    ('Nebraska State Senator', '4', '8', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'NE'),
    ('Nevada State Senator', '4', '12', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'NV'),
    ('New Hampshire State Senator', '2', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'NH'),
    ('New Jersey State Senator', '2-4-4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'NJ'),
    ('New Mexico State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'NM'),
    ('New York State Senator', '2', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'NY'),
    ('North Carolina State Senator', '2', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'NC'),
    ('North Dakota State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'ND'),
    ('Ohio State Senator', '4', '8', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'OH'),
    ('Oklahoma State Senator', '4', '12 cumulative total', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'OK'),
    ('Oregon State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'OR'),
    ('Pennsylvania State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'PA'),
    ('Rhode Island State Senator', '2', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'RI'),
    ('South Carolina State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'SC'),
    ('South Dakota State Senator', '2', '8', 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'SD'),
    ('Tennessee State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'TN'),
    ('Texas State Senator', '2-4-4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'TX'),
    ('Utah State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'UT'),
    ('Vermont State Senator', '2', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'VT'),
    ('Virginia State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'VA'),
    ('Washington State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'WA'),
    ('West Virginia State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'WV'),
    ('Wisconsin State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'WI'),
    ('Wyoming State Senator', '4', NULL, 'Represent constituents%Attend to constituents%Propose legislation%Vote on legislation', 'WY'),
    ('Alabama State Representative', '4', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'AL'),
    ('Alaska State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'AK'),
    ('Arizona State Representative', '2', '8', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'AZ'),
    ('Arkansas State Representative', '2', '16 cumulative total', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'AR'),
    ('California State Representative', '2', '12 cumulative total', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'CA'),
    ('Colorado State Representative', '2', '8 years', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'CO'),
    ('Connecticut State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'CT'),
    ('Delaware State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'DE'),
    ('Florida State Representative', '2', '8', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'FL'),
    ('Georgia State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'GA'),
    ('Hawaii State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'HI'),
    ('Idaho State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'ID'),
    ('Illinois State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'IL'),
    ('Indiana State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'IN'),
    ('Iowa State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'IA'),
    ('Kansas State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'KS'),
    ('Kentucky State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'KY'),
    ('Louisiana State Representative', '4', '12', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'LA'),
    ('Maine State Representative', '2', '8', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'ME'),
    ('Maryland State Representative', '4', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'MD'),
    ('Massachusetts State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'MA'),
    ('Michigan State Representative', '2', '6', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'MI'),
    ('Minnesota State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'MN'),
    ('Mississippi State Representative', '4', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'MS'),
    ('Missouri State Representative', '2', '8', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'MO'),
    ('Montana State Representative', '2', '8', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'MT'),
    ('Nebraska State Representative', '2', '8', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'NE'),
    ('Nevada State Representative', '2', '12', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'NV'),
    ('New Hampshire State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'NH'),
    ('New Jersey State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'NJ'),
    ('New Mexico State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'NM'),
    ('New York State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'NY'),
    ('North Carolina State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'NC'),
    ('North Dakota State Representative', '4', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'ND'),
    ('Ohio State Representative', '2', '8', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'OH'),
    ('Oklahoma State Representative', '2', '12 cumulative total', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'OK'),
    ('Oregon State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'OR'),
    ('Pennsylvania State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'PA'),
    ('Rhode Island State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'RI'),
    ('South Carolina State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'SC'),
    ('South Dakota State Representative', '2', '8', 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'SD'),
    ('Tennessee State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'TN'),
    ('Texas State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'TX'),
    ('Utah State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'UT'),
    ('Vermont State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'VT'),
    ('Virginia State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'VA'),
    ('Washington State Representative', '4', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'WA'),
    ('West Virginia State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'WV'),
    ('Wisconsin State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'WI'),
    ('Wyoming State Representative', '2', NULL, 'Enact laws%Listen to constituents%Amend the State Constitution%Oversight of State programs%Select represenative leadership%Create the State''s budget', 'WY'),
    ('U.S. Senator', '6', NULL, 'Propose and vote on bills%Conduct impeachment trials%Approval of presidential appointees to the executive or judicial branches%Approve (by 2/3 vote) treaties made by executive branch%Expel or censure other U.S. Senators%Delay or block legislation(filibuster)%Conduct investigations of the executive branch%Combined with House of Representatives, can declare war', 'X'),
    ('U.S. Representative', '2', NULL, 'Propose and vote on bills%Initiate impeachment proceedings of federal officials%Elect the President in the case of a tie in electoral college%Combined with U.S. Senate, can override a presidential veto of legislation with 2/3 vote%Approves ratification of trade agreements%Combined with U.S. Senate, can declare war', 'X'),
    ('President', '4', '8', 'Symbolic leader of the United States of America%Grants pardons and reprieves%Negotiates with other countries%Signs or vetoes legislation which has been passed by both U.S. Senate and House of Representatives%Proposes legislation to the U.S. Senate or House of Representatives%Head of the armed forces%Appoints individuals to federal and judicial positions%Head of enforcement of laws', 'F'),
    ('Vice President', '4', NULL, 'Will become President in event anything happens to the President which renders them unable to continue serving in office%Presiding officer in the U.S. Senate%Tiebreaking vote in the U.S. Senate%Ceremonial assistant to the President', 'F');












