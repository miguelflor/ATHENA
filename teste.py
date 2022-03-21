import json
import string
from sys import set_coroutine_origin_tracking_depth

from more_itertools import substrings

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


i = [1,2,3,4,5,6,7,8,9,190,4,534,53,45,34]
for y in i:
     print(ordinal(y))