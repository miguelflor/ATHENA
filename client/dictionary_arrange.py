import json


with open("json/dictionary.json", encoding='utf-8') as data:
    dictionary  = json.load(data)
new_dictionary = dictionary
for y in dictionary:
    deffs = dictionary[y]
    p = 0
    new_deffs = deffs
    for deff in deffs:
        
        new_deff = ""
        pause = False
        for word in deff:
            if word != "\\" and pause == False:
                new_deff = new_deff + word
            else:
                if word == ")":
                    pause = False
                else:
                    pause = True
        
        new_deffs[p] = new_deff
        p+=1
    new_dictionary[y] = new_deffs

with open("json/dictionary1.json","w",encoding="utf-8") as dictt:
    dictt.write(json.dumps(dictionary,indent=4,ensure_ascii=False))


            
            
            


        
            