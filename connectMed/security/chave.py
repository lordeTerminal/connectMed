import time
import pyotp

#key = pyotp.random_base32()
key = "Nossogatoehpr3to"
print(key)

totp = pyotp.TOTP(key)

print(totp.now())


input_code = input("entre com autenticação de 2 fatores: >")

print(totp.verify(input_code))

