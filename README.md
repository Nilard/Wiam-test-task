# Wiam test task

Create a project on Yii2 using `docker compose`.
In the project folder, there should be a `deploy.sh` script that deploys a ready-to-use local website (should work on Linux). The site should be accessible at http://localhost. The admin section should be at http://localhost/admin.

DB - PostgreSQL
Server - nginx

## Main page

The page should display a random image from https://picsum.photos.

The image is obtained from the URL https://picsum.photos/id/1020/600/500, where: 1020 - is the image ID in the URL (for simplification, a static range of values ​​that will be iterated through can be set), and 600 and 500 - are the image dimensions.

Below the image, there should be 2 buttons for making decisions about the image: reject and approve. When any of the buttons are clicked, a corresponding asynchronous request is sent to the server. The decision made should be saved in the database. Then a new image appears and so on in a loop. Images for which a decision has been made are no longer displayed. The logic for fetching the image should be implemented using PHP.

## Admin page

Access to the admin section is granted only when the token=xyz123 parameter is present in the URL (no additional complexity required).

The page displays a table with the following columns:
- Image ID, which is a link to the image;
- Decision - approved or rejected;
- Cancel decision button.

Canceling a decision implies deleting the record from the database for the corresponding image.
