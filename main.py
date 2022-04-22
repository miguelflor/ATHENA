from tkinter import NO
import numpy as np
import subprocess
import pyttsx3
import json
import speech_recognition as sr

import wikipedia

import os
import datetime

engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
engine.setProperty('voice', voices[0].id)
engine.setProperty('rate',145)

def response(responses):

    num_resp = len(responses)
    h = 0

    if responses == [""]:
        true_resp = ""
    elif num_resp == 1:
        true_resp = responses[0]
    else:
        rand = np.random.randint(1, num_resp)
        for resp in responses:
            h += 1
            if h == rand:
                true_resp = resp
                break

    return true_resp

def recognition(spoken,data,intent_specify=["all"]):
    

    data = data["intents"]

    i = 0
    l = 0
    b = 0
    spoken_comp = ""
    spoken_true = spoken
    spoken = spoken.split()
    intent = {
        "position":0,
        "tag": "",
        "resp":"",
        "erro_min":0,
        "priority":0
    }

    if intent_specify[0] != "all":
        new_data = []
        for z in data:
            if z["tag"] in intent_specify:
                new_data = new_data + [z]


    
    

    for x in data:
        patterns = x['patterns']
        priority = x['priority']
        question = x['question']

        array_error_intent ={
            "position": [],
            "error": []
           

        }

        for pattern in patterns:

            true_pattern = pattern
            num_words = len(pattern.split())
            #se a expressaõ falada pelo utilizadopr for mais pequena do que a expressão da database intents comparada com ele vai haver uma troca
            
            if num_words > len(spoken):
                    spoken = pattern.split()
                    pattern = spoken_true
            else:
                spoken = spoken_true.split()
                pattern = true_pattern
            rep = len(spoken) - (num_words - 1)

            array_error = {
                "position":[],
                "error":[]
            }

            while i < rep:

                while l < num_words:

                     
                     if l == 0:
                         spoken_comp = spoken[i+l]
                     else:
                        try:
                            spoken_comp = spoken_comp + " " + spoken[i+l]
                        except:
                            print("l="+str(l)+"\n")
                            print("i="+str(i)+"\n")


                     l += 1


                num_algo = levenshtein(spoken_comp,pattern)

                array_error["position"] = array_error["position"] + [l+i]
                array_error["error"] = array_error["error"] + [num_algo/len(pattern)]


                spoken_comp = ""

                l = 0
                i += 1


            print(array_error)

            e = 0

            for p in array_error["error"]:

                if e == 0:
                    min_error = p
                    position = array_error["position"][e]
                else:
                    if p < min_error:
                        min_error = p
                        position = array_error["position"][e]

                e += 1


            array_error_intent["position"] = array_error_intent["position"] + [position]
            array_error_intent["error"] = array_error_intent["error"] + [min_error]

            print(pattern)
            print(array_error_intent)

            i = 0

        e = 0

        for m in array_error_intent["error"]:

            if e == 0:
                min_error_intent = m
                position_intent = array_error_intent["position"][e]
            else:
                if m < min_error_intent:
                    min_error_intent = m
                    position_intent = array_error_intent["position"][e]

            e += 1
        if question == True and position_intent == len(spoken):
            min_error_intent = min_error_intent + 0.7

        if b == 0:

            intent["position"] = position_intent
            intent["tag"] = x["tag"]
            intent["resp"] = x["resp"]
            intent["erro_min"] = min_error_intent
            intent["priority"] = priority
        else:
            if min_error_intent < intent["erro_min"] :
                intent["erro_min"] = min_error_intent
                intent["resp"] = x["resp"]
                intent["tag"] = x["tag"]
                intent["position"] = position_intent
                intent["priority"] = priority
            elif min_error_intent == intent["erro_min"]:
                if priority > intent["priority"]:
                    intent["erro_min"] = min_error_intent
                    intent["resp"] = x["resp"]
                    intent["tag"] = x["tag"]
                    intent["position"] = position_intent
                    intent["priority"] = priority


                
        print("-")
        b += 1

    return intent

