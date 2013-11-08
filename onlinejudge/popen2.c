#include <sys/types.h>
#include <sys/wait.h>
#include <unistd.h>


struct popen2 {
    pid_t child_pid;
    int   from_child, to_child;
};

int popen2(const char *cmdline, struct popen2 *childinfo) {
    pid_t p;
    int pipe_stdin[2], pipe_stdout[2];

    if(pipe(pipe_stdin)) return -1;
    if(pipe(pipe_stdout)) return -1;

    //printf("pipe_stdin[0] = %d, pipe_stdin[1] = %d\n", pipe_stdin[0], pipe_stdin[1]);
    //printf("pipe_stdout[0] = %d, pipe_stdout[1] = %d\n", pipe_stdout[0], pipe_stdout[1]);

    p = fork();
    if(p < 0) return p; /* Fork failed */
    if(p == 0) { /* child */
        close(pipe_stdin[1]);
        dup2(pipe_stdin[0], 0);
        close(pipe_stdout[0]);
        dup2(pipe_stdout[1], 1);
        execl("/bin/sh", "sh", "-c", cmdline, 0);
        perror("execl"); 
		exit(99);
    }
    childinfo->child_pid = p;
    childinfo->to_child = pipe_stdin[1];
    childinfo->from_child = pipe_stdout[0];
    return 0; 
}
/*
#define TESTING
#ifdef TESTING
int main(void) {
    char buf[1000];
	int i=0;
	pid_t pr;
    struct popen2 kid;
    //popen2("tr a-z A-Z", &kid);
	popen2("./cycle", &kid);
	printf("child_pid ; %d", kid.child_pid);
    //write(kid.to_child, "1\n1 2", 8);
    //close(kid.to_child);

    //printf("kill(%d, 0) -> %d\n", kid.child_pid, kill(kid.child_pid, 0)); 

    //printf("waitpid() -> %d\n", waitpid(kid.child_pid, NULL, 0));
	do{	
		pr = waitpid(kid.child_pid, NULL, WNOHANG);
		if(pr==0){
			printf("nochild,or still running\n");
			sleep(1);
			i++;
		}
		if(i>15){	
			printf("kill!\n");
			kill(kid.child_pid, 0);
			break;
		}
		printf("i:%d\n",i);
	}while(pr==0);
	if(pr==kid.child_pid){
		printf("sucess run\n");
		memset(buf, 0, 1000);
		read(kid.from_child, buf, 1000);
		printf("from child: %s", buf); 
	}
	else
		printf("error\n");


    printf("kill(%d, 0) -> %d\n", kid.child_pid, kill(kid.child_pid, 0)); 
    return 0;
}
#endif
*/