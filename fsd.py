import json 

with open("json/dictionary.json") as dictt:
    dictionary = json.load(dictt)
while True:
    word = input("pls what word do u want a defeniction:--->")
    try:
        deff = dictionary[word]
    except:
        deff  = "i don't know"
    print(deff)
