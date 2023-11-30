import time
import pyotp
import qrcode
import subprocess

key = pyotp.random_base32()
#implementar registro na paradinha do banco de dados do user
print(key)
#puxar name do banco de dados...
uri = pyotp.totp.TOTP(key).provisioning_uri(name="pulodogato" ,issuer_name="SaudeOsasco")
#print(uri)
qrcode.make(uri).save("ultimogerado.png")

subprocess.run(["bash", "chmod_script.sh"])
