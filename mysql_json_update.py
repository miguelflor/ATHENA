import mysql_con
import mysql.connector
import json

id_user = mysql_con.ID_USER


#alarms
# q = "SELECT * FROM Alarms WHERE id_user = %s" % (str(id_user))
# mysql_con.CONN.execute(q)
# data = mysql_con.CONN.fetchall()


#contacts
contacts_dict = {
    "contacts":{
        
    }
}
q  = "SELECT * FROM Contacts WHERE id_user = %s" % (str(id_user))
mysql_con.CONN.execute(q)
data = mysql_con.CONN.fetchall()

for i in data:
