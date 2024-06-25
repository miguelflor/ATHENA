import mysql.connector
import time
time.sleep(1)
error = 0

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



