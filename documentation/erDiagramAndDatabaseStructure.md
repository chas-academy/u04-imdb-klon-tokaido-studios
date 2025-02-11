# ER Diagram
![image](https://github.com/user-attachments/assets/6b34facd-abb4-41c1-8c6b-0ac6f0a7d399)

## Databasestructure 
This database structure is designed to organize and manage information related to users, games, reviews, and game lists, with an emphasis on relationships between various entities.
Overall, this structure enables efficient organization, retrieval, and association of users, games, reviews, lists, and genres, supporting features such as user-generated content, game categorization, and collaborative lists.

|Table|Relationship|Description|
|-----|------------|-----------|
|Users-> Reviews|1 : N|The relationship between the user and the reviews is one to many, the user may make many reviews but the several reviews belong to one user| 
|Games-> Reviews|1 : N|Games may have multiple different reviews but all those reviews will only belong to that game|
|User-> user_lists|N : M|Many users can have many lists but also many lists have the possibilty to be avaliable to many users - for examples shared lists like a top 250 games etc|
|User_lists-> gameList|N : 1|There can be many lists but they can only link to one unique instance of gameList to connect the games correctly to the list|
|gameList-> Games|1 : N|There is one unique gameList to many games to put the games on the correct individual list|
|genres-> gameGenres|N : 1|Many genres can belong to many games, many genres connect to one specific gameGenre to connect the right genres to the games they are a part of|
|gameGenres-> Games|1 : N|One gameGenres can relate to many games to give the correct genre|
|list-> Games|N : M|Many games can appear on many lists, handle through pivot table gameList|
|genres-> Games|N : M|Many games can have many genres, handled through pivot table gameGenre|
