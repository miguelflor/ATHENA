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
    
    for v in deff1[:]:
        lenght = len(v)
        if lenght != 0:
            if "[" in v and "]" in v:
                if "." ==  v[lenght-1]:
                    print(str(deff1.index(v))+"->>>"+str(len(deff1)))
                    deff1[deff1.index(v)] = "."
                else:
                    try:
                        deff1.remove(v)
                    except:
                        pass
                    
            elif "[" in v:
                rase = True
            elif "]"  in v:
                rase = False
                if "." ==  v[lenght-1]:
                    deff1[deff1.index(v)] = "."
                else:
                    print(v)
                    print(deff1.index(v))
                    deff1.remove(v)
            
            if rase == True:
                try:
                    deff1.remove(v)
                except:
                    pass
                    
        
    deff_str = " "
    deff_str = deff_str.join(deff1)
    dictionary[x] = deff_str


    i+=1

#parentises agr

for x in dictionary:
    deff1 = dictionary[x].split(" ")
    original = dictionary[x]
    
    for v in deff1[:]:
        lenght = len(v)
        if lenght != 0:
            if "(" in v and ")" in v:
                if "." ==  v[lenght-1]:
                    print(str(deff1.index(v))+"->>>"+str(len(deff1)))
                    deff1[deff1.index(v)] = "."
                else:
                    try:
                        deff1.remove(v)
                    except:
                        pass
                    
            elif "(" in v:
                rase = True
            elif ")"  in v:
                rase = False
                if "." ==  v[lenght-1]:
                    deff1[deff1.index(v)] = "."
                else:
                    print(v)
                    print(deff1.index(v))
                    deff1.remove(v)
            
            if rase == True:
                try:
                    deff1.remove(v)
                except:
                    pass
                    
        
    deff_str = " "
    deff_str = deff_str.join(deff1)
    dictionary[x] = deff_str


    i+=1



for v in dictionary:
    deff1 = dictionary[x].split(" ")
    original = dictionary[x]

    for q in deff1[:]:
        if ("imp." in q) or ("obs." in q) or ("p." in q) or ("n." in q) or ("i." in q) or ("v." in q) or ("n." in q) or ("a." in q) or("pl." in q):
            deff1.remove(q)

#primeira frase 
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