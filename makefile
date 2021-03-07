# makefile
#./main>output.txt

com:
	git push origin main

all:
	git add -u
	git commit -m "same"
	git push origin main

chmod:
	chmod 755 *.html *.php *.css
	


