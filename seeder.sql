CREATE TABLE `users`
(
    `usersId`   int(11) NOT NULL AUTO_INCREMENT,
    `usersName` varchar(128) NOT NULL,
    `usersEmail` varchar(128) NOT NULL,
    `usersUid` varchar(128) NOT NULL,
    `usersPwd` varchar(128) NOT NULL,
    `sessionExpiration` TIMESTAMP,
    primary key (`usersId`)
);

CREATE TABLE `posts` 
(
    `postId` int(11) NOT NULL AUTO_INCREMENT,
    `usersId` int(11) NOT NULL,
    `usersUid` varchar(128) NOT NULL, 
    `title` varchar(256) NOT NULL, 
    `descr` varchar(1000) NOT NULL,
    `borough` varchar(128) NOT NULL, 
    `image` varchar(500) NOT NULL, 
    primary key (`postId`),
    foreign key (`usersId`) references users(`usersId`)
);

CREATE TABLE `campaign` 
(
    `campId` int(11) NOT NULL AUTO_INCREMENT,
    `usersId` int(11) NOT NULL,
    `usersUid` varchar(128) NOT NULL, 
    `name` varchar(256) NOT NULL, 
    `descr` varchar(1000) NOT NULL,
    `borough` varchar(128) NOT NULL, 
    `image` varchar(500) NOT NULL, 
    primary key (`campId`),
    foreign key (`usersId`) references users(`usersId`)
);

CREATE TABLE `PostLikes` (
    `likeID` INT AUTO_INCREMENT PRIMARY KEY,
    `postID` int(11) NOT NULL,
    `userID` int(11) NOT NULL,
    `likedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT unique_like UNIQUE (`postID`, `userID`),
    FOREIGN KEY (`postID`) REFERENCES posts(`postId`),
    FOREIGN KEY (`userID`) REFERENCES users(`usersId`)
);

create table Events (
    eventId INT AUTO_INCREMENT PRIMARY KEY,
    orgId int(11) NOT NULL,
    title varchar(256) NOT NULL, 
    descr varchar(1000) NOT NULL,
    eventDate DATE NOT NULL,
    eventTime TIME NOT NULL,
    eventLocation varchar(1000) NOT NULL,
    borough varchar(128),
    primary key(eventId),
    foreign key (orgId) references campaign(campId)
);

INSERT INTO `Events`(`orgId`, `title`, `descr`, `eventDate`, `eventTime`, `eventLocation`, `borough`)
VALUES 
('1', 'Park Cleanup Day', 'Join us for a community park cleanup event! Help us keep our local park clean and green. Gloves and bags will be provided. All ages welcome.', '2024-05-10', '09:00:00', 'Central Park, New York, NY', 'Manhattan'),
('2', 'Riverside Planting Project', 'Volunteer to plant native trees and shrubs along the riverside. Learn about local flora and fauna while helping to improve the ecosystem.', '2024-06-15', '10:00:00', 'Hudson River Park, New York, NY', 'Manhattan'),
('3', 'Climate Change Seminar', 'Join us for an educational seminar on climate change and its impacts on NYC. Hear from experts and learn how you can take action to combat climate change.', '2024-07-20', '18:30:00', 'NYU Kimmel Center, 60 Washington Square South, New York, NY', 'Manhattan'),
('4', 'Community Garden Workshop', 'Learn about urban gardening and sustainable practices at our community garden workshop. Get hands-on experience planting and caring for vegetables and herbs.', '2024-08-05', '11:00:00', 'Brooklyn Botanic Garden, 990 Washington Ave, Brooklyn, NY', 'Brooklyn'),
('5', 'Beach Cleanup Day', 'Help us keep our beaches clean and safe for wildlife. Join our beach cleanup event and make a positive impact on the environment.', '2024-09-08', '08:00:00', 'Rockaway Beach, Queens, NY', 'Queens');
