from tkinter import *
import base64
import datetime
import os
import webbrowser

# The following dependencies must be installed separately
from PIL import Image
import pyotp
import qrcode
import uuid

class App(Frame):
    prepend_template = '''
APP_NAME="Computerun 2020"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${{APP_NAME}}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${{PUSHER_APP_KEY}}"
MIX_PUSHER_APP_CLUSTER="${{PUSHER_APP_CLUSTER}}"
    '''
    env_APP_KEY = ""
    env_DB_CONNECTION = "mysql"
    env_DB_HOST = "127.0.0.1"
    env_DB_PORT = "3306"
    env_DB_DATABASE = "laravel"
    env_DB_USERNAME = "root"
    env_DB_PASSWORD = ""
    env_ADMIN_2FA_KEY = str(uuid.uuid4())
    is_custom_APP_KEY = False

    def __init__(self, master=None):
        Frame.__init__(self, master)
        self.master = master

        # menu = Menu(self.master)
        # self.master.config(menu=menu)

        # "About" menu
        # aboutMenu = Menu(menu)
        # aboutMenu.add_command(label="Website (for event promotion)", command=self.openLink("http://computerun.id"))
        # aboutMenu.add_command(label="GitHub Repository", command=self.openLink("http://github.com/reinhart1010/computerun-2020"))
        # aboutMenu.add_command(label="Sponsor Our Event")
        # menu.add_cascade(label="About", menu=aboutMenu)

        # Form fields
        Label(master, text="Step 1: Fill Optional Details", font="sans-serif 18 bold").grid(row=0, column=0, columnspan=2)
        Label(master, text="App Key").grid(row=1, column=0)
        Label(master, text="DB Server Connection").grid(row=2, column=0)
        Label(master, text="DB Server Host (IP Address)").grid(row=3, column=0)
        Label(master, text="DB Server Port").grid(row=4, column=0)
        Label(master, text="Database Name").grid(row=5, column=0)
        Label(master, text="DB Server Username").grid(row=6, column=0)
        Label(master, text="DB Server Password").grid(row=7, column=0)
        Label(master, text="Admin 2FA Key").grid(row=8, column=0)
        
        input_APP_KEY = Entry(master)
        input_DB_CONNECTION = Entry(master)
        input_DB_HOST = Entry(master)
        input_DB_PORT = Entry(master)
        input_DB_DATABASE = Entry(master)
        input_DB_USERNAME = Entry(master)
        input_DB_PASSWORD = Entry(master)
        input_ADMIN_2FA_KEY = Entry(master)

        input_APP_KEY.grid(row=1, column=1)
        input_DB_CONNECTION.grid(row=2, column=1)
        input_DB_HOST.grid(row=3, column=1)
        input_DB_PORT.grid(row=4, column=1)
        input_DB_DATABASE.grid(row=5, column=1)
        input_DB_USERNAME.grid(row=6, column=1)
        input_DB_PASSWORD.grid(row=7, column=1)
        input_ADMIN_2FA_KEY.grid(row=8, column=1)

        def clicked():
            if input_APP_KEY.get() != "":
                self.env_APP_KEY = input_APP_KEY.get()
            if input_DB_CONNECTION.get() != "":
                self.env_DB_CONNECTION = input_DB_CONNECTION.get()
            if input_DB_HOST.get() != "":
                self.env_DB_HOST = input_DB_HOST.get()
            if input_DB_PORT.get() != "":
                self.env_DB_PORT = input_DB_PORT.get()
            if input_DB_DATABASE.get() != "":
                self.env_DB_DATABASE = input_DB_DATABASE.get()
            if input_DB_USERNAME.get() != "":
                self.env_DB_USERNAME = input_DB_USERNAME.get()
            if input_DB_PASSWORD.get() != "":
                self.env_DB_PASSWORD = input_DB_PASSWORD.get()
            if input_ADMIN_2FA_KEY.get() != "":
                self.env_ADMIN_2FA_KEY = input_ADMIN_2FA_KEY.get()
                self.is_custom_APP_KEY = True
            self.generateTotpChallenge()

        Button(master, text="Generate", command=clicked).grid(row=9,column=0, columnspan=2)
    
    def generateEnvFile(self):
        print("Generating .env file...")
        envFile = open("../.env", "w")
        envFile.write(self.prepend_template)
        envFile.write("\n\n# Generated from /scripts/generate_env.py at " + datetime.datetime.now().isoformat() + "\n")
        envFile.write("APP_KEY=" + self.env_APP_KEY + "\n")
        envFile.write("DB_CONNECTION=" + self.env_DB_CONNECTION + "\n")
        envFile.write("DB_HOST=" + self.env_DB_HOST + "\n")
        envFile.write("DB_PORT=" + self.env_DB_PORT + "\n")
        envFile.write("DB_DATABASE=" + self.env_DB_DATABASE + "\n")
        envFile.write("DB_USERNAME=" + self.env_DB_USERNAME + "\n")
        envFile.write("DB_PASSWORD=" + self.env_DB_PASSWORD + "\n")
        envFile.write("ADMIN_2FA_KEY=" + self.env_ADMIN_2FA_KEY + "\n")
        envFile.close()

        Label(self.master, text="Done!", font="sans-serif 18 bold").grid(row=0, column=0, columnspan=2)
        Label(self.master, text="Your .env file has been created.").grid(row=1, column=0)
        Label(self.master, text="If you are new to this repository, please execute\n'php artisan key:generate' on the root directory\nto create a new APP_KEY.", fg="red").grid(row=2, column=0)
        
    def generateTotpChallenge(self):
        self.destroyAllWidgets()
        Label(self.master, text="Step 2: TOTP Verification", font="sans-serif 18 bold").grid(row=0, column=0, columnspan=2)

        # Create the QR code
        base32Encoded = base64.b32encode(str.encode(self.env_ADMIN_2FA_KEY)).decode()
        
        totp = pyotp.totp.TOTP(base32Encoded)

        qrPayload = totp.provisioning_uri(name="Admin", issuer_name="Computerun 2020")
        qrcode.make(qrPayload).save("temp.png")

        # Resize so it fits the canvas
        img = Image.open("temp.png")
        img = img.resize((300, 300), Image.ANTIALIAS)
        img.save("temp.png")

        # Load inside the canvas
        qrCanvas = Canvas(self.master, width = 300, height = 300)
        qrCanvas.grid(row=1, column=0)
        qrCanvas.imgBuffer = PhotoImage(file="temp.png")
        qrCanvas.imgBuffer.subsample(2)
        qrCanvas.create_image(0, 0, anchor = NW, image = qrCanvas.imgBuffer)

        def openInDesktop():
            webbrowser.open(qrPayload)

        Button(self.master, text="Open in desktop app", command=openInDesktop).grid(row=2, column=0)

        Label(self.master, text="Instruction", font="sans-serif 16 bold").grid(row=3, column=0)
        Label(self.master, text="Scan this QR code into your Authenticator app\n(Google/Microsoft Authenticator, Authy, FreeOTP, etc.)\nand enter the code below").grid(row=4, column=0)

        input_TOTP = Entry(self.master)
        input_TOTP.grid(row=5, column=0)

        errorMessage = Label(self.master, text="", fg="red")
        errorMessage.grid(row=7, column=0)

        def verifyTotp():
            if totp.verify(otp=input_TOTP.get()):
                self.destroyAllWidgets()
                self.generateEnvFile()
            else:
                errorMessage["text"] = "Invalid OTP\nIf this issue persists, check your\ndate/time settings."

        Button(self.master, text="Verify", command=verifyTotp).grid(row=6, column=0)

    def destroyAllWidgets(self):
        for widget in self.master.winfo_children():
            widget.destroy()
    
    def exitProgram(self):
        if os.path.exists("temp.png"):
            os.remove("temp.png")
        exit()
    
    def openLink(self, url):
        webbrowser.open(url)

root = Tk()
app = App(root)
root.wm_title("Computerun 2020")
root.geometry("400x600")
root.mainloop()