# makefile
#./main>output.txt

program: lab5.o
	g++ -g -std=c++11 lab5.o -o main
	./main
lab4.o: lab5.cpp heapq.cpp heapq.h
	g++ -g -std=c++11 -c lab5.cpp

clean:
	rm -f *.o
	rm -f main

com:
	# git add lab4.cpp heapq.cpp heapq.h
	# git add -u
	# git commit lab4.cpp heapq.cpp heapq.h -m pushing
	git push origin master
	
pull:
	git pull
	make
	./main

val:
	valgrind ./main


