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