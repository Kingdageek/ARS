# Simple Ad Rotation System
---

ARS is a basic fair Advertisement Rotation System. 
It was basically written for learning purposes not exactly with the best coding standards in mind.
There's like literally no styling for the display page too but the system works.

#### To test the system:

Clone the repo or download it. Create an `ars` db and run the SQL code in the *adverts.sql* file on it to get the `adverts` table. Create a *banners* directory, put your banner images in it and Update the `image` column in the `adverts` table with the paths to your banner images. Also, update the `expires` column with a future timestamp (Use the php [time](http://php.net/manual/en/function.time.php) function to get the current timestamp). You could also update the other columns according to preference.