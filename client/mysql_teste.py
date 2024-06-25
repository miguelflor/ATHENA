import threading
import mysql_con
def i(n):
    q = f"INSERT INTO Notes (notas,id_user) values ('{n}',{mysql_con.ID_USER})"
    mysql_con.CONN.execute(q)   
    mysql_con.con.commit()

threading.Thread(target=i, args=("cao",)).start()

