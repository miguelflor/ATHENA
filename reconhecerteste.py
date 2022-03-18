import numpy as np
import json

from main import athena_speak


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

def recognition(spoken):
    with open("json.json", "r") as json_file:
        data = json.load(json_file)

    data = data["intents"]

    i = 0
    l = 0
    b = 0
    spoken_comp = ""
    spoken = spoken.split()
    intent = {
        "posicion" : False,
        "tag": "",
        "resp":"",
        "levenshtein_min_num":0
    }



    for x in data:
        patterns = x["patterns"]

        array_num_algo_intent = {
            "position" : False,
            "array":[]
        }
        for pattern in patterns:

            num_words = len(pattern.split())

            rep = len(spoken) - (num_words - 1)
            array_num_algo = []

            while i != rep:

                while l != num_words:

                     if l == 0:
                         spoken_comp = spoken[i+l]
                     else:
                        spoken_comp = spoken_comp + " " + spoken[i+l]


                     l += 1




                num_algo = levenshtein(spoken_comp,pattern)
                array_num_algo = array_num_algo + [num_algo]
                spoken_comp = ""

                l = 0
                i += 1

            min_num_algo = min(array_num_algo)
            array_num_algo_intent["array"] = array_num_algo_intent["array"] + [min_num_algo]
            print(pattern)
            print(array_num_algo_intent)

            i = 0

        if b == 0:
            intent["tag"] = x["tag"]
            intent["resp"] = x["resp"]
            intent["levenshtein_min_num"] = min(array_num_algo_intent)
        else:
            if min(array_num_algo_intent["array"]) < intent["levenshtein_min_num"] :

                intent["levenshtein_min_num"] = min(array_num_algo_intent["array"])
                intent["resp"] = x["resp"]
                intent["tag"] = x["tag"]
        print("-")
        b += 1

    return intent

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

if __name__ == '__main__':
    athena_speak("there are 3 definitions")
    i = 0
    while True:
        i+=1
        athena_speak(ordinal(i))
        if i==10:
            break













