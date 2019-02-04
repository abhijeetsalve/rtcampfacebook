Hello sir i'm completed facebook album assignment and i'm from viit college pune.
 User can See Album Photos 
* User can Download Album Photos in zip file to Their Device
1. Install XAMPP software from https://www.apachefriends.org/download.html on System .
2. Put Project files in path -> C:\Xampp\htdocs\rtcamp
3. Start all Services of XAMPP.
4. Go to your web browser and type localhost/rtcamp you get a demo.
5. (www.localhost/rtcamp )

Library Used : Facebook, Google, Twitter Bootstrap, Superslides (https://github.com/nicinabox/superslides)

Album Slideshow
•	User visits your script page
•	User will be asked to connect using his FB account
•	Once authenticated, your script will pull his album list from FB
•	User will click on an album name/thumbnail
•	A jQuery-slideshow will start showing photos in that album (in full-screen mode)

 Download Album

-	Beside every album icon (step #4 in part-1), add a new icon/button saying “Download This Album”
-	When the user clicks on that button, your script will fetch all photos in that album behind the scene and zip them inside a folder on server.
-	You may start a “progress bar” as soon as user-click download button as download process may take time.
-	Once zip building on server completes, show user link to zip file.
-	When user clicks zip-file link, it will download zip folder without opening any new page.
-	Beside album names, add a checkbox. Then add a common “Download Selected Album” button. This button will download selected albums into a common zip that will contain one folder for each album. Folder-name will be album-name.
-	Also, add a big “Download All” button. This button will download all albums in a zip, similar to above.



 Backup albums to Google Drive

 	Provide the user with an option to move albums to a Google Drive.
 	The Google Drive will contain a master folder whose name will be of the format facebook__albums where username will be the Facebook username of the user.
 	The user’s Facebook albums will be backed up in this master folder. Photos from each album will go inside their respective folders. Folder names will be the same as the Facebook album names.
 	To improve the user experience, include the three following buttons:
 	“Move” button- This button will appear under each album on your website. When clicked, the corresponding album only will be moved to Google Drive
 	“Move Selected”- This button will work along with a checkbox system. The user can select a few albums via checkboxes and click on this button. Only the selected albums will be moved to Google Drive
 	“Move All”- This button will immediately move all user albums to Google Drive within their respective folders.
 	Make sure that the user is asked to connect to their Google account only once, no matter how many times they choose to move data.
