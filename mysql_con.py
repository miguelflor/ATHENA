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
    q = f"SELECT real_name FROM users WHERE id = {ID_USER}"
    CONN.execute(q)
    NAME  = CONN.fetchall()[0][0]

except:
    error=1
    print("you are offline")

