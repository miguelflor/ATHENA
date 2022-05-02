import mysql.connector
import mysql_con
import json


with open("json/contacts.json", "r", encoding='utf8') as data:
    contacts = json.load(data)

contacts = contacts["contacts"]

for x in contacts:
    name = x["name"]
    number = x["number"]
    q = "INSERT INTO Contacts (id_user,name,number) VALUES (%s,%s,%s)"
    val = (mysql_con.ID_USER,name,number)
    mysql_con.CONN.execute(q,val)
    mysql_con.con.commit()

with open("json/intents.json","r",encoding='utf8') as data:
    intents = json.load(data)

intents = intents["intents"]

for i in intents:
    tag = i["tag"]
    patterns = i["patterns"]
    resps = i["resp"]
    priority = i["priority"]
    question = i["question"]
    if question == False:
        question = 0
    else:
        question = 1
    q = "INSERT INTO intents (id_user,tag,priority,question,delete_i) VALUES (%s,%s,%s,%s,%s)"
    val = (mysql_con.ID_USER,tag,priority,question,0)
    mysql_con.CONN.execute(q,val)
    mysql_con.con.commit()

    q = "SELECT LAST_INSERT_ID()"
    mysql_con.CONN.execute(q)
    r = mysql_con.CONN.fetchall()

    inserted_id = r[0][0]

    for pattern in patterns:
        q = "INSERT INTO patterns_intent (id_intent,pattern) VALUES (%s,%s)"
        val = (inserted_id,pattern)
        mysql_con.CONN.execute(q,val)
        mysql_con.con.commit()
    
    for resp in resps:
        q = "INSERT INTO resp_intent (id_intent,resp) VALUES (%s,%s)"
        val = (inserted_id,resp)
        mysql_con.CONN.execute(q,val)
        mysql_con.con.commit()


with open("json/delete_temes.json","r",encoding='utf8') as data:
    intents = json.load(data)

intents = intents["intents"]

for i in intents:
    tag = i["tag"]
    patterns = i["patterns"]
    resps = i["resp"]
    priority = i["priority"]
    question = i["question"]
    if question == False:
        question = 0
    else:
        question = 1
    q = "INSERT INTO intents (id_user,tag,priority,question,delete_i) VALUES (%s,%s,%s,%s,%s)"
    val = (mysql_con.ID_USER,tag,priority,question,1)
    mysql_con.CONN.execute(q,val)
    mysql_con.con.commit()

    q = "SELECT LAST_INSERT_ID()"
    mysql_con.CONN.execute(q)
    r = mysql_con.CONN.fetchall()

    inserted_id = r[0][0]

    for pattern in patterns:
        q = "INSERT INTO patterns_intent (id_intent,pattern) VALUES (%s,%s)"
        val = (inserted_id,pattern)
        mysql_con.CONN.execute(q,val)
        mysql_con.con.commit()
    
    for resp in resps:
        q = "INSERT INTO resp_intent (id_intent,resp) VALUES (%s,%s)"
        val = (inserted_id,resp)
        mysql_con.CONN.execute(q,val)
        mysql_con.con.commit()






