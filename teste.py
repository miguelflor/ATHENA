heard = input()
w = ["one","two","three","four","five","six","seven","eight","nine","ten"]
n = ["1","2","3","4","5","6","7","8","9","10"]
heard_split = heard.split(" ")

heard_split_place = 0
for n in heard_split[:]:
    
    if n in w:
        l = 0
        print(n)
        for k in w:
            if n == k:
                print(heard_split[heard_split_place])
                print(n[l])
                heard_split[heard_split_place] = n[l]
                
        l+=1
    heard_split_place += 1

print(" ".join(heard_split))