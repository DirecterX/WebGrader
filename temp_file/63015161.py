import os
import sys
import pathlib
assid = "27.txt"
path = str(pathlib.Path().resolve())+'\\'+assid


 

im=int(input("Here : "))
cou=im
num=""
lis=[]
tlis=[]
for n in range(im+1):
    m=-2
    for y in range(cou):
        lis.append(" ")
    cou-=1
    num+=str(n)
    for z in num:
        lis.append(z)
    for j in range(im):
        lis.append(lis[m])
        m-=2
    tlis.append(lis)
    lis=[]
    c=-2
for t in range(im):
    tlis.append(tlis[c])
    c-=2
for y in tlis:
    print(''.join(y))

