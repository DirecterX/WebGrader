n = input("Enter number : ")

total = 0
roman = {"I": 1,"V": 5,"X": 10,"L": 50,"C": 100,"D": 500,"M": 1000}
for i in range(len(n)):
    if i > 0 and roman[n[i]] > roman[n[i-1]]:
        total += roman[n[i]] - 2 * roman[n[i-1]]
    else:
        total+=roman[n[i]]
print("Numer Change to Raman is : ",total)