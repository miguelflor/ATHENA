import mysql.connector
try:
    con = mysql.connector.connect(
        host="athenaconfiguration.hopto.org",
        user="remote",
        password="L5SUv27*#_",
        database="athena"
    )

    CONN = con.cursor()



    ID_USER = 1
except:
    print("you are offline")

