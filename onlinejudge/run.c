#include <stdio.h>
#include <stdlib.h>
#include <sys/wait.h>
#include <unistd.h>
#include <string.h>
#include <errno.h>
#include <popen2.h>

//0 wrong answer
//1 accepted
//-1 compile error
//-2 time out
int main(int argc, char* argv[])
{
	struct popen2 kid;
	pid_t pr;
	int i = 0;
	int TIMELIMIT = 2;
	char* filename = argv[1];
	char* infilename = argv[2];
	char* outfilename = argv[3];
	//printf("filename: %s in: %s out: %s\n", filename,infilename, outfilename);
    char buffer[1024];
    memset(buffer, '\0', sizeof(buffer));
	char cmdgcc[200]="";
	strcpy(cmdgcc, "gcc -o ");
	strcat(cmdgcc, "exe");
	strcat(cmdgcc, " ");
	strcat(cmdgcc, filename);
	//popen2("gcc -o hello hello.c", &kid);
	if((access("exe", 0)) != -1)
		remove("exe");
	popen2(cmdgcc, &kid);
	do{	
		pr = waitpid(kid.child_pid, NULL, WNOHANG);
		if(pr==0){
			//printf("nochild,or still running\n");
			sleep(1);
			i++;
		}
		if(i>TIMELIMIT){	
			//printf("timeout,kill run!\n");
			kill(kid.child_pid, 0);
			break;
		}
	}while(pr==0);
	if(pr==kid.child_pid){
		//printf("sucess gcc\n");
		//memset(buffer, 0, 1024);
		//read(kid.from_child, buffer, 1024);
		//printf("from gcc: %s\n", buffer); 
	}else{
		//printf("gcc is error\n");
		printf("compileerror\n");
		//return -1;
		exit(0);
	}
/*
    if (stream == NULL)
    {
        fprintf(stderr, "popen failed:%s\n", strerror(errno));
        return -1;
    }
    
    fread(buffer, sizeof(char), sizeof(buffer), stream);
    //fgets(buffer,sizeof(buffer), stream);
    printf("%s", buffer);
    pclose(stream);*/

    if( (access("exe", 0)) != -1)
	{
		//printf("file exists\n");
		struct popen2 kidd;
		pid_t prr;
		char cmdexe[200]="";
		//FILE* instream;
		//FILE* infile;
		//char buf[1024];
		//memset(buf, '\0', sizeof(buf));
		strcpy(cmdexe, "cat ");
		strcat(cmdexe, infilename);
		strcat(cmdexe, " | ./");
		strcat(cmdexe, "exe");
		strcat(cmdexe, " > result.txt");
		popen2(cmdexe, &kidd);
		//popen2("cat in.txt | ./hello > result.txt", &kidd);
		do{	
			prr = waitpid(kidd.child_pid, NULL, WNOHANG);
			if(prr==0){
				//printf("nochild,or still running\n");
				sleep(1);
				i++;
			}
			if(i>TIMELIMIT){	
				//printf("timeout,kill the exe!\n");
				kill(kid.child_pid, 0);
				break;
			}
		}while(prr==0);
		if(prr==kidd.child_pid){
			//printf("sucess exe\n");
			//memset(buf, 0, 1024);
			//read(kidd.from_child, buf, 1024);
			//printf("from exe: %s\n", buf); 
		}else{
			//printf("exe is error\n");
			printf("timeout\n");
			//return -2;
			exit(0);
		}
		/*
		infile = fopen("/var/www/in.txt","r");
		fread(inbuf, sizeof(char), sizeof(inbuf), infile);
		printf("fread%s", inbuf);
		fclose(infile);
		instream = popen("/var/www/hello > result.txt", "w");
		fwrite(inbuf, sizeof(char), sizeof(inbuf), instream);
		pclose(instream);
		*/

	}else{
		//printf("file don't exists\n");
		printf("compileerror\n");
		//return -1;
		exit(0);
		//complie failed ,update the database
	}
	int flag = compare(outfilename, "result.txt");
    //close();
	//printf("%d\n", flag);
	if(flag == 1)
		printf("accepted\n");
	else if(flag == 0)
		printf("wronganswer\n");
    //return flag;
	exit(0);
}

int compare(char* stdout, char* result)
{
	FILE* stdoutfile = fopen(stdout,"r");
	FILE* resultfile = fopen(result,"r");
	char str1[128];
	char str2[128];
    //while ((strlen(fgets(str1,128,stdoutfile)))>0 && (strlen(fgets(str2,128,resultfile)))>0)
	if(feof(stdoutfile)==1 || feof(resultfile)==1)
		return 0;
	while(!feof(stdoutfile) && !feof(resultfile))
	{
		fgets(str1, 128, stdoutfile);
		fgets(str2, 128, resultfile);
		//printf("%s,%s", str1, str2);
		if(strcmp(str1, str2)!=0)
		{			
			return 0;
			break;
		}
	}
	fclose(stdoutfile);
	fclose(resultfile);
	return 1;
}