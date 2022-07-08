import mysql_json_update
import threading
import time

class act_tasks:
      
    def __init__(self):
        self._running = True
      
    def terminate(self):
        self._running = False
        
    def run(self):
        while True:
            #mysql_json_update.act()
            if self._running == True:
                print("act")
            time.sleep(1)
           
                
    def positive(self):
        self._running = True
  


c = act_tasks()
t = threading.Thread(target=c.run)
t.start()


while True:
    input_T = input("parar s começar v")
    if input_T == "s":
        c.terminate()
        #t.join() 
    elif input_T == "v":
        c.positive()
  
