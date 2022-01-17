import json 

with open("json/dictionary.json") as dictt:
    dictionary = json.load(dictt)
p = 0
words = []
   
#ver se as palavras das defenições do dicionário estão no próprio dicionário se não irá guradalas num array e dar print;