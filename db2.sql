-- Disable foreign keys (MySQL doesn't have a direct equivalent to PRAGMA foreign_keys=OFF)
SET FOREIGN_KEY_CHECKS = 0;

-- Start a transaction
START TRANSACTION;

-- Create the 'user' table
CREATE TABLE `user` (
  `user_id` INT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL
);

-- Insert data into the 'user' table
INSERT INTO `user` VALUES(1, 'Karel');
INSERT INTO `user` VALUES(3, 'Fred');
INSERT INTO `user` VALUES(4, 'Bonnie');
INSERT INTO `user` VALUES(5, 'Claudia');
INSERT INTO `user` VALUES(7, 'Barend');
INSERT INTO `user` VALUES(8, 'Henk');
INSERT INTO `user` VALUES(9, 'Harry');
INSERT INTO `user` VALUES(10, 'Jantje');

-- Create the 'blog_posts' table
CREATE TABLE `blog_posts` (
    `blog_id` INT PRIMARY KEY,
    `user_id` INT,
    `post` TEXT NOT NULL
);

-- Insert data into the 'blog_posts' table
INSERT INTO `blog_posts` VALUES(1, 3, REPLACE('quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto', '\n', '\n'));
INSERT INTO `blog_posts` VALUES(2, 1, REPLACE('est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla', '\n', '\n'));
INSERT INTO `blog_posts` VALUES(3, 8, REPLACE('et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut', '\n', '\n'));
INSERT INTO `blog_posts` VALUES(4, 5, REPLACE('repudiandae veniam quaerat sunt sed\nalias aut fugiat sit autem sed est\nvoluptatem omnis possimus esse voluptatibus quis\nest aut tenetur dolor neque', '\n', '\n'));
INSERT INTO `blog_posts` VALUES(5, 8, REPLACE('consectetur animi nesciunt iure dolore\nenim quia ad\nveniam autem ut quam aut nobis\net est aut quod aut provident voluptas autem voluptas', '\n', '\n'));
INSERT INTO `blog_posts` VALUES(6, 10, REPLACE('itaque id aut magnam\npraesentium quia et ea odit et ea voluptas et\nsapiente quia nihil amet occaecati quia id voluptatem\nincidunt ea est distinctio odio', '\n', '\n'));
INSERT INTO `blog_posts` VALUES(7, 8, REPLACE('fuga et accusamus dolorum perferendis illo voluptas\nnon doloremque neque facere\nad qui dolorum molestiae beatae\nsed aut voluptas totam sit illum', '\n', '\n'));
INSERT INTO `blog_posts` VALUES(8, 9, REPLACE('qui consequuntur ducimus possimus quisquam amet similique\nsuscipit porro ipsam amet\neos veritatis officiis exercitationem vel fugit aut necessitatibus totam\nomnis rerum consequatur expedita quidem cumque explicabo', '\n', '\n'));
INSERT INTO `blog_posts` VALUES(9, 10, '');
INSERT INTO `blog_posts` VALUES(10, 12, REPLACE('non et quaerat ex quae ad maiores\nmaiores recusandae totam aut blanditiis mollitia quas illo\nut voluptatibus voluptatem\nsimilique nostrum eum', '\n', '\n'));

-- Create the 'likes' table
CREATE TABLE `likes` (
    `id` INT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `blog_id` INT NOT NULL,
    `like` INT NOT NULL
);

-- Insert data into the 'likes' table
INSERT INTO `likes` VALUES(1, 1, 4, 1);
INSERT INTO `likes` VALUES(2, 7, 4, 1);
INSERT INTO `likes` VALUES(3, 8, 6, -1);
INSERT INTO `likes` VALUES(4, 8, 7, 1);
INSERT INTO `likes` VALUES(5, 23, 1, 1);
INSERT INTO `likes` VALUES(6, 3, 37, 1);
INSERT INTO `likes` VALUES(7, 5, 1, 1);
INSERT INTO `likes` VALUES(8, 6, 1, -1);
INSERT INTO `likes` VALUES(9, 8, 5, 1);
INSERT INTO `likes` VALUES(10, 4, 2, 1);
INSERT INTO `likes` VALUES(11, 8, 10, 1);

-- Commit the transaction
COMMIT;

-- Enable foreign keys again
SET FOREIGN_KEY_CHECKS = 1;
