import json
import string
from sys import set_coroutine_origin_tracking_depth

from more_itertools import substrings

with open("json\dictionary.json") as gui:
    data = json.load(gui)

y = "asdasdasd"
for i in y:
    print("--"+i+"--")