def levenshtein(str2,str1):
    m = np.array([[]])
    n = np.array([])


    i = 0

    while i != (len(str1)+1):
        n = np.append(n, i)
        i += 1
    n = np.array([n])

    i = 0

    while i != (len(str2)+1):

        if i == 0:
            m = np.array(n)

        else:
           m =  np.concatenate((m,n), axis= 0)
        i += 1

    i = 0

    while i != len(m):
        m[i,0] = i
        i += 1

    i = 0
    l = 0
    o = 0
    k = 0
    while i != (len(m)-1):
        while l != (len(m[0])-1):

            small = min(m[i,l] , m[i,l+1] , m[i+1,l])

            if str1[l] == str1[l-1] and l != i and str1[l] == str2[i]:
                o = 1
            elif str2[i] == str2[i-1] and l != i and str1[l] == str2[i]:
                o = 1

            if str1[l] == str2[i] and o != 1:
                m[i+1,l+1] = small
            else:
                m[i+1,l+1] = small + 1


            l +=1
            o = 0
        i += 1
        l =0


    return(m[len(m)-1,len(m[0])-1])

def athena_speak(speech):
    print(speech+"\n")
    engine.say(speech)
    engine.runAndWait()

def hear():
    
    r=sr.Recognizer()

    print(sr.Microphone())
    with sr.Microphone() as source:
        print("Listening...")
        r.adjust_for_ambient_noise(source, duration=4)
        audio=r.listen(source)

        try:
            heard=r.recognize_google(audio,language='en-in')
            print(f"user said:{heard}\n")
            heard = heard.lower()
        except Exception as e:
            #athena_speak("say that again please!")
            return "None"

        return  heard
        # print("thinking..")
        # athena_speak("thinking..")
        
        # heard=input("Listenning...\n")
        # return heard

def ordinal( n ):

    suffix = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th']

    if n < 0:
        n *= -1

    n = int(n)

    if n % 100 in (11,12,13):
        s = 'th'
    else:
        s = suffix[n % 10]

    return str(n) + s



