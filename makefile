# makefile

com:
	git push origin main

all:
	git add -u
	git commit -m "testing functionality on the server"
	git push origin main

ch:
	chmod 755 -R Homepage/ Loginpage/
	


