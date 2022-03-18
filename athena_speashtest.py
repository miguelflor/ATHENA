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


def athena_speak(speech):
    print(speech+"\n")
    engine.say(speech)
    engine.runAndWait()

athena_speak(input())