if __name__ == '__main__' :


        
        while True:

            heard = hear()
            if heard == 0:
                continue
                                                                                                


            if "athena" in heard and len(heard)>1:

                if len(heard) != 1:     
                    with open("json\intents.json", "r") as json_file:
                          data_intents = json.load(json_file)   
                    intent = recognition(heard,data_intents)
                    position = intent["position"] #não absoluta ou seja em [a,b,c,d] a posição de c é 3
                    if intent["erro_min"] <= 0.45:
                        tag = intent["tag"]
                        resp = intent["resp"]
                    else:
                        tag = "none"
                else:
                    tag = "none"
                
                print(tag)
                if tag == "goodbyes":
                    athena_speak(response(resp))
                    break

                elif tag == "greet":

                    h = datetime.datetime.now().hour
                    if h < 12:
                        athena_speak("Good morning!")

                    elif h > 12 and h < 18:
                        athena_speak("Good Afternoon!")

                    else:

                        athena_speak("Good evening!")

                elif tag == "new_note":
                    athena_speak(response(resp))

                    while True:
                        heard = hear()
                        if heard == 0:
                            continue
                        else:
                            note = heard
                            break
                    with open('json\otes.json', 'r') as data:
                        x = json.load(data)

                    x["notes"] = x["notes"] + [note]

                    with open("json\otes.json", "w") as data:
                        json.dump(x, data, indent=4)

                elif tag == "read_note":

                    with open('json\otes.json' , 'r') as data:
                        x = json.load(data)
                    n_notes = 0
                    
                    for notes in x["notes"]:
                        n_notes +=1
                        athena_speak("note number "+str(n_notes)+" : "+ notes)

                elif tag == "new_cont":
                    athena_speak("what is the name of your contact ?")
                    
                    while True:
                        while True:
                            heard = hear()
                            if heard == 0:
                                continue
                            else:
                                name = heard
                                break
                                
                        athena_speak("is your contact "+name+" ?") 
                        
                        while True:
                            heard = hear()
                            if heard == 0:
                                continue
                            else:
                                conf = heard
                                break
                        
                        if "yes" in conf:
                            break
                        else:
                            continue
                                


                    while True:
                        athena_speak("What is the number of your contact?")
                        while True:
                            heard = hear()
                            if heard == 0:
                                continue
                            else:
                                num = heard
                                break

                        athena_speak("is your contact number" + num + " ?")


                        while True:
                            heard = hear()
                            if heard == 0:
                                continue
                            else:
                                conf = heard
                                break

                        if "yes" in conf:
                            break
                        else:
                            continue


                    num_t = ""
                    for n in num:
                        if n != " ":
                            num_t = num_t + n

                    num = num_t

                    contact = {
                        "name": name,
                        "num": num
                        }
                    with open('json\contacts.json', 'r') as data:
                        x = json.load(data)
                        
                    x["contacts"].append(contact)
                    
                    with open('json\contacts.json','w') as data:
                        json.dump(x,data,indent=4)



                    athena_speak("your contact has been created ")

                elif tag == "tell_time":
                    now = datetime.datetime.now()
                    h = str(now.hour)
                    m = str(now.minute)
                    if m == 0:
                        athena_speak("it is " + h + " hours")
                    else:
                        athena_speak("it is " + h + " hours and "+ m +" minutes")


                elif tag == "questions":
                    heard = heard.split()
                    print(heard)
                    print(position)
                    question = ''

                    k = 0

                    for word in heard:
                        k += 1
                        if k > position:
                            
                            question = question + ' ' + word



                    
                    question = repr(str(question))
                    print(question)
                    try:
                        wiki_sum = wikipedia.summary(question)
                        wiki_true = ""
                        for g in wiki_sum:

                            wiki_true = wiki_true + g
                            if g == ".":
                                break

                        print(wiki_true)
                        athena_speak(wiki_true)
                    except:
                        athena_speak("sorry, i don't know")

                elif tag == "call_me":
                    heard = heard.split()

                    i = 0

                    for u in heard:
                        i+=1
                        if (position +1) == i:
                            new_name_user = u
    	            
                    if new_name_user == None:
                        athena_speak("How can i call you?")
                        while True:
                            heard = hear()
                            if heard == 0:
                                continue
                            else:
                                note = heard
                                break
                        
                        if len(heard) != 1:        
                            intent = recognition(heard)
                            position = intent["position"] #não absoluta ou seja em [a,b,c,d] a posição de c é 3
                            if intent["erro_min"] <= 0.45:
                                tag = intent["tag"]
                                resp = intent["resp"]
                            else:
                                tag = "none"
                        else:
                            tag = "none"
                        
                        if tag=="call_me":

                            heard = heard.split()

                            i = 0

                            for u in heard:
                                i+=1
                                if (position +1) == i:
                                    new_name_user = u

                            if (len(heard) == 1) or (len(heard) == 2):
                                new_name_user = " ".join(heard)


                            
                        

                    if new_name_user != None:
                        print("ok, "+new_name_user)
                        athena_speak("ok, "+new_name_user)
                        with open('json\contacts.json', 'r') as data:
                            dict = json.load(data)

                        dict["contacts"][0]["name"] = new_name_user

                        with open('json\contacts.json', 'w') as data:
                            json.dump(dict, data, indent=4)
                    else:
                        athena_speak(response(["I didn't understand how i should call you","I didn't understant how i what should I call you"]))
                    new_name_user = None
                    

                elif tag == "set_alarm":
                    choice = 0
                    array_nums = []
                    for num in heard.split():

                        l = 0
                        try:
                            l = 1
                            int(num)

                        except:
                            l = 0

                        if l == 1:
                            array_nums = array_nums + [num]
                        else:
                            print(num)

                    if len(array_nums)==2:
                        choice = 1
                        h = array_nums[0]
                        m = array_nums[1]

                    elif len(array_nums)==1:
                        choice = 1
                        h = array_nums[0]
                        m = "0"

                    if choice == 1:
                        while True:
                            athena_speak("Do you want to set the alarm for " + str(h) + " and " + str(m) + " minutes?")
                            while True:
                                heard = hear()
                                if heard == 0:
                                    continue
                                else:
                                    break

                            if "yes" in heard:
                                break
                            elif "no" in heard:
                                choice = 0
                                break

                    #confirmação


                    if choice == 1:

                        alarm_dict = {
                            "h": h,
                            "m": m

                        }
                        with open("json\larms.json","r") as data:
                            json_dict = json.load(data)

                        json_dict["alarms"].append(alarm_dict)

                        with open("json\larms.json","w") as data:
                            json.dump(json_dict,data, indent=4)

                        athena_speak("alarm set for "+str(h)+" hours and "+str(m)+" minutes")


                    else:
                        # se n for detetado nenhumas horas na string heard
                        athena_speak("what time do you want to set the alarm?")
                        i = 0
                        while True:

                            choice = 0
                            array_nums = []
                            i+=1

                            if i !=1:
                                athena_speak("can you repeat please")
                            while True:
                                heard = hear()
                                if heard == 0:
                                    continue
                                else:
                                    break



                            for num in heard.split():

                                l = 0
                                try:
                                    l = 1
                                    int(num)

                                except:
                                    l = 0

                                if l == 1:
                                    array_nums = array_nums + [num]
                                else:
                                    print(num)

                            if len(array_nums) == 2:
                                choice = 1
                                h = array_nums[0]
                                m = array_nums[1]

                            elif len(array_nums) == 1:
                                choice = 1
                                h = array_nums[0]
                                m = "0"

                            if choice == 1:
                                while True:
                                    athena_speak("Do you want to set the alarm for "+ str(h)+" and "+str(m)+" minutes?")
                                    while True:
                                        heard = hear()
                                        if heard == 0:
                                            continue
                                        else:
                                            break

                                    if "yes" in heard:
                                        break
                                    elif "no" in heard:
                                        choice = 0

                                        break

                            if choice == 1:
                                alarm_dict = {
                                    "h": h,
                                    "m": m

                                }
                                with open("json\larms.json", "r") as data:
                                    json_dict = json.load(data)

                                json_dict["alarms"].append(alarm_dict)

                                with open("json\larms.json", "w") as data:
                                    json.dump(json_dict, data, indent=4)

                                athena_speak("alarm set for " + str(h) + " hours and " + str(m) + " minutes")
                                break

                elif tag == "defi":
                    heardcopy = heard.split(" ")
                    defenicao = ""
                    copy = []
                    i = 0
                    
                    while True:
                      
                        copy = copy + [heardcopy[position + i]]
                        i+=1
                        if position+1+i > len(heardcopy):
                            break
                    
                    
                    word = " ".join(copy)
                    word.replace(" ","",1)
                    with open("json\dictionary1.json", "r", encoding="utf8")  as data:
                        dictionary = json.load(data)
                    
                    if word in dictionary:
                        deffs = dictionary[word]
                        if len(deffs) == 1:
                            resp = deffs[0]
                        else:
                            knowledge = "there are " + str(len(deffs)) + " definitions."
                            athena_speak(knowledge)
                            ii = 0
                            resp = ""
                            
                            for op in deffs:
                                ii+=1
                                resp = resp + " " + ordinal(ii)+" . "+op
                                #estive aqui provavelmente funciona mas vou dormir não testado  
                    else: 
                            
                        resp = response(["I don't know the deffenition of that word","I don't know the meaning of that word","I don't know","that word is not in my dictionary"])
                    
                    athena_speak(resp)

                elif tag == "delete":
                    #ver o que e que e para dar delete
                    with open("json/delete_temes.json", "r") as json_data:
                        delete_data = json.load(json_data)
                    delete_intent = recognition(heard,delete_data,["number","contacts","notes"])
                    t = ["one","two","three","four","five","six","seven","eight","nine","ten"]
                    heard_split = heard.split(" ")
                    heard_split_place = 0
                    for n in heard_split[:]:

                        if n in t:
                            l = 0
                            for k in t:
                                if n == k:
                                    heard_split[heard_split_place] = k
                        heard_split_place += 1
                    

                    #json delete_temes.json
                    #if 70% de erro
                    


               