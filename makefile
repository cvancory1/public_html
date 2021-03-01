# makefile
#./main>output.txt

com:
	git push origin main

all:
	git add -u
	git commit -m "same"
	git push origin main
	
chmod:
	cd ..
	chmod 755 -R public_html
	cd public_html

