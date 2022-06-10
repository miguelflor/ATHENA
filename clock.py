import datetime
import json
from playsound import *

def desp():
    while True:
        
        now = datetime.datetime.now()
        h = now.hour
        m = now.minute
        with open("json\larms.json", "r", encoding="utf-8") as data:
            json_data = json.load(data)

        alarms = json_data["alarms"]

        i = 0
        for alarm in alarms:
            if str(h) == alarm["h"] and str(m) == alarm["m"]:

                playsound("generic_alarm.mp3", False)
                json_data["alarms"].remove(json_data["alarms"][i])
                with open("json/larms.json", "w",encoding="utf-8") as data:
                    json.dump(json_data, data, indent=4)
            i += 1



