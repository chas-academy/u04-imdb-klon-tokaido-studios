# Deployment
We used Render for hosting the Laravel application and Aiven for database management, specifically MySQL.
Render offers easy deployment with continuous integration that will deploy a new version after the main branch is updated, while Aiven provides a reliable, 
scalable managed database solution. The database needed to be configured manually in Render rather than from the .env so that it will take the database connection from Aiven, 
this is handled in the .dockerignore file. This is done by entering your own values in the Environment Variables to match those of the Aiven database created. The rest of the set up
for Render is set up in the Dockerfile as well as the 00-laravel-deploy.sh file in scripts. 
[Deployment](https://u04-imdb-klon-tokaido-studios.onrender.com)

## Guide to Deployment 
## if no deployment exists
### Step 1 
1. Log into Render
2. Start a new web service
3. Select to connect to a public git repository and insert the url of our git repository
4. Ensure the language being used is Docker from the drop down menu
5. Use branch main and launch the region from Frankfurt
6. Use the free option
7. Next go to Aiven to get the information for the Environmental Variables

### Step 2
1. Log into Aiven
2. Start a new MySQL database and allow it to set up till it is running.
3. Return to Render and fill in the following information with the approriate info offer by Aiven and the APP_KEY is gotten from the .env file in the project itself
   <br><img width="331" alt="image" src="https://github.com/user-attachments/assets/d9ab043c-cd15-409a-8c0f-a519816fe3a1" /></br>
4. The info is all provided within the connection information of Aiven
   <br><img width="341" alt="image" src="https://github.com/user-attachments/assets/bc8461c2-d358-4f57-a10e-ccf9aca20add" /></br>


### Step 3
1. Now you may run the Deploy Web Service in Render and allow it to go live
2. Once it is live you may access the page by the link prived under the project name
3. To access the database you may go to the local port in which your database was usually handled
 - check your docker-compose file to see which one it is - probably localhost:8080 on this project
5. Then you may enter the Aiven database by filling in the info provided by Aiven
6. The server will be the aiven information as follows Host:Port - so you join the host info with a cologn and then the port directly after it
7. The username and password will be as normal from the Aiven information

## Project is deployed 
1. You may enter render and chose from the dropdown list if you would like to execute a specific iteration of the main folder
   <br><img width="317" alt="image" src="https://github.com/user-attachments/assets/231aac27-8a53-4230-9ae0-b0667adbd61b" /></br>
3. The project will auto redeploy with every commit to the main file so this is self adjusting

### Common problems 
1. If the database does not seed you must ensure that the php artsian seeding request in the script is --force so that it will complete during the deployment rendering
   - otherwise it will time out
2. Problems may only be addressed in Render from the 00-laravel-deploy.sh file in scripts as there is no method of scripting directly into Render. 
