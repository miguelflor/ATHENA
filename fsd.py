import json 



with open("json/dictionary.json") as dictt:
    dictionary = json.load(dictt)

word = input("what is the word that  seak defeniction")
# trust(dictionary)
#trust(dictionary)
try:
    print(dictionary[word])
except:
    print("asndaçsd")






   
#ver se as palavras das defenições do dicionário estão no próprio dicionário se não irá guradalas num array e dar print;