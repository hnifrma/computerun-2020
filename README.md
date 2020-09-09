# Computerun 2020 Official Website

## Building
In order to build the website, make sure that you have generated the `.env` environment variable. To create a new one, go to the `/scripts` folder, and execute `python3 generate_env.py`.

> This script requires (preferably latest version of) Python 3 with external libraries. If you are unsure which library is required, run `pip install pillow pyotp qrcode uuid` before executing the script

> This script will generate a temporary image file, `temp.png`, to display the QR code for Administration Panel authentication. While this file has been exempted from Git through `.gitignore` files, it is still recommended to run the script inside the `/scripts` folder (i.e. `cd scripts && python3 generate_env.py` rather than `python3 scripts/generate_env.py`) for security reasons.

Additionally, you might want to [download and install Composer](https://getcomposer.org/download) and run `composer install` to install all dependencies
