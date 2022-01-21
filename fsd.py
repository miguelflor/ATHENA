import json 

def trust(dictionary):
    p = 0
    words = []

    for x in dictionary:
        for y in x:
            for k in dictionary:
                if k == y:
                    if k not in words:
                        words = words + [k]
    
    print(words)
    with open("text.txt", "a") as txt:
        txt.write(str(words))
        txt.close()
                        
def trustt(dictionary):
    for x in dictitonary:
        print(x)



with open("json/dictionary.json") as dictt:
    dictionary = json.load(dictt)

# trust(dictionary)
trustt(dictionary)




   
#ver se as palavras das defenições do dicionário estão no próprio dicionário se não irá guradalas num array e dar print;