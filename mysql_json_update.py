import mysql_con
import mysql.connector
import json

id_user = mysql_con.ID_USER

def act():
    #alamrs
    q = "SELECT * FROM Alarms WHERE id_user = %s" % (str(id_user))
    mysql_con.CONN.execute(q)
    data = mysql_con.CONN.fetchall()


    #contacts
    contacts_dict = {
        "contacts":[

        ]
            
        
    }
    q  = "SELECT name,number FROM Contacts WHERE id_user = %s" % (str(id_user))
    mysql_con.CONN.execute(q)
    data = mysql_con.CONN.fetchall()

    for i in data:
        d = {
            "name":i[0],
            "number":i[1]
        }
        contacts_dict["contacts"] = contacts_dict["contacts"] + [d]

    with open("json/contacts.json" , "w") as new_json:
        json.dump(contacts_dict,new_json,indent=4)

    #update json



    with open("json/intents.json","r") as intents_json:
        intents_json = json.load(intents_json)
    real_intents_json = intents_json["intents"]

    o = 0

    for i in real_intents_json[:]:
        i["patterns"] = []
        i["resp"] = []
        real_intents_json[o] = i
        o +=1

    intents_json["intents"] = real_intents_json


    q = "SELECT intents.tag,patterns_intent.pattern FROM intents INNER JOIN patterns_intent ON intents.id = patterns_intent.id_intent WHERE intents.id_user = %s" %(id_user)

    mysql_con.CONN.execute(q)
    data = mysql_con.CONN.fetchall()


    o=0
    for g in real_intents_json[:]:
        tag = g["tag"]

        for l in data[:]:
            if l[0] == tag:
                real_intents_json[o]["patterns"] = real_intents_json[o]["patterns"] + [l[1]]
        
        o+=1


   
    intents_json["intents"] = real_intents_json

    #resp array
    q = "SELECT intents.tag,resp_intent.resp FROM intents INNER JOIN resp_intent ON intents.id = resp_intent.id_intent WHERE intents.id_user = %s"%(id_user)

    mysql_con.CONN.execute(q)
    data = mysql_con.CONN.fetchall()

    o = 0
    for g in real_intents_json[:]:
        tag = g["tag"]

        for l in data[:]:
            if l[0] == tag:
                real_intents_json[o]["resp"]  = real_intents_json[o]["resp"] + [l[1]]


        o+=1

    q = "SELECT tag,priority,question FROM intents WHERE id_user = %s"%(id_user)

    mysql_con.CONN.execute(q)
    data = mysql_con.CONN.fetchall()

    o = 0
    for g in real_intents_json[:]:
        tag = g["tag"]

        for l in data[:]:
            if l[0] == tag:
                real_intents_json[o]["priority"] = l[1]
                real_intents_json[o]["priority"] = l[2]

    intents_json["intents"] = real_intents_json

    with open("json/intents.json","w",encoding="utf-8") as i:
        json.dump(intents_json,i,indent=4)

