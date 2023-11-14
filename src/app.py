from flask import Flask, render_template, request, redirect, url_for
from werkzeug.security import check_password_hash
import os

app = Flask(__name__)

# Load common passwords from the file
with open("10-million-password-list-top-1000.txt", "r") as file:
    common_passwords = set(file.read().splitlines())

# Default home page
@app.route("/", methods=["GET", "POST"])
def home():
    if request.method == "POST":
        password = request.form.get("password")

        # Check password against OWASP guidelines
        if (
            len(password) >= 10
            and password not in common_passwords
        ):
            print("hi")
            return redirect(url_for("welcome", password=password))

        else:
            return render_template("home.html")

    return render_template("home.html")

# Welcome page
@app.route("/welcome")
def welcome():
    password = request.args.get("password")
    return render_template("welcome.html", password=password)

if __name__ == "__main__":
    app.run(debug=True)
