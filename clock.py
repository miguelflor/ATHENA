import datetime
import json
from playsound import *
import mysql_con

def desp():
   
        while True:
            try:
                now = datetime.datetime.now()
                h = now.hour
                m = now.minute
            
                with open("json/larms.json", "r", encoding="utf-8") as data:
                    json_data = json.load(data)

                alarms = json_data["alarms"]

                i = 0
                for alarm in alarms:
                    if str(h) == alarm["h"] and str(m) == alarm["m"]:
                        print("ASdasdasdasdasd")
                        playsound("generic_alarm.mp3", False)
                        q= f"DELETE FROM Alarms WHERE alarme='{h}:{m}' and id_user={mysql_con.ID_USER}"
                        mysql_con.CONN.execute(q)
                        mysql_con.con.commit()
                        # json_data["alarms"].remove(json_data["alarms"][i])
                        # with open("json/larms.json", "w",encoding="utf-8") as data:
                        #     json.dump(json_data, data, indent=4)
                    i += 1
            except:
                print("clock upsy maybe runniong at the same time as the other threading")
    

