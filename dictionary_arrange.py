import json 
import os

from cv2 import BackgroundSubtractor

def clearConsole():
    command = 'clear'
    if os.name in ('nt', 'dos'):  # If Machine is running on Windows, use cls
        command = 'cls'
    os.system(command)
    


with open("json/dictionary.json", encoding='utf-8') as dictt:
    dictionary = json.load(dictt)

i = 0
rase = False
print("start")
for x in dictionary:
    deff1 = dictionary[x].split(" ")
    original = dictionary[x]
    
    z = 0
    for v in deff1[:]:
        lenght = len(v)
      
        if lenght != 0:
            if "[" in v and "]" in v:
                if "." ==  v[lenght-1]:
                    print(str(z)+"->>>"+str(len(deff1)))
                    deff1[z] = "."
                else:
                    deff1.remove(v)  
            elif "[" in v:
                rase = True
            elif "]"  in v:
                rase = False
                if "." ==  v[lenght-1]:
                    deff1[z] = "."
                else:
                    deff1.remove(v)
            
            if rase == True:
                
                deff1.remove(v)
                    
            
                

        
        
        z+=1
    deff_str = " "
    deff_str = deff_str.join(deff1)
    dictionary[x] = deff_str
   
    

        
        


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
        barra[p] = "|"
        barra  ="".join(barra)

        p+=1
        print(str(barra))

        e = 0
    defi = dictionary[x]
    new_defi = ""
    defi = defi.split('.')
    if defi[0] != "1":
        new_defi = defi[0]
    else:
        new_defi = defi[1]
    dictionary[x] = new_defi

with open("json/dictionary1.json","w",encoding="utf-8") as dictt:
    dictt.write(json.dumps(dictionary,indent=4,ensure_ascii=False))

print('Finish')   
print(dictionary["cyathophylloid"])
      
        

    









   
#ver se as palavras das defenições do dicionário estão no próprio dicionário se não irá guradalas num array e dar print;