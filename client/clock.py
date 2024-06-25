
import datetime
import json
from playsound import *
import mysql_con
import time
import os
def desp():
   
        while True:
            time.sleep(1)
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
                        os.system("play generic_alarm.mp3")
                        q= f"DELETE FROM Alarms WHERE alarme='{h}:{m}' and id_user={mysql_con.ID_USER}"
                        mysql_con.CONN.execute(q)
                        mysql_con.con.commit()
                        time.sleep(3)
	                # json_data["alarms"].remove(json_data["alarms"][i])
	                # with open("json/larms.json", "w",encoding="utf-8") as data:
	                #     json.dump(json_data, data, indent=4)
                i += 1
	   
    
desp()
