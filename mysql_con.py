import mysql.connector

con = mysql.connector.connect(
    host="athenaconfiguration.hopto.org",
    user="remote",
    password="L5SUv27*#_",
    database="athena"
)

CONN = con.cursor()
q = "SELECT id FROM users WHERE name = 'user1'"
CONN.execute(q)
r = CONN.fetchall()

ID_USER = r[0][0]

