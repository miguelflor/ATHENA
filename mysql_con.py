import mysql.connector
error = 0
try:
    con = mysql.connector.connect(
        host="athenaconf.hopto.org",
        user="remote",
        password="L5SUv27*#_",
        database="athena"
    )

    CONN = con.cursor()

    print(con)

    ID_USER = 1
except:
    error=1
    print("you are offline")

