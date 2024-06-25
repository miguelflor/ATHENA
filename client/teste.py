import mysql_json_update
import threading
import time
import mysql_con

q = f"SELECT real_name FROM users WHERE id = {mysql_con.ID_USER}"
mysql_con.CONN.execute(q)
NAME  = mysql_con.CONN.fetchall()[0][0]
print(NAME)
    