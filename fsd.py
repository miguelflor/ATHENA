import json 
import os

from cv2 import BackgroundSubtractor

def clearConsole():
    command = 'clear'
    if os.name in ('nt', 'dos'):  # If Machine is running on Windows, use cls
        command = 'cls'
    os.system(command)
    


with open("json/dictionary.json") as dictt:
    dictionary = json.load(dictt)

i = 0
for x in dictionary:
    i+=1

print(i)

barra = "[                    ]"

#cada barra corresponde a 5%
e = 0
p = 1
clearConsole()
print(str(barra))
for x in dictionary:
    e+=1
    
    if e == 5110:
        clearConsole()
        barra = list(barra)
        barra[p] ="|"
        barra  ="".join(barra)

        p+=1
        print(str(barra))

        e = 0
    defi = dictionary[x]
    new_defi = ""
   

    for y in defi:
        if y != "1.":
            new_defi = new_defi +y
            if "." in list(y):
                new_defi = new_defi +y
                break
        

print(dictionary)
    









   
#ver se as palavras das defenições do dicionário estão no próprio dicionário se não irá guradalas num array e dar print;