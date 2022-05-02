import mysql.connector
import sys

mydb = mysql.connector.connect(
    host="localhost",
    user = "root",
    passwd= "",
    database="athena"
)
mycursor  = mydb.cursor()
while True:
    lol = input("registar ou logar? r/l \n")

    if lol == "r":
        
        x = input("Qual o teu nome:")
        s = input("Qual a tua pass: ")
        os = sys.platform
        mycursor.execute("INSERT INTO users (name, pass, dispositivo) VALUES ('%s','%s','%s') " % (x ,s ,os))
    else:
        x = input("Qual o teu nome:")
        s = input("Qual a tua pass: ")
        mycursor.execute("SELECT name WHERE name = '%s' and pass = '%s';")
